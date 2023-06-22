<?php

$recipes = [
    ['title' => 'Mousse au chocolat', 'description' => 'La mousse au chocolat est un dessert dont la composition traditionnelle comporte au minimum du chocolat et du blanc d\'œuf, monté en neige. Elle peut parfois être agrémentée de jaune d\'œuf, de sucre ou de crème montée, d\'épices ou de zestes d\'agrumes', 'image' => '1-chocolate-au-mousse.jpg'],
    ['title' => 'Gratin dauphinois', 'description' => 'Plat cuisiné à partir de pommes de terre. Il s\'agit de pommes de terre coupées en fines rondelles avec de la crème fraîche et du fromage par dessus. Le tout est cuit au four pour gratiner', 'image' => '2-gratin-dauphinois.jpg'],
    ['title' => 'Salade de chèvre', 'description' => 'Une salade de chèvre chaud est une recette de cuisine de salade composée, de la cuisine française, à base de salade et de fromage au lait de chèvre chaud, servie sur des tranches de pain.', 'image' => '3-salade.jpg'],
];


function getRecipeById(PDO $pdo, int $id)
{
    $query = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}
// var_dump($recipe);

function getRecipeImage(string $image)
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
