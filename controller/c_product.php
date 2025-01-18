<?php


require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getProduct.php';
$connection = connexionBD();

//$book_id = $_REQUEST["book_id"];
$book_id = isset($_GET['book_id']) ? (int) $_GET['book_id'] : 1;
//print_r('enters here - controller');
//print_r($book_id);

$product = findProduct($connection, $book_id); // Aquesta crida és al model
//print_r($product);

include __DIR__ . '/../views/v_product.php';
pg_close($connection);
?>