<?php
session_start(); 

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getUserHash.php';

$password = $_GET["password"];
$user_id = $_SESSION['user_id'];

$connection = connexionBD();

$result_user = getUserHash($connection, $user_id);
$password_hash = $result_user['password_hash'];

$is_same_password = password_verify($password, $password_hash);

if ($is_same_password){
    $_SESSION['user_name'] = $result_user['user_name'];
    echo json_encode(true);
}
else{
    $_SESSION['user_id'] = 0;
    echo json_encode(false);
} 



?>