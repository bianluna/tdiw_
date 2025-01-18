<?php
function getPopularProducts($connection)
{
    $sql_popular_books = "SELECT title,image,price,book_id FROM books WHERE popular=TRUE";
    $popular_consult = pg_query($connection, $sql_popular_books) or die("Error sql consulta");
    $popular_list = pg_fetch_all($popular_consult);
    return ($popular_list);
}
?>