<?php
include_once __DIR__ . "/../model/conectarBD.php";
include_once __DIR__ . "/../model/m_getProduct.php";
include_once __DIR__ . "/../model/m_saveOrder.php";

session_start();

$connection = connexionBD();

$products = $_SESSION['cart'] ?? array();
$product_keys = array_keys($products);
$books_in_cart = getProducts($connection, $product_keys);
$total_price = getTotalPrice($books_in_cart, $products);

m_saveOrder($connection, $_SESSION['user_id'], $product_keys, $products, $total_price, $books_in_cart);

// Clear the cart
unset($_SESSION['cart']);

?>