<?php
function getOrderHistory($connexio, $user_id)
{
    $sql = "
        SELECT 
            o.order_id,
            o.total_price,
            o.date,
            ol.book_title,
            ol.book_price,
            ol.quantity
        FROM 
            orders o
        INNER JOIN 
            orderlines ol
        ON 
            o.order_id = ol.order_id
        WHERE 
            o.user_id = $1
    ";

    $result = pg_query_params($connexio, $sql, array($user_id));

    $orders = array();

    while ($row = pg_fetch_assoc($result)) {
        $order_id = $row['order_id'];

        if (!isset($orders[$order_id])) {
            $orders[$order_id] = [
                'order_id' => $order_id,
                'total_price' => $row['total_price'],
                'date' => $row['date'],
                'order_lines' => [] 
            ];
        }

        $orders[$order_id]['order_lines'][] = [
            'book_title' => $row['book_title'],
            'book_price' => $row['book_price'],
            'quantity' => $row['quantity']
        ];
    }
    
    return array_reverse(array_values($orders));
}

?>