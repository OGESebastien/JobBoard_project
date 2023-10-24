<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controller/entreprise_controller.php';
$controller = new EntrepriseController();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vue des Entreprises</title>
</head>
<body>
<h1>Entreprises</h1>

<!-- Formulaire pour la création d'une entreprise -->
<h2>Créer une entreprise</h2>
<form action="/entreprise/create-entreprise" method="post"> <!-- Ajout du préfixe /Entreprise/ -->
    <label for="entrepriseNom">Nom de l'entreprise:</label>
    <input type="text" id="entrepriseNom" name="entrepriseNom"><br><br>
    
    <label for="entrepriseDescription">Description:</label>
    <textarea id="entrepriseDescription" name="entrepriseDescription"></textarea><br><br>
    
    <input type="submit" value="Créer">
</form>

<!-- Formulaire pour la mise à jour d'une entreprise -->
<h2>Mettre à jour une entreprise</h2>
<form action="/entreprise/update-entreprise/1" method="post"> <!-- Ajout du préfixe /Entreprise/ -->
    <label for="entrepriseNom">Nom de l'entreprise:</label>
    <input type="text" id="entrepriseNom" name="entrepriseNom"><br><br>
    
    <label for="entrepriseDescription">Description:</label>
    <textarea id="entrepriseDescription" name="entrepriseDescription"></textarea><br><br>
    
    <input type="submit" value="Mettre à jour">
</form>

<!-- Lister une entreprise spécifique -->
<h2>Voir une entreprise</h2>
<p>Cliquez sur le lien pour voir les détails de l'entreprise : <a href="/entreprise/read-entreprise/1">Entreprise ID 1</a></p> <!-- Ajout du préfixe /Entreprise/ -->

</body>
</html>
