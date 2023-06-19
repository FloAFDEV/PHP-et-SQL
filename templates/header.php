<?php
require_once('lib/config.php');

$currentPage = basename($_SERVER["SCRIPT_NAME"]);
//Permet d'écouter l'index de page pour le mettre en active (voir plus loin dans le liens, attention la classe bootstrap doit être compatible pour pouvoir l'afficher)

// if ($currentPage === 'index.php') {
//     echo 'active';
// }

// affiche le nom du fichier courant
// var_dump($_SERVER["SCRIPT_NAME"]);
// echo basename($_SERVER["SCRIPT_NAME"]);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="Assets/CSS/override-bootstrap.CSS" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>


    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img width="120" src="assets/images/Logo1.jpg" alt="Logo du site_small">
                    <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
                <li class=nav-item><a href="index.php" class="nav-link <?php if ($currentPage === 'index.php') {
                                                                            echo 'active';
                                                                        } ?>">Accueil</a></li>
                <li class=nav-item><a href="recettes.php" class="nav-link <?php if ($currentPage === 'recettes.php') {
                                                                                echo 'active';
                                                                            } ?>">Nos recettes</a></li>
                <li class=nav-item><a href="#" class="nav-link px-2">Pricing</a></li>
                <li class=nav-item><a href="#" class="nav-link px-2">FAQs</a></li>
                <li class=nav-item><a href="#" class="nav-link px-2">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </header>