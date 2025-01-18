<link rel="stylesheet" type="text/css" href="../css/productPage.css" />


<div class="container-page">
	<section class="container" id="container-product">
		<section class="product">
			<img src="<?php echo htmlentities($product['image']); ?>" alt="" id="productPicture">
			<section id="productSpecs">
				<h1 id="title"><?php echo htmlentities($product['title']); ?></h1>
				<h2 id="price">Є<?php echo htmlentities($product['price']); ?></h2>
				<section id="productDescription-box">
					<p id="description"><?php echo htmlentities($product['description']); ?></p>
				</section>

				<section id="bottom-section">
					<section id="productDescription-list">
						<ul>
							<li>Editorial: <?php echo htmlentities($product['editorial']); ?></li>
							<li>Autor: <?php echo htmlentities($product['author']); ?></li>
							<li>ISBN: <?php echo htmlentities($product['isbn']); ?></li>
							<li>Idioma: <?php echo htmlentities($product['language'] ?? 'N/A'); ?></li>
						</ul>
					</section>
					<section id="buttonArea">
						<h3 id="textAdd">Agregar a la    </h3>
						<button class="button"  onclick="addToCart(<?php echo htmlentities($product['book_id']);?>)" id="addToCart">
							<img src="../resources/icon/shoppingBag.png" id="icon-shopbag" alt="" width="40px">
						</button>
					</section>
				</section>
			</section>
		</section>
	</section>
</div>