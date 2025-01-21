<?php
function getProducts($connection, $category)
{
  $sql_books = "
    SELECT title,image,price,book_id
    FROM books
    WHERE category_id=$1
  ";
  $books_consult = pg_query_params($connection, $sql_books, array($category));
  $books_list = pg_fetch_all($books_consult);
  return ($books_list);
}
?>