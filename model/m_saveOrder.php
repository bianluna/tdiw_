<?php

function m_saveOrder($connection, $user_id, $product_keys, $products, $total_price, $books_in_cart)
{


    $query_order = "
            INSERT INTO orders (user_id, date, total_price, quantity)
            VALUES ($1, NOW(), $2, $3)
            RETURNING order_id;
        ";

    $totalProducts = array_sum(array_map(fn($key) => $products[$key], $product_keys));

    $params_order = [$user_id, $total_price, $totalProducts];
    $result_order = pg_query_params($connection, $query_order, $params_order);

    if (!$result_order) {
        throw new Exception("Error al insertar la orden.");
    }

    $order_id = pg_fetch_assoc($result_order)['order_id'];

    $query_orderlines = "
            INSERT INTO orderlines (order_id, book_id, quantity, book_title, book_price)
            VALUES ($1, $2, $3, $4, $5);
        ";

    foreach ($product_keys as $index => $key) {
        $params_orderlines = [
            $order_id,
            $key,
            $products[$key],
            $books_in_cart[$index]['title'],
            $books_in_cart[$index]['price']
        ];

        $result_orderlines = pg_query_params($connection, $query_orderlines, $params_orderlines);

        if (!$result_orderlines) {
            throw new Exception("Error al insertar las líneas del pedido.");
        }
    }

    echo json_encode(true);
}

?>