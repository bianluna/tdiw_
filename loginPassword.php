<?php include __DIR__ . '/views/v_header.php'; ?>
<link rel="stylesheet" type="text/css" href="../css/login.css" />

<body>

	<!-- Navbar -->
	<?php
	require __DIR__ . '/controller/c_navbar.php';
	?>

	<section class="container-page" id="home"></section>
	<section class="cart" id="cart-display" style="display: none;"></section>
	<section id="book-display">


		<div class="container-page" id="signup-container">
			<section class="signup-box">
				<p id="login-text-box">log in</p>
				<h1 id="bienvenido-text">Bienvenido de nuevo!</h1>
				<p id="instruction-login">Ingresa tu contraseña.</p>
				<input id="input-password" type="password" class="text-field" placeholder="contraseña">
				<button class="button" id="button-login" onclick="checkPassword()">continue</button>
			</section>
		</div>
	</section>
</body>

<footer>
	<section>
		<h1 id="nombreFooter">&lt;\bookend&gt;</h1>
		<p id="pFooter">cada libro, un código para descifrar.</p>
	</section>
</footer>

</html>