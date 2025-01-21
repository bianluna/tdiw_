<?php include __DIR__ . '/views/v_header.php'; ?>
<link rel="stylesheet" type="text/css" href="../css/home.css" />

<body>

	<!-- Navbar -->
	<?php
	require __DIR__ . '/controller/c_navbar.php';
	?>

	<section class="container-page" id="home"></section>
	<section class="cart" id="cart-display" style="display: none;"></section>
	<section id="book-display">

		<!-- Main Content -->
		<div class="container" id="container-payment-confirmation">
			<!-- Payment -->
			<img src="resources/icon/paymentCheck.png" alt="" width="60px">
			<div id="payment-text">
				<h1>¡ compra realizada !</h1>
				<h4>esperamos que disfrutes de tu nueva lectura</h4>
			</div>

			<img src="resources/icon/bookPayment.png" alt="" width="150px">

		</div>

	</section>


	<footer>
		<section>
			<h1 id="nombreFooter">&lt;\bookend&gt;</h1>
			<p id="pFooter">Cada libro, un código para descifrar.</p>
		</section>
	</footer>

</body>


</html>