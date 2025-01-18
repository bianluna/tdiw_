<?php
function findProduct($connexio, $book_id)
{
  $sql_book = "SELECT * FROM books WHERE book_id=$1";

  $book_consult = pg_query_params($connexio, $sql_book, array($book_id));
  $book_data = pg_fetch_assoc($book_consult);

  return $book_data;
}

//FIXME: Optimze this function. Use a single query to get all the products
function getProducts($connexio, $book_ids) {
  $products = array();
  foreach ($book_ids as $book_id) {
    $product = findProduct($connexio, $book_id);
    array_push($products, $product);
  }
  return $products;
}

function getTotalPrice(&$books_in_cart, $products)
{
    $total_price = 0;
    foreach ($books_in_cart as $i => $book) {
        $book_id = $book['book_id'];
        $quantity = $products[$book_id];
        if ($quantity == 0) {
            unset($_SESSION['cart'][$book_id]);
            unset($books_in_cart[$i]);
            continue;
        }
        $total_price += $book['price'] * $quantity;
        $books_in_cart[$i]['quantity'] = $quantity;
    }

    return $total_price;
}

?>