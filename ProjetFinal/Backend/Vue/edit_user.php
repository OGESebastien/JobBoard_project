<?php
require dirname(__FILE__) . '/../controller/user_controller.php';

$userController = new UserController();
$user = $userController->readUser($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_GET['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $role = $_POST['role']; // récupère la valeur du champ texte pour le rôle

    if ($password) {
        $password = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $password = $user['password']; // si le mot de passe n'est pas modifié, utilisez l'ancien
    }

    $userController->updateUser($userId, $nom, $prenom, $mail, $password, $role);
    header("Location: /Vue/dashboard_vue.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #black;
            color: #black;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #black;
        }

        input[type="submit"]:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <h1>Modifier un utilisateur</h1>
    <form action="" method="POST">
        Nom: <input type="text" name="nom" value="<?= $user['nom'] ?>"><br><br>
        Prénom: <input type="text" name="prenom" value="<?= $user['prenom'] ?>"><br><br>
        Email: <input type="email" name="mail" value="<?= $user['mail'] ?>"><br><br>
        Password: <input type="password" name="password" placeholder="Laissez vide pour ne pas changer"><br><br>
        Rôle: <input type="text" name="role" value="<?= $user['role'] ?>"><br><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
