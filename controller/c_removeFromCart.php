<?php
session_start();
include_once __DIR__ . "/../model/conectarBD.php";
include_once __DIR__ . "/../model/m_getProduct.php";

$connection = connexionBD();

$book_id = $_GET['book_id'];
unset($_SESSION['cart'][$book_id]);

$products = $_SESSION['cart'] ?? array();
$product_keys = array_keys($products);
$books_in_cart = getProducts($connection, $product_keys); 
$total_price = getTotalPrice($books_in_cart, $products);   

include_once __DIR__."/../views/v_cart.php";

pg_close($connection);

?>