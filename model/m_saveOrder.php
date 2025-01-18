<?php
function m_saveOrder($connection, $user_id, $products, $total_price){
    $query = "INSERT INTO orders (user_id, total_price) VALUES (?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ii", $user_id, $total_price);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();
    
    $query = "INSERT INTO order_products (order_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($query);
    foreach ($products as $product_id => $quantity){
        $stmt->bind_param("iii", $order_id, $product_id, $quantity);
        $stmt->execute();
    }
    $stmt->close();
}

?>