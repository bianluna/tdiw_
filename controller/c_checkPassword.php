<?php
session_start(); 

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_checkUserInDB.php';
require_once __DIR__ . '/../model/m_getUserHash.php';

$password = $_GET["password"];
$user_id = $_SESSION['user_id'];

$connection = connexionBD();

$result_user = getUserHash($connection, $user_id);
$password_hash = $result_user['password_hash'];

$is_same_password = password_verify($password, $password_hash);
$user_data = getUserData($connection, $user_id);

if ($is_same_password){
    $_SESSION['image_path'] = $user_data['image_path'];
    $_SESSION['user_name'] = $result_user['user_name'];
    $_SESSION['user_email'] = $user_data['email'];
    $_SESSION['user_address'] = $user_data['address'];
    $_SESSION['user_city'] = $user_data['city'];
    $_SESSION['user_postal_code'] = $user_data['postal_code'];
    $_SESSION['user_phone_number'] = $user_data['phone_number'];

    echo json_encode(true);
}
else{
    $_SESSION['user_id'] = 0;
    echo json_encode(false);
} 

pg_close($connection);


?>