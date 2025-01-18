<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/cart.css" />

<h1>Cesta</h1>

<button class="button" onclick="(() => {window.location.href = '../index.php';})();" id="back-shop-button">Volver a la tienda</button>

    <?php if (count($books_in_cart) > 0): ?>
        <div class="grid-container">
        <?php foreach ($books_in_cart as $product): ?>
            <div class="card">
                <div class="container-image"><img src="<?= htmlentities($product['image']) ?>" class="card-image"></div>
                <div class="card-bottom">
                    <a href="#" onclick="getBook(event)" class="card-title" id="<?= htmlentities($product['book_id']) ?>" 
                    book-id="<?= htmlentities($product['book_id']) ?>"><?= htmlentities($product['title']) ?></a>
                    <p class="card-price">Є<?= htmlentities($product['price']) ?></p>
                </div>
                <div >
                    <button class="button-quantity"  style="width:50px;">-</button>
                    <input type="text" id="quantity" style="width:50px;"  value="<?= htmlentities($product['quantity']) ?>" readonly >
                    <button class="button-quantity"  style="width:50px;">+</button>
                </div>
            </div>
            
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="container">
            <img src="../resources/icon/emptyBag.png" alt="" width="140px">
            <p id="empty-cart-text">La cesta esta vacia ... aun no haz encontrado lo que buscabas?</p>
        </div>
    <?php endif; ?>
    

<div style="padding: 20px;">
    <h2>Total: Є<span id="cart-price"><?= isset($total_price)? htmlentities($total_price) : 0 ?></span></h2>
</div>

<div class="bottom-section-cart">
    <button class="button" id="button-empty" onclick="emptyCart();">Vaciar Carrito</button>
    <button class="button" id="button-pay" onclick="pay(<?php echo $_SESSION['user_id']; ?>);">Pagar</button>


</div>

