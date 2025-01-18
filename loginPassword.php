<?php include __DIR__ . '/views/v_header.php'; ?>
<link rel="stylesheet" type="text/css" href="../css/login.css" />

<body>

	<!-- Navbar -->
	<?php
	require __DIR__ . '/controller/c_navbar.php';
	?>


	<div class="container-page" id="signup-container">
		<section class="signup-box">
			<p id="login-text-box">log in</p>
			<h1 id="bienvenido-text">Bienvenido de nuevo!</h1>
			<p id="instruction-login">Ingresa tu contraseña.</p>
			<!--<input type="email" class="text-field" placeholder="email">-->
			<input id="input-password" type="password" class="text-field" placeholder="contraseña">
			<button class="button" id="button-login" onclick="checkPassword()">continue</button>
		</section>
	</div>
</body>

<footer>
	<section>
		<h1 id="nombreFooter">&lt;\bookend&gt;</h1>
		<p id="pFooter">cada libro, un código para descifrar.</p>
	</section>
</footer>

</html>