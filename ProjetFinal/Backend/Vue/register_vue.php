<?php
require_once '../controller/register_controller.php'; 
$registerController = new RegisterController();

// Gestion du formulaire d'inscription lorsqu'il est soumis.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registerController->registerUser();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Vous pouvez ajouter des liens vers des feuilles de style, des frameworks CSS ou tout autre ressource que vous utilisez -->
</head>
<body>
    <h1>Inscription</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <label for="registerName">Nom:</label>
            <input type="text" id="registerName" name="registerName" required>
        </div>

        <div>
            <label for="registerPrenom">Prénom:</label>
            <input type="text" id="registerPrenom" name="registerPrenom" required>
        </div>

        <div>
            <label for="registerEmail">E-mail:</label>
            <input type="email" id="registerEmail" name="registerEmail" required>
        </div>

        <div>
            <label for="registerPassword">Mot de passe:</label>
            <input type="password" id="registerPassword" name="registerPassword" required>
            <small>Doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</small>
        </div>

        <div>
            <input type="submit" value="S'inscrire">
        </div>
    </form>

</body>
</html>
