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
	<section class="container-page" id="home">
		<section class="container">
			<section class="textbox">
				<h1>¿Qué vas a leer hoy?</h1>
				<p>Tu próximo libro favorito te espera en esta colección hecha para sorprenderte</p>
				<button class="button">Descúbrela</button> <!--onclick="goToSection('header_bos')"-->
			</section>
		</section>

		<!-- Recomendaciones -->
		<section class="container" id="destacados">
			<h1>Nuestras Recomendaciones</h1>
			<p>Encuentra ese título que necesitabas pero no lo sabías</p>
			<section class="grid-container">
				<?php
				$isNavbar = true;
				require __DIR__ . '/controller/c_recommendedProducts.php';
				?>
			</section>
		</section>

		<section class="container" id="bos">
			<section id="text_bos">
				<section id="header_bos">
					<h1 id="title_bos">El libro del otoño</h1>
					<p id="subtitle_bos">una manta y este libro es todo lo que vas a necesitar</p>
				</section>
				<p>El autor de la serie de libros Before the Coffee Gets Cold, vuelve con nuevos relatos dentro de la
					misteriosa cafeteria de Tokio donde estos
					giran entorno a las relaciones y la empatia que requieren.</p>
				<button class="button" id="button_bos" onclick="">Ver más</button>
			</section>
			<section id="cover_bos">
				<img src="../media/books/bosPic.jpg" alt="" id="img_bos">
			</section>

		</section>
		<section class="container" id="rox-bestsellers">
			<h1>Populares entre los lectores</h1>
			<p>Si muchos los leyeron por algo es... no?</p>
			<section class="grid-container">
				<?php
				$isNavbar = true;
				require __DIR__ . '/controller/c_popularProducts.php';
				?>
			</section>
		</section>
	</section>

	<section id="book-display" style="display: none;">
		<div>
			<section>
			</section>
		</div>
	</section>

	<!-- Cart -->
	<section class="cart" id="cart-display" style="display: none;">
		<div class="cart-content">
		</div>
	</section>

	<!-- Visible cart -->
	<section class="cart-footer" id="always-visible-cart">
		<div class="card" id="cart-footer-content">
			<?php require __DIR__ . '/controller/c_visibleCart.php'; ?>
		</div>
	</section>

	<!-- Footer -->
	<footer>
		<section>
			<h1 id="nombreFooter">&lt;\bookend&gt;</h1>
			<p id="pFooter">Cada libro, un código para descifrar.</p>
		</section>
	</footer>

</body>

<script>
	$(function () {
		// Seleccionar el elemento a observar
		const targetNode = document.getElementById('cart-display');

		// Configurar el observer
		const observer = new MutationObserver((mutationsList, observer) => {
			for (let mutation of mutationsList) {
				if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
					const displayStyle = window.getComputedStyle(targetNode).display;
					if (displayStyle === 'none') {
						console.log('El estilo display ha cambiado a none');
						// Aquí puedes agregar el código que deseas ejecutar cuando el display sea none
					} else {
						console.log('El estilo display ha cambiado a', displayStyle);
						$('.card button').each(function () {
							console.log($(this).closest('.card'));
							console.log($(this).closest('.card').find('.card-title').attr('id'));
							console.log($(this).closest('.card').find('input'));
							$(this).click(function () {
								let book_id = $(this).closest('.card').find('.card-title').attr('id');
								let input_element = $(this).closest('.card').find('input');
								let quantity = input_element.val();
								let action = $(this).text();
								console.log("book_id: ", book_id, "quantity: ", quantity, 'action: ', action);
								$.ajax({
									url: '../controller/c_cart_update.php',
									method: 'POST',
									data: {
										book_id: book_id,
										quantity: quantity,
										action: action
									},
									success: function (response) {
										console.log(response);
										response = JSON.parse(response);
										var quantity = String(response.quantity).trim;
										if (quantity === '0') {
											input_element.closest('.card').remove();
										}
										input_element.val(response.quantity);
										response.total_price = response.total_price;
										$('#cart-price').text(response.total_price);
									},
									error: function (xhr, status, error) {
										console.error('Error:', error);
									}
								});
							});
						});
					}
				}
			}
		});

		// Opciones de configuración del observer
		const config = { attributes: true, attributeFilter: ['style'] };

		// Iniciar la observación
		observer.observe(targetNode, config);
	});
</script>

</html>