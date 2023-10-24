<?php

require './controller/annonces_controller.php';
$controllerAnnonce = new AnnoncesController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $request_uri === '/annonce/annonces-json') {
    echo $controllerAnnonce->getAnnoncesJSON();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $request_uri === '/create-annonce') {
    $data = $_POST;  // Si vos données sont envoyées en tant que formulaire
    // $data = json_decode(file_get_contents('php://input'), true); // Si vos données sont envoyées en tant que JSON
    $result = $controllerAnnonce->createAnnonce($data);
    if ($result) {
        header("Location: /annonce_list.php");
        exit;
    } else {
        echo "Erreur lors de la création de l'annonce.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($request_uri, '/update-annonce/') === 0) {
    $id = substr($request_uri, strlen('/update-annonce/'));
    $data = $_POST;  // Comme ci-dessus, adaptez selon la manière dont les données sont envoyées
    $result = $controllerAnnonce->updateAnnonce($id, $data);
    if ($result) {
        header("Location: /annonce_list.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'annonce.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && strpos($request_uri, '/delete-annonce/') === 0) {
    // Note : La suppression est généralement réalisée avec la méthode HTTP DELETE
    $id = substr($request_uri, strlen('/delete-annonce/'));
    $result = $controllerAnnonce->deleteAnnonce($id);
    if ($result) {
        header("Location: /annonce_list.php");
        exit;
    } else {
        echo "Erreur lors de la suppression de l'annonce.";
    }
}
