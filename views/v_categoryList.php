
<div  class="grid-container"> 
<?php
foreach ($resultado_categorias as $categoria) {
    // Render for the grid cards
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