<?php
function m_saveOrder($connection, $user_id, $product_keys, $products, $total_price, $books_in_cart)
{

    $query_order = "INSERT INTO orders (user_id, date, total_price, quantity) VALUES ($1, $2, $3, $4)";

    // Execute the  statement
    $totalProducts = 0;
    foreach ($product_keys as $key) {
        $totalProducts += $products[$key];
    }
    $params_order = [$user_id, date('Y-m-d'), $total_price, $totalProducts];
    $result_order = pg_query_params($connection, $query_order, $params_order);

    // Get the order_id
    $query_order_id = "SELECT order_id FROM orders WHERE user_id = $user_id";

    $result_order_id = pg_query($connection, $query_order_id);
    $order_id = pg_fetch_assoc($result_order_id)['order_id'];

    // For each product in the cart, insert a row in the orderlines table
    $aux = 0;
    foreach ($product_keys as $key) {
        $query_orderlines = "INSERT INTO orderlines (order_id, book_id, quantity, book_title, book_price) VALUES ($1, $2, $3, $4, $5)";
        
        $params_orderlines = [$order_id, $key, $products[$key], $books_in_cart[$aux]['title'], $books_in_cart[$aux]['price']];
        $result_orderlines = pg_query_params($connection, $query_orderlines, $params_orderlines);
        $aux++;
    }

    //Check if the orderlines were inserted correctly
    if ($result_orderlines) {
        echo json_encode(true);
    }
    else{
        echo json_encode(false);
    }

}

?>