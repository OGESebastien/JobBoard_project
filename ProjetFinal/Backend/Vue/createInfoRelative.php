<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, OPTIONS'); // <--- J'ai ajouté OPTIONS ici
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}




require_once dirname(__FILE__) . '/../Config/bdd_connect.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->courriel_envoye) && isset($data->pers_annonce_concerne)) {
    $courriel_envoye = $data->courriel_envoye;
    $pers_annonce_concerne = $data->pers_annonce_concerne;

    $query = "INSERT INTO info_relative (courriel_envoye, pers_annonce_concerne) VALUES (?, ?)";
    $stmt = $connexion->prepare($query);
    if($stmt->execute([$courriel_envoye, $pers_annonce_concerne])) {
        echo json_encode(['status' => 'success', 'message' => 'Data saved successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save data']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
?>
