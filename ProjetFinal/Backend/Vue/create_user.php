<?php
require dirname(__FILE__) . '/../controller/user_controller.php';


$controller = new UserController($connexion);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($controller->createUser($nom, $prenom, $mail, $password, $role)) {
        header('Location: dashboard_vue.php'); // Redirige vers le tableau de bord après la création
    } else {
        echo "Erreur lors de la création de l'utilisateur.";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 300px;
            margin: 50px auto;
            padding: 50px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 2px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #black;
            color: black;
            border: 0;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #black;
        }
    </style>

<form action="create_user.php" method="post">
    Nom: <input type="text" name="nom"><br>
    Prénom: <input type="text" name="prenom"><br>
    Email: <input type="email" name="mail"><br>
    Mot de passe: <input type="password" name="password"><br>
    Rôle: <select name="role">
        <option value="admin">Admin</option>
        <option value="utilisateur">Utilisateur</option>
    </select><br>
    <input type="submit" value="Créer un utilisateur">
</form>
