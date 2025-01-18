<?php
include_once __DIR__ . "/../model/conectarBD.php";
include_once __DIR__ . "/../model/m_getProduct.php";

session_start();

$totalPrice = 0;
$totalProducts = 0;
$recentProducts = [];

$connection = connexionBD();

$products = $_SESSION['cart'] ?? array();
$product_keys = array_keys($products);

foreach ($product_keys as $key) {
    $totalProducts += $products[$key];
}

$books_in_cart = getProducts($connection, $product_keys); 
$total_price = getTotalPrice($books_in_cart, $products);   

$recentProduct = $books_in_cart[array_key_last($books_in_cart)]['title'] ?? null;

include_once __DIR__ . "/../views/v_cartFooter.php";

?>