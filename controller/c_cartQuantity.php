<?php
include_once __DIR__ . "/../model/conectarBD.php";
include_once __DIR__ . "/../model/m_getProduct.php";

session_start();

$totalPrice = 0;
$totalProducts = 0;

$connection = connexionBD();

$products = $_SESSION['cart'] ?? array();
$product_keys = array_keys($products);

foreach ($product_keys as $key) {
    $totalProducts += $products[$key];
}

$books_in_cart = getProducts($connection, $product_keys); 

echo json_encode(['cartSize' => $totalProducts]);

pg_close($connection);

?>