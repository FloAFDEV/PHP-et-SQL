
<div class="col-md-4 my-2 d-flex justify-content-around">
    <div class="card" style="width: 18rem;">
        <img src="<?= _RECIPES_IMG_PATH_ . $recipe['image']; ?>" class="card-img-top" alt="<?= $recipe['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $recipe['title']; ?></h5>
            <p class="card-text"><?= $recipe['description']; ?></p>
            <a href="#" class="btn btn-primary">Voir cette recette</a>
        </div>
    </div>
</div>