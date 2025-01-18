<?php
// controller/books_list_by_cat.php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getProductsByCat.php';
require_once __DIR__ . '/../model/m_getCatName.php';
$connection = connexionBD();

$category = isset($_GET['category']) ? $_GET['category'] : '2';
//print_r("From c_productListByCat: ");
//var_dump($_GET['category']);

$products_list = getProducts($connection,$category);// Aquesta crida és al model
$category_name = getCategoryName($connection, $category)['type'];

//var_dump($resultat_books);
//var_dump($category_name);


include __DIR__ . '/../views/v_booksByCategory.php';
//include __DIR__ . '/../views/categoryList.php';
pg_close($connection);

?>