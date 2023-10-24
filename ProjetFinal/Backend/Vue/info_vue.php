<?php

// READ 

require_once '../controller/info_relative_controller.php'; 
$controller = new InfoRelativeController();

// Récupération de l'ID depuis l'URL.
$parts = explode('/', $_SERVER['REQUEST_URI']);
$id = end($parts);

$info = $controller->readInfo($id);
if ($info) {
    echo "<h1>Details</h1>";
    echo "Courriel envoyé: " . $info['courriel_envoye'] . "<br>";
    echo "Personne concernée par l'annonce: " . $info['pers_annonce_concerne'];
} else {
    echo "Information non trouvée.";
}

?>


