<?php
require_once '../controller/login_controller.php'; 
$loginController = new LoginController();

// Gestion du formulaire de connexion lorsqu'il est soumis.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->loginUser();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <label for="loginEmail">E-mail:</label>
            <input type="email" id="loginEmail" name="loginEmail" required>
        </div>

        <div>
            <label for="loginPassword">Mot de passe:</label>
            <input type="password" id="loginPassword" name="loginPassword" required>
        </div>

        <div>
            <input type="submit" value="Se connecter">
        </div>
    </form>

</body>
</html>
