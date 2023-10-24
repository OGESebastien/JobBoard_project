<?php
require_once '../controller/annonces_controller.php';

$controller = new AnnoncesController();
$annonces = $controller->getAllAnnonces();

// Renvoyer les en-têtes appropriés pour du JSON
header('Content-Type: application/json');

// Afficher les annonces au format JSON
echo json_encode($annonces);



// require_once '../controller/annonces_controller.php';

// $id = [1];  // remplacez par l'ID de l'annonce que vous souhaitez supprimer
// $controller = new AnnoncesController();
// $result = $controller->deleteAnnonce($id);

// if ($result) {
//     echo "Annonce supprimée avec succès !";
// } else {
//     echo "Erreur lors de la suppression de l'annonce.";
// }