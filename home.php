<?php include __DIR__ . '/views/v_header.php'; ?>
<link rel="stylesheet" type="text/css" href="../css/home.css" />

<body>

	<!-- Navbar -->
	<?php
	require __DIR__ . '/controller/c_navbar.php';
	?>

	<section class="container-page" id="home">
		<section class="container" id="top-block">
			<section class="textbox">
				<h1>¿Qué vas a leer hoy?</h1>
				<p>Tu próximo libro favorito te espera en esta página hecha para sorprenderte</p>
				<img src="../resources/img/coverPic.png" alt="" width="440px">
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

		<!-- book of the season = bos -->
		<section class="container" id="bos">
			<section id="text_bos">
				<section id="header_bos">
					<h1 id="title_bos">El libro del otoño</h1>
					<p id="subtitle_bos">una manta y este libro es todo lo que vas a necesitar</p>
				</section>
				<p>El autor de la serie de libros Before the Coffee Gets Cold, vuelve con nuevos relatos dentro de la
					misteriosa cafeteria de Tokio donde estos
					giran entorno a las relaciones y la empatia que requieren.</p>
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
		<div id="cart-footer-content">
			<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
				require __DIR__ . '/controller/c_visibleCart.php';
			} ?>
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

		const targetNode = document.getElementById('cart-display');

		const observer = new MutationObserver((mutationsList, observer) => {
			for (let mutation of mutationsList) {
				if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
					const displayStyle = window.getComputedStyle(targetNode).display;
					if (displayStyle === 'none') {
						console.log('El estilo display ha cambiado a none');

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
										response.total_price = parseFloat(response.total_price).toFixed(2);
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

		const config = { attributes: true, attributeFilter: ['style'] };

		observer.observe(targetNode, config);
	});
</script>

</html>