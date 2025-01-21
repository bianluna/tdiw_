<?php
session_start();

include_once __DIR__ . "/../model/conectarBD.php";
include_once __DIR__ . "/../model/m_getProduct.php";

$products = $_SESSION['cart'] ?? array(); 
$product_keys = array_keys($products);

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$book_id = $_POST['book_id'];
$quantity = $_POST['quantity'];
$action = $_POST['action'];

if ($action == '+' && $quantity < 10) {
    $_SESSION['cart'][$book_id]++;
    $products[$book_id] = $_SESSION['cart'][$book_id];
} else if ($action == '-') {
    if ($_SESSION['cart'][$book_id] > 0) {
        $_SESSION['cart'][$book_id]--;
        $products[$book_id] = $_SESSION['cart'][$book_id];
        
    } else {
        $_SESSION['cart'][$book_id] = 0;
    }
}
$connection = connexionBD();

$products = $_SESSION['cart'] ?? array();
$product_keys = array_keys($products);
$books_in_cart = getProducts($connection, $product_keys); 
$total_price = getTotalPrice($books_in_cart, $products);  
 
$output = array('quantity' => isset($products[$book_id]) ? $products[$book_id] : 0,
                'total_price' => $total_price);

echo json_encode($output  );
?>
