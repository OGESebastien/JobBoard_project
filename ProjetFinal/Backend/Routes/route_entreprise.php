<?php
require '/home/theo/Projet/ProjetWeb/Backend/controller/entreprise_controller.php';
$controller = new EntrepriseController();

// Lire une entreprise
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match("#^/entreprise/read-entreprise/(\d+)$#", $request_uri, $matches)) {
    $id = $matches[1];
    $entreprise = $controller->readEntreprise($id);
    if ($entreprise) {
        echo "Nom de l'entreprise: " . $entreprise['nom'] . "<br>";
        echo "Description: " . $entreprise['description'];
    } else {
        echo "Entreprise non trouvée.";
    }
} 

// Créer une entreprise
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $request_uri === '/entreprise/create-entreprise') {
    $controller->createEntreprise();
} 


// Mettre à jour une entreprise
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && preg_match("#^/entreprise/update-entreprise/(\d+)$#", $request_uri, $matches)) {
    $id = $matches[1];
    $controller->updateEntreprise($id);
}

// Supprimer une entreprise
elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && preg_match("#^/delete-entreprise/(\d+)$#", $request_uri, $matches)) {
    $id = $matches[1];
    $controller->deleteEntreprise($id);
} 

else {
    echo "Page non trouvée.";
}
?>
