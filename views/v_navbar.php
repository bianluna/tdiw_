<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<nav class="navbar">
    <div class="navbar-content">
        <div class="nav-links" id="links">
            <div class="dropdown">
                <a href="#" onclick="listCategories(event)">categorías</a>
                <div class="dropdown-content">
                    <?php
                    foreach ($resultado_categorias as $categoria) {
                        echo '<a href="#" class="dropdown-item" onClick="booksByCategory(event)"
                            data-category-id="' . htmlentities($categoria['category_id']) . '">' . htmlentities($categoria['type']) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="logo" id="logo">
            <a href="../index.php">
                <img src="../media/brand/logoBrand.png" alt="Bookend Logo" width="135px" />
            </a>
        </div>

        <div class="nav-icons" id="icons">
            <?php
            session_start();
            ?>
            <div class="dropdown">
                <?php
                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0 && strpos($_SERVER['REQUEST_URI'], '/loginPassword.php') === false) {
                    echo '<a href="#" class="user-name" onclick="configUser()">' . $_SESSION['user_name'] . '</a>';
                } ?>
                <div class="dropdown-content">
                    <?php
                    echo '<a href="#" class="dropdown-item" onClick="getHistory(event)"
                            data-category-id="' . htmlentities($categoria['category_id']) . '">' . 'Historial de pedidos' . '</a>';
                    echo '<a href="#" class="dropdown-item" onClick="logout()"
                            data-category-id="' . htmlentities($categoria['category_id']) . '">' . 'Cerrar sesión' . '</a>';
                    ?>
                </div>
            </div>

            <?php
            if ($_SESSION['user_id'] == 0 || strpos($_SERVER['REQUEST_URI'], '/loginPassword.php') !== false) {
                echo '<a href="../login.php">';
                echo '<img src="../resources/icon/user.png" alt="User Icon" width="40px" />';
                echo '</a>';
            }
            ?>
            <a href="#" onclick="showCart(event)">
                <img src="../resources/icon/shoppingBag.png" alt="Cart Icon" width="40px" />
                <?php
                if (isset($_SESSION['cart']) && strpos($_SERVER['REQUEST_URI'], '/loginPassword.php') === false) {
                    echo '<span id="cart-bubble" class="cart-bubble">' . htmlentities(array_sum($_SESSION['cart'])) . '</span>';
                } ?>
            </a>
            
        </div>
    </div>
</nav>