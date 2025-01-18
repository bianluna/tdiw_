<?php
function getProducts($connection, $category)
{
  $sql_books = "
    SELECT title,image,price,book_id
    FROM books
    WHERE category_id=$1
  ";
  //$consulta_books = pg_query($connexio, $sql_books) or die("Error sql categoria");
  $books_consult = pg_query_params($connection, $sql_books, array($category));
  $books_list = pg_fetch_all($books_consult);
  return ($books_list);
}
?>