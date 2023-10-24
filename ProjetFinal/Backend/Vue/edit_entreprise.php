<?php
require dirname(__FILE__) . '/../controller/entreprise_controller.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Identifiant de l'entreprise manquant.");
}

$entrepriseController = new EntrepriseController();
$entreprise = $entrepriseController->getEntrepriseById($id); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $result = $entrepriseController->updateEntreprise($id, $nom, $description);

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
    <title>Modifier une entreprise</title>
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
            margin-left:30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
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

<h2>Modifier une entreprise</h2>

<form action="edit_entreprise.php?id=<?php echo $id; ?>" method="post">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?php echo $entreprise['nom']; ?>" required>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?php echo $entreprise['description']; ?></textarea>
    
    <input type="submit" value="Mettre à jour">
</form>

</body>
</html>
