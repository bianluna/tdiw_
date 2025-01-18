<div>
    <h1>Historial de pedidos</h1>
    <div class="grid-container">
        <?php foreach ($book_data as $book): ?>
            <div class="grid-item">
                <h2><?= $book['title'] ?></h2>
                <p><?= $book['author'] ?></p>
                <p><?= $book['price'] ?>€</p>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="button" onclick="(() => {window.location.href = '../index.php';})();" id="back-shop-button">Volver a
    la tienda</button>
</div>