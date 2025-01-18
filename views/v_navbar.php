<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<nav class="navbar">
    <div class="navbar-content">

        <!-- Navigation Links -->
        <div class="nav-links" id="links">
            <div class="dropdown">
                <a href="#" onclick="listCategories(event)">categorías</a>
                <div class="dropdown-content">
                    <?php
                    //$isNavbar = true;
                    foreach ($resultado_categorias as $categoria) {
                        // Render for the navbar dropdown
                        echo '<a href="#" class="dropdown-item" onClick="booksByCategory(event)"
                            data-category-id="' . htmlentities($categoria['category_id']) . '">' . htmlentities($categoria['type']) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>



        <!-- Logo Navbar -->
        <div class="logo" id="logo">
            <a href="../index.php">
                <img src="../media/brand/logoBrand.png" alt="Bookend Logo" width="135px" />
            </a>
        </div>



        <!-- Icons -->
        <div class="nav-icons" id="icons">
            <?php
            session_start();
             
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0) {
                echo '<p class="user-name">' . $_SESSION['user_name'] . '</p>';
            } ?>
            <a href="login.php">
                <img src="../resources/icon/user.png" alt="User Icon" width="40px" />
            </a>
            <a href="#" onclick="showCart(event)">
                <img src="../resources/icon/shoppingBag.png" alt="Cart Icon" width="40px" />
            </a>
        </div>
    </div>
</nav>