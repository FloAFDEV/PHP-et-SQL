<?php


function getRecipeById(PDO $pdo, int $id)
{
    $query = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}
// var_dump($recipe);

function getRecipeImage($image)
{
    // Si l'image est null, on affiche une image par défaut
    if ($image === null) {
        return _ASSETS_IMG_PATH_ . 'recipe_default.jpg';
    } else
    // Sinon on affiche l'image de la recette
    {
        return _RECIPES_IMG_PATH_ . $image;
    }
}

function getRecipes(PDO $pdo, int $limit = null){
    $sql = 'SELECT * FROM recipes ORDER BY id DESC';

    if ($limit) {
        $sql .= ' LIMIT :limit';
    }

$query = $pdo->prepare($sql);

if ($limit) {
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
}
$query->execute();
return $query->fetchAll();
}
