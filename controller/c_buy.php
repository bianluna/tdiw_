<?php
  session_start();

  $book_id = $_GET['book_id'];
  $book_id = filter_var($book_id, FILTER_VALIDATE_INT);
  $book_title = $_GET['title'];

  if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
  }

  if (!array_key_exists($book_id, $_SESSION['cart'])) {
    $_SESSION['cart'][$book_id] = $_SESSION['book_quantities'][$book_id] ?? 1;
  } else {
    $_SESSION['cart'][$book_id]+= $_SESSION['book_quantities'][$book_id] ?? 1;
  } 

  echo $book_title . " added to the cart";
?>
