<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization, Content-Type");
// Reste du code ...


// Incluez votre fichier de connexion à la base de données
require dirname(__FILE__) . '/Config/bdd_connect.php';

// Récupération des données POST
$data = json_decode(file_get_contents('php://input'), true);

$userId = $data['userId'];
$newEmail = $data['mail'];
$newPassword = password_hash($data['password'], PASSWORD_DEFAULT);

// Vérification de la validité des données
if (!empty($userId) && filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    
    try {
        // Mise à jour des données de l'utilisateur dans la base de données
        $stmt = $connexion->prepare("UPDATE user SET mail = :mail, password = :password WHERE id_user = :userId");
        $stmt->bindParam(':mail', $newEmail);
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        // Envoi d'une réponse positive
        echo json_encode(['status' => 'success', 'message' => 'Profil mis à jour avec succès.']);
    } catch (PDOException $e) {
        // Envoi d'une réponse d'erreur en cas de problème avec la requête
        echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la mise à jour du profil.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Données invalides.']);
}

?>
