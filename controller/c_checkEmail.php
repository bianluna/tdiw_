<?php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_checkUserInDB.php';
$email = $_GET["email"];

$connection = connexionBD();

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result_user = checkUserInDB($connection, $email);
    if ($result_user) {
        session_start();

        $cart_backup = $_SESSION['cart'] ?? [];

        session_unset();
        $_SESSION['user_id'] = $result_user;
        $_SESSION['cart'] = $cart_backup;

        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
} else {
    echo ("$email is not a valid email address");
}

pg_close($connection);
?>