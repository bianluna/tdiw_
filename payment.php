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
	<link rel="stylesheet" type="text/css" href="../css/home.css" />
	
	<script src="../js/funciones.js"> </script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"
		integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

	<!-- Navbar -->
	<?php
	require __DIR__ . '/controller/c_navbar.php';
	?>

	<!-- Main Content -->
	<div class="container" id="container-payment-confirmation">
        <!-- Payment -->
            <img src="resources/icons/paymentCheck.png" alt="" width="60px">
            <div id="payment-text">
                <h1>¡ compra realizada !</h1>
                <h4>esperamos que disfrutes de tu nueva lectura</h4>
            </div>
            
            <img src="resources/icons/bookPayment.png" alt="" width="150px">

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