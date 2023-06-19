<main>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="assets/images/at-work.jpg" class="d-block mx-lg-auto img-fluid" alt="Logo du site" width="400" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Cuisinez comme vous êtes !</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="recettes.php" class="btn btn-primary btn-lg px-4 me-md-2">Voir nos recettes</a>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <?php

        $recipes = [
            ['title' => 'Mousse au chocolat', 'description' => 'lorem*1', 'image' => '1-chocolate-au-mousse.jpg'],
            ['title' => 'Gratin dauphinois', 'description' => 'lorem*2', 'image' => '2-gratin-dauphinois.jpg'],
            ['title' => 'Salade de chèvre', 'description' => 'Lorem*3', 'image' => '3-salade.jpg'],
        ];
        ?>
        <?php foreach ($recipes as $key => $recipe) {
            include('templates/recipe_partial.php');
        } ?>

    </div>
</main>