<?php
require dirname(__FILE__) . '/../controller/entreprise_controller.php';

$entrepriseController = new EntrepriseController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $entrepriseController->createEntreprise($nom, $description);
    header('Location: dashboard_vue.php'); // Redirige vers le tableau de bord après la création
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle entreprise</title>
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
            width: 300px;
            padding: 20px;
            margin-left:4vh;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .center-input {
            text-align: center;
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
    <h1>Créer une nouvelle entreprise</h1>
    <form action="" method="POST">
        Nom: <input type="text" name="nom"><br><br>
        Description: <textarea name="description"></textarea><br><br>
        <input type="submit" value="Créer">
    </form>
</body>
</html>
