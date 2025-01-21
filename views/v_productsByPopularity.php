<?php if (!empty($popular_list)): ?>
    <?php foreach ($popular_list as $popular): ?>
        <div class="card">
            <div class="container-image"><img src="<?= htmlentities($popular['image']) ?>" class="card-image">
            </div>
            <div class="card-bottom">
                <a href="#" onclick="fetchBookDetails(event)" class="card-title" id="<?= htmlentities($popular['book_id']) ?>"
                    book-id="<?= htmlentities($popular['book_id']) ?>"><?= htmlentities($popular['title']) ?> </a>
                <p class="card-price">Є<?= htmlentities($popular['price']) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p style="text-align: center;">Aún no hay libros para esta categoría</p>
<?php endif; ?>
</div>