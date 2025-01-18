<?php
session_start();

unset($_SESSION['cart']);
$books_in_cart = array();

include_once __DIR__."/../views/v_cart.php";
?>