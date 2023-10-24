<?php


require '/home/theo/Projet/ProjetWeb/Backend/controller/info_relative_controller.php';
$controller = new InfoRelativeController();

// Lire une information relative
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match("#^/info_relative/read-info/(\d+)$#", $request_uri, $matches)) {
    $id = $matches[1];
    $info = $controller->readInfo($id);
    if ($info) {
        echo "Courriel envoyé : " . $info['courriel_envoye'] . "<br>";
        echo "Personne concernée par l'annonce : " . $info['pers_annonce_concerne'];
    } else {
        echo "Information relative non trouvée.";
    }
} 

// Créer une information relative
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $request_uri === '/info_relative/create-info') {
    $controller->createInfo();
} 

// Mettre à jour une information relative
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && preg_match("#^/info_relative/update-info/(\d+)$#", $request_uri, $matches)) {
    $id = $matches[1];
    $controller->updateInfo($id);
}

// Supprimer une information relative
elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && preg_match("#^/info_relative/delete-info/(\d+)$#", $request_uri, $matches)) {
    $id = $matches[1];
    $controller->deleteInfo($id);
} 

else {
    echo "Page non trouvée.";
}
