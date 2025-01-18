<?php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_checkUserInDB.php';
$email = $_GET["email"];

$connection = connexionBD();

$result_user = checkUserInDB($connection, $email);

if ($result_user){
    session_start();

    $cart_backup = $_SESSION['cart'] ?? [];

    session_unset();
    $_SESSION['user_id'] = $result_user;
    $_SESSION['cart'] = $cart_backup;

    echo json_encode(true);
}
else{
    echo json_encode(false);
} 

?>