<?php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getProductsByCat.php';
require_once __DIR__ . '/../model/m_getCatName.php';
$connection = connexionBD();

$category = isset($_GET['category']) ? $_GET['category'] : '2';


$products_list = getProducts($connection,$category);
$category_name = getCategoryName($connection, $category)['type'];

include __DIR__ . '/../views/v_booksByCategory.php';
pg_close($connection);

?>