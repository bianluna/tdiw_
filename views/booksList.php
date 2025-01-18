
<?php
$isNavbar = isset($isNavbar) && $isNavbar;

foreach ($resultado_categorias as $categoria) {
    if ($isNavbar) {
        // Render for the navbar dropdown
        echo '<a href="../category.php" class="dropdown-item">' . htmlentities($categoria['type']) . '</a>';
    } else {
        // Render for the grid cards
        echo '<div class="card">
                <a href="../category.php">
                    ' . htmlentities($categoria['type']) . '
                </a>
              </div>';
    }
}
?>




