<?php
require_once('templates/header.php');
require_once('lib/recipe.php');
require_once('lib/tools.php');
require_once('lib/category.php');


$errors = [];
$messages = [];
$recipe = [
    'title' => '',
    'description' => '',
    'ingredients' => '',
    'instructions' => '',
    'category' => '',
];

$categories = getCategories($pdo);


if (isset($_POST['saveRecipe'])) {

    $fileName = null;

    // si un fichier a été envoyé
    if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {

        // Vérifier si le fichier image est une image réelle ou une image fausse
        $checkImage = getimagesize($_FILES['file']['tmp_name']);

        // Si c'est une image, on récupère les données du fichier
        if ($checkImage !== false) {

            // On récupère l'extension du fichier et on lui donne un nom unique pour pas écraser les fichiers portant le même nom
            $fileName = uniqid() . '_' . slugify($_FILES['file']['name']);

            // On déplace le fichier dans le dossier uploads
            move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH_ . $fileName);
        } else {
            // Si ce n'est pas une image, on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }




    if (!$errors) {
        $res = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $fileName);

        if ($res) {
            $messages[] = 'La recette a bien été ajoutée';
        } else {
            $errors[] = 'Erreur lors de l\'ajout de la recette';
        }
    }
}

$recipe = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'ingredients' => $_POST['ingredients'],
    'instructions' => $_POST['instructions'],
    'category' => $_POST['category'],
];

// var_dump($_POST);

// var_dump($recipes[$id]); //affiche le tableau de la recette selectionnée
?>

<h1>Ajouter une recette</h1>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success"><?= $message; ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger"><?= $error; ?>
    </div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $recipe['title'] ?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?= $recipe['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredients</label>
        <textarea name="ingredients" id="ingredients" cols="30" rows="5" class="form-control"><?= $recipe['ingredients'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="instructions" class="form-label">Instructions</label>
        <textarea name="instructions" id="instructions" cols="30" rows="5" class="form-control"><?= $recipe['instructions'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Catégorie</label>
        <select name="category" id="category" class="form-control">

            <!-- On affiche les catégories dans le select -->
            <?php foreach ($categories as $category) { ?>
                <option value="<?= $category['id'] ?>"><?php if ($recipe['category_id'] == $category['id']) {
                                                            echo 'selected="selected"';
                                                        } ?><?= $category['name'] ?></option>
            <?php } ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Image</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>
    <input type="submit" value="Ajouter" name="saveRecipe" class="btn btn-primary">
</form>

<?php
require_once('templates/footer.php');
?>