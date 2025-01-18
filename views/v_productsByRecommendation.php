<?php if (!empty($recommended_list)): ?>
    <?php foreach ($recommended_list as $recommendation): ?>
        <div class="card">
            <div class="container-image"><img src="<?= htmlentities($recommendation['image']) ?>" class="card-image">
            </div>
            <div class="card-bottom">
                <a href="#" onclick="getBook(event)" class="card-title" id="<?= htmlentities($recommendation['book_id']) ?>"
                    book-id="<?= htmlentities($recommendation['book_id']) ?>"><?= htmlentities($recommendation['title']) ?></a>
                <p class="card-price">Є<?= htmlentities($recommendation['price']) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No s'han trobat llibres per aquesta categoria.</p>
<?php endif; ?>
</div>