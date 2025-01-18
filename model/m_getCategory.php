<?php
function findCategory($connection)
{
  $sql_cat = "SELECT type, category_id FROM categories";
  $consulta_categorias = pg_query($connection, $sql_cat) or die("Error sql categorias");
  $resultado_categorias = pg_fetch_all($consulta_categorias);

  return ($resultado_categorias);

}
?>