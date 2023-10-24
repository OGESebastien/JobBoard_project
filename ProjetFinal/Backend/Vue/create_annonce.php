<?php
require dirname(__FILE__) . '/../controller/annonces_controller.php';

$controller = new AnnoncesController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $salaire = $_POST['salaire'];
    $lieu = $_POST['lieu'];
    $temps_travail = $_POST['temps_travail'];
    $domaine = $_POST['domaine'];
    $type_poste = $_POST['type_poste'];

    $controller->createAnnonce($titre, $description, $salaire, $lieu, $temps_travail, $domaine, $type_poste);
    header('Location: dashboard_vue.php'); // Redirige vers le tableau de bord après la création
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Annonce</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            background: #333;
            color: #fff;
            padding: 1rem 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 50px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #333;
            color: #fff;
            border: 0;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <h2>Créer une nouvelle annonce</h2>
    <form action="create_annonce.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>

        <label for="salaire">Salaire :</label>
        <input type="number" step="0.01" id="salaire" name="salaire" required>

        <label for="lieu">Lieu :</label>
        <input type="text" id="lieu" name="lieu" required>

        <label for="temps_travail">Temps de travail (en heures) :</label>
        <input type="number" id="temps_travail" name="temps_travail" required>

        <label for="domaine">Domaine :</label>
        <input type="text" id="domaine" name="domaine" required>

        <label for="type_poste">Type de poste :</label>
        <input type="text" id="type_poste" name="type_poste" required>

        <input type="submit" value="Créer">
    </form>
</body>
</html>
