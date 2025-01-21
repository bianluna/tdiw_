<?php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_getCategory.php';
$connection = connexionBD();

$resultado_categorias = findCategory($connection);

include __DIR__ . '/../views/v_categoryList.php';
pg_close($connection);
?>