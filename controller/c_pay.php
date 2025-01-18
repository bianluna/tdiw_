<?php
include_once __DIR__ . "/../model/conectarBD.php";
include_once __DIR__ . "/../model/m_getProduct.php";
include_once __DIR__ . "/../model/m_saveOrder.php";

session_start();

$connection = connexionBD();

$products = $_SESSION['cart'] ?? array();
$product_keys = array_keys($products);
$books_in_cart = getProducts($connection, $product_keys);



?>