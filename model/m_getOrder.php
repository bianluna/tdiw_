<?php
function getOrders($connexio, $user_id)
{
    $sql_orders = "SELECT * FROM orders WHERE user_id=$1";
    $orders_consult = pg_query_params($connexio, $sql_orders, array($user_id));
    $orders = pg_fetch_all($orders_consult);
    return $orders;
}   

function getOrderLines($connexio, $orders)
{
    $order_lines = array();
    foreach ($orders as $order) {
        $order_id = $order['order_id'];
        $sql_order_lines = "SELECT * FROM orderlines WHERE order_id=$1";
        $order_lines_consult = pg_query_params($connexio, $sql_order_lines, array($order_id));
        $order_lines_result = pg_fetch_all($order_lines_consult);
        foreach ($order_lines_result as $order_line) {
            array_push($order_lines, $order_line);
        }
    }
    return $order_lines;
}

?>