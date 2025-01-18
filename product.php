<!DOCTYPE html>
<html lang="es">

<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
		rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividad -->
	<title>&lt;\bookend&gt;</title>
	<link rel="icon" href="../media/brand/faviconPage.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/productPage.css" />
	<script src="../js/funciones.js"> </script>
</head>

<body>
	<h1>ESTO ES UNA PRUEBA</h1>
	<!-- Navbar -->
	<nav class="navbar">
		<div class="navbar-content">
			<!-- Logo Navbar -->
			<div class="logo" id="logo">
				<a href="../index.php">
					<img src="../media/brand/logoBrand.png" alt="Bookend Logo" width="135px" />
				</a>
			</div>

			<!-- Search Bar -->
			<div class="search-bar">
				<input type="text" placeholder="¿ qué libro buscas ?" />
			</div>

			<!-- Navigation Links -->
			<div class="nav-links" id="links">
				<div class="dropdown">
					<a href="#" onclick="listCategories(event)">categorías</a>
					<div class="dropdown-content">
						<?php
						$isNavbar = true;
						require __DIR__ . '/controller/c_categories.php';
						?>
					</div>
				</div>
			</div>

			<!-- Icons -->
			<div class="nav-icons" id="icons">
				<a href="login.php">
					<img src="../resources/icon/user.png" alt="User Icon" width="20px" />
				</a>
				<a href="home.php">
					<img src="../resources/icon/cart.png" alt="Cart Icon" width="20px" />
				</a>
			</div>
		</div>
	</nav>

	<!-- Main Content -->
	<div class="container-page">
		<section class="container">
			<section class="product">
				<?php
				require __DIR__ . '/controller/c_product.php';
				?>
			</section>
		</section>



	</div>

	<!-- Footer -->
	<footer>
		<section>
			<h1 id="nombreFooter">&lt;\bookend&gt;</h1>
			<p id="pFooter">Cada libro, un código para descifrar.</p>
		</section>
	</footer>

</body>

</html>