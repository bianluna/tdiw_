
<div  class="grid-container" id="container-cards-books-category"> 
    <?php
        foreach ($resultado_categorias as $categoria) {
            echo '
            <div id="cards-categories">           
                <div class="card" id="card-category">
                    <a href="#" onClick="booksByCategory(event)" data-category-id="' . htmlentities($categoria['category_id']) . '"> 
                        ' . htmlentities($categoria['type']) . '
                    </a>
                </div> 
            </div> 
                ';
        }
    ?>
</div>