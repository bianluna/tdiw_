<?php
// controller/popularProducts.php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getPopularProducts.php';

$connection = connexionBD();

$popular_list = getPopularProducts($connection); // calls m_getPopularProducts.php

//var_dump($popular_list);

include __DIR__ . '/../views/v_productsByPopularity.php';
//include __DIR__ . '/../views/categoryList.php';
pg_close($connection);

?>