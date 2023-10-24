<?php
require dirname(__FILE__) . '/../controller/info_relative_controller.php';



$controller = new InfoRelativeController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courriel = $_POST['courriel_envoye'];
    $pers_annonce = $_POST['pers_annonce_concerne'];

    if ($controller->createInfoRelative($courriel, $pers_annonce)) {
        header('Location: dashboard_vue.php');
    } else {
        echo "Erreur lors de la création.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une Info Relative</title>
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
            padding: 50px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
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
    <form action="create_info_relative.php" method="post">
        <label for="courriel_envoye">Courriel Envoyé:</label>
        <input type="text" name="courriel_envoye" required><br><br>

        <label for="pers_annonce_concerne">Personne Annonce Concernée:</label>
        <input type="text" name="pers_annonce_concerne" required><br><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
