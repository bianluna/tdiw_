<?php
require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getHistory.php';

$connection = connexionBD();
session_start();

$orders = getOrderHistory($connection, $_SESSION['user_id']);

include __DIR__ . '/../views/v_history.php';
pg_close($connection);
?>