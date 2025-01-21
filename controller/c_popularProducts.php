<?php
require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getPopularProducts.php';

$connection = connexionBD();

$popular_list = getPopularProducts($connection);

include __DIR__ . '/../views/v_productsByPopularity.php';
pg_close($connection);

?>