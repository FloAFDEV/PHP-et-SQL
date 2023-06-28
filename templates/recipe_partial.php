<div class="col-md-4 my-2 d-flex justify-content-around text-start">
    <div class="card" style="width: 18rem;">
        <img src="<?= getRecipeImage($recipe['image']); ?>" class="card-img-top" alt="<?= $recipe['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $recipe['title']; ?></h5>
            <p class="card-text"><?= $recipe['description']; ?></p>
            <a href="recette.php?id=<?= $recipe['id']; ?>" class="btn btn-primary mb-0">Voir la recette</a>
            <!-- //J'appelle l'index de mon tableau avec la clé $key , en ajoutant ###.php?id-->
        </div>
    </div>
</div>