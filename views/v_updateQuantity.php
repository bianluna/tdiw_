<?php session_start(); ?>
<span id="quantity-"<?php echo htmlentities($_SESSION['book_id']);?>> <?php echo htmlentities($_SESSION['quantity']); ?> </span>