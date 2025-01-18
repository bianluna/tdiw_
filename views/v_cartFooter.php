<link rel="stylesheet" type="text/css" href="../css/home.css" />

<img src="../resources/icon/shoppingBag.png" alt="" width="60px">
<div id="cart-summary">
    <p class="cart-footer-tags" id="num-products">Número de productos </p>
    <p><?= htmlentities($totalProducts) ?></p>
    <p class="cart-footer-tags" id="total-price">Precio total</p>
    <p><?= htmlentities($total_price) ?> Euros</p>
    <p class="cart-footer-tags" id="recent-products">Último producto añadido</p>
    <p> <?= htmlentities($recentProduct) ?></p>
</div>
