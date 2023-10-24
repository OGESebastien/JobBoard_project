<?php
require dirname(__FILE__) . '/../controller/user_controller.php';
require dirname(__FILE__) . '/../controller/annonces_controller.php';
require dirname(__FILE__) . '/../controller/entreprise_controller.php';
require dirname(__FILE__) . '/../controller/info_relative_controller.php';

$type = $_GET['type'] ?? null;
$id = $_GET['id'] ?? null;

if (!$type || !$id) {
    die("Paramètres manquants.");
}

switch ($type) {
    case 'user':
        $userController = new UserController();
        $result = $userController->deleteUser($id);
        break;

    case 'annonce':
        $annonceController = new AnnoncesController();
        $result = $annonceController->deleteAnnonce($id);  // Assurez-vous d'avoir une méthode deleteAnnonce
        break;

    case 'entreprise':
        $entrepriseController = new EntrepriseController();
        $result = $entrepriseController->deleteEntreprise($id);  // Assurez-vous d'avoir une méthode deleteEntreprise
        break;

    case 'info':
        $infoController = new InfoRelativeController();
        $result = $infoController->deleteInfo($id);  // Assurez-vous d'avoir une méthode deleteInfo
        break;

    default:
        die("Type inconnu.");
}

if (!$result) {
    die("Erreur lors de la suppression.");
}

header('Location: dashboard_vue.php');  // Redirige vers le tableau de bord après la suppression
?>
