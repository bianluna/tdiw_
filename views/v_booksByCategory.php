<div class="container" id="container-cards-books-category">
    <h1><?= htmlentities($category_name) ?></h1>
    <div class="grid-container">

        <?php if (!empty($products_list)): ?>
            <?php foreach ($products_list as $popular): ?>
                <div class="card">
                    <div class="container-image"><img src="<?= htmlentities($popular['image']) ?>" class="card-image"> 
                        </div>
                    <div class="card-bottom">
                        <a href="#" onclick="getBook(event)" class="card-title" id="<?= htmlentities($popular['book_id']) ?>" 
                        book-id="<?= htmlentities($popular['book_id']) ?>"><?= htmlentities($popular['title']) ?></a>
                        <p class="card-price">Є<?= htmlentities($popular['price']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No s'han trobat llibres per aquesta categoria.</p>
        <?php endif; ?>
    </div>
</div>

