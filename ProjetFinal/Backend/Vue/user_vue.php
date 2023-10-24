<?php
require_once '../controller/user_controller.php'; 
$controller = new UserController();

// Récupération de l'ID depuis l'URL.
$parts = explode('/', $_SERVER['REQUEST_URI']);
$id = end($parts);

$user = $controller->readUser($id);

if ($user) {
    echo "<h1>Détails de l'utilisateur</h1>";
    echo "Nom : " . $user['nom'] . "<br>";
    echo "Prénom : " . $user['prenom'] . "<br>";
    echo "E-mail : " . $user['mail'] . "<br>";
    echo "ID : " . $user['id_user'] . "<br>";

    echo "</form>";
} else {
    echo "Utilisateur non trouvé.";
}
?>
