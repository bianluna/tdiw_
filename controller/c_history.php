<?php
require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getOrder.php';
require_once __DIR__ . '/../model/m_getProduct.php';

$connection = connexionBD();

session_start();

$orders = getOrders($connection, $_SESSION['user_id']);

$order_lines = getOrderLines($connection, $orders);

$order_lines_values = array();
foreach ($order_lines as $order){
    array_push($order_lines_values, $order['book_id']);
}

$book_data = getProducts($connection, $order_lines_values);
//var_dump($book_data);

include __DIR__ . '/../views/v_history.php';
pg_close($connection);
?>