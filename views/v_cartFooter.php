<link rel="stylesheet" type="text/css" href="../css/home.css" />

    <img src="../resources/icon/shoppingBag.png" alt="" width="60px">
    <p class="cart-footer-tags" id="num-products">Número de productos </p>
    <p><?= isset($totalProducts) ? htmlentities($totalProducts) : 0 ?></p>
    <p class="cart-footer-tags" id="total-price">Precio total</p>
    <p><?= isset($total_price) ? htmlentities($total_price) : 0 ?></p>
    <p class="cart-footer-tags" id="recent-products">Último producto añadido</p>
    <p> <?= isset($recentProduct) ? htmlentities($recentProduct) : 'N/A' ?></p>


