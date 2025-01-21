<link rel="stylesheet" type="text/css" href="../css/history.css" />

<div class="history-page">
    <img src="../resources/icon/historyOrders.png" alt="" width="100px">
    <h1>Historial de pedidos</h1>
    <div class="purchase">
        <?php foreach ($orders as $order): ?>
            <div class="purchase-info">
                <p class="order-number">ORDEN G6<?= $order['order_id'] ?></p>
                <h2 class="purchase-date"><?= $order['date'] ?></h2>
                <?php foreach ($order['order_lines'] as $line): ?>
                    <div class="row-item">
                        <h3 class="purchase-title"><?= $line['book_title'] ?></h3>
                        <p class="purchase-price"><?= $line['book_price'] ?>€</p>
                        <p class="purchase-quantity">x<?= $line['quantity'] ?></p>
                    </div>
                <?php endforeach; ?>
                <h2 class="total-price">Total: €<?= $order['total_price'] ?></h2>
            </div>

        <?php endforeach; ?>
    </div>
    <div class="bottom-history">
        <button class="button" id="button-go-back" onclick="(() => {window.location.href = '../index.php';})();" id="back-shop-button">Volver a
        la tienda</button>

    </div>
   
</div>