<?php
require_once('templates/header.php');

$errors = [];
$messages = [];

$users=[
    ['email' => 'abc@test.com', 'password' => '123456'],
    ['email' => 'test@test.com', 'password' => 'test'],
];


if (isset($_POST['loginUser'])) {

    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if ($user && $user['password'] === $_POST['password']) {
        $messages[] = 'Vous êtes connecté';
    } else {
        $errors[] = 'Identifiants incorrects';
    }
}

?>

<h1>Connexion</h1>


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
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <input type="submit" value="Connexion" name="loginUser" class="btn btn-primary">
</form>

<?php
require_once('templates/footer.php');
?>