<?php
session_start();

$book_id = $_REQUEST['book_id'];
$quantity = ((isset($_SESSION['book_quantities'][$book_id])) ? $_SESSION['book_quantities'][$book_id] : (int) $_REQUEST['quantity']);
$more = $_REQUEST['more'];

if (!isset($_SESSION['book_quantities'])) {
    $_SESSION['book_quantities'] = [];
}
$_SESSION['book_id'] = $book_id;

if ($more == 'true' && $quantity < 10) {
    $quantity++;
} elseif ($more == 'false' && $quantity > 1) {
    $quantity--;
} else {
    $quantity = 1;
}

$_SESSION['book_quantities'][$book_id] = $quantity;
echo $quantity;

?>