<?php
function getCategoryName($connexio, $categoria)
{
  $sql_category_name = "SELECT type FROM categories WHERE category_id=$1";
  $consulta_category_name = pg_query_params($connexio, $sql_category_name, array($categoria));
  $consulta_category_name = pg_fetch_assoc($consulta_category_name);
  return $consulta_category_name;
}
?>