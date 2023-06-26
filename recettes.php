<?php

require_once('templates/header.php');
require_once('lib/recipe.php');

$recipes = getRecipes($pdo);
?>

<main>
    <div class="container col-xxl-8 px-4 py-5">
        <h1>Liste des recettes</h1>
    </div>

    <div class="row text-center">
        <?php foreach ($recipes as $key => $recipe) {
            include('templates/recipe_partial.php');
        } ?>

    </div>
</main>

<?php require_once('templates/footer.php'); ?>