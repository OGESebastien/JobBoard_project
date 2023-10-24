<?php
require '/home/theo/Projet/ProjetWeb/Backend/controller/user_controller.php';
$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match("#^/user/read-user/(\d+)$#", $request_uri, $matches)) {
    $userId = $matches[1];
    $user = $controller->readUser($userId);
    if ($user) {
        echo "Nom de l'utilisateur : " . $user['nom'] . "<br>";
        echo "Prénom : " . $user['prenom'] . "<br>";
        echo "E-mail : " . $user['mail'] . "<br>";
        echo "ID : " . $user['id_user'];
    } else {
        echo "Utilisateur non trouvé.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $request_uri === '/user/create-user') {
    $controller->createUser();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match("#^/Vue/edit_user\.php#", $request_uri)) {
    include 'view/edit_user_vue.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && preg_match("#^/user/delete-user/(\d+)$#", $request_uri, $matches)) {
    $userId = $matches[1];
    $controller->deleteUser($userId);
} else {
    echo "Page non trouvée.";
}
?>
