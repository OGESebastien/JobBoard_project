<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once dirname(__FILE__) . '/../Config/bdd_connect.php';

$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->location) && isset($data->jobTitle)) {
    $location = trim($data->location);
    $jobTitle = trim($data->jobTitle);

    // Requête SQL pour rechercher des annonces en fonction de la localisation et du métier recherché
    $query = "SELECT * FROM annonces WHERE domaine LIKE ?";

    if (!empty($location)) {
        $query .= " AND lieu LIKE ?";
    }

    $stmt = $connexion->prepare($query);

    if (!empty($location)) {
        $stmt->execute(["%$jobTitle%", "%$location%"]);
    } else {
        $stmt->execute(["%$jobTitle%"]);
    }

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        echo json_encode($results);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>
