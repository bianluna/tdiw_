<?php
function getRecommendedProducts($connection)
{
    $sql_recommended_books = "SELECT title,image,price,book_id FROM books WHERE recommended=TRUE";
    $recommended_consult = pg_query($connection, $sql_recommended_books) or die("Error sql consulta");
    $recommended_list = pg_fetch_all($recommended_consult);
    return ($recommended_list);
}
?>