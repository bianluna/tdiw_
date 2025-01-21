<?php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getProduct.php';
$connection = connexionBD();
session_start();

$book_id = isset($_GET['book_id']) ? (int) $_GET['book_id'] : 1;


$product = findProduct($connection, $book_id);

include __DIR__ . '/../views/v_product.php';
pg_close($connection);
?>