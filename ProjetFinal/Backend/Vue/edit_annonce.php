<?php
require dirname(__FILE__) . '/../controller/annonces_controller.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Identifiant de l'annonce manquant.");
}

$annonceController = new AnnoncesController();
$annonce = $annonceController->getAnnonceById($id); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $lieu = $_POST['lieu'];
    $salaire = $_POST['salaire'];
    $temps_travail = $_POST['temps_travail'];
    $domaine = $_POST['domaine'];
    $type_poste = $_POST['type_poste'];

    $result = $annonceController->updateAnnonce($id, $titre, $description, $lieu, $salaire, $temps_travail, $domaine, $type_poste);

    if ($result) {
        header('Location: dashboard_vue.php');
        exit;
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une annonce</title>
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
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            gap: 15px;
            margin-left: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
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

<h2>Modifier une annonce</h2>

<form action="edit_annonce.php?id=<?php echo $id; ?>" method="post">
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre" value="<?php echo $annonce['titre']; ?>" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?php echo $annonce['description']; ?></textarea>

    <label for="lieu">Lieu:</label>
    <input type="text" id="lieu" name="lieu" value="<?php echo $annonce['lieu']; ?>" required>

    <label for="salaire">Salaire:</label>
    <input type="number" id="salaire" name="salaire" value="<?php echo $annonce['salaire']; ?>" required>

    <label for="temps_travail">Temps de travail par mois:</label>
    <input type="number" id="temps_travail" name="temps_travail" value="<?php echo $annonce['temps_travail']; ?>" required>

    <label for="domaine">Domaine:</label>
    <input type="text" id="domaine" name="domaine" value="<?php echo $annonce['domaine']; ?>" required>

    <label for="type_poste">Type de poste:</label>
    <input type="text" id="type_poste" name="type_poste" value="<?php echo $annonce['type_poste']; ?>" required>

    <input type="submit" value="Mettre à jour">
</form>

</body>
</html>
