<?php
// Ici, vous pouvez inclure tous les contrôleurs de modèle nécessaires
require dirname(__FILE__) . '/../controller/info_relative_controller.php';

$infoController = new InfoRelativeController();

// Assurez-vous d'avoir l'ID de l'information relative pour pouvoir la modifier
$id = $_GET['id'];

// Traitement du formulaire POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous de valider et d'assainir les entrées avant de les utiliser.
    $courrielEnvoye = $_POST['courriel_envoye'];
    $persAnnonceConcerne = $_POST['pers_annonce_concerne'];

    $result = $infoController->updateInfo($id, $courrielEnvoye, $persAnnonceConcerne);

    if ($result) {
        header("Location: /Vue/dashboard_vue.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'information relative.";
    }
}

// Vous pouvez également récupérer les données actuelles de l'information relative pour préremplir le formulaire
$currentInfo = $infoController->getInfoById($id);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour de l'information relative</title>
    <!-- vos autres métadonnées, feuilles de style, etc. -->
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
            margin-left:40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
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
    <h2>Mise à jour de l'information relative</h2>

    <form action="edit_info_relative.php?id=<?php echo $id; ?>" method="post">
        <label for="courriel_envoye">Courriel Envoyé:</label>
        <input type="text" id="courriel_envoye" name="courriel_envoye" value="<?php echo $currentInfo['courriel_envoye']; ?>" required>

        <label for="pers_annonce_concerne">Personne Annonce Concernée:</label>
        <input type="text" id="pers_annonce_concerne" name="pers_annonce_concerne" value="<?php echo $currentInfo['pers_annonce_concerne']; ?>" required>

        <input type="submit" value="Mettre à jour">
    </form>

    <!-- Le reste de votre code HTML ici, par exemple un lien pour revenir à la liste ou au tableau de bord -->

</body>
</html>
