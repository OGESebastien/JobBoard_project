<?php
// test pour l'inscription
require 'register_model.php';
require '../Config/bdd_connect.php';

$registerModel = new RegisterModel($host, $dbname, $username, $password);

// Test d'une inscription réussie
$result = $registerModel->registerUser('John', 'Doe', 'test@zestg.com', 'passworD456fqd6*!');

if ($result === true) {
    echo "Inscription réussie !\n";
} else {
    echo "L'inscription a échoué.\n";
}

// Test d'une inscription échouée (par exemple, un mot de passe invalide)
$result = $registerModel->registerUser('Jane', 'Smith', 'jane@example.com', 'pass');

if ($result === true) {
    echo "Inscription réussie !\n";
} else {
    echo "L'inscription a échoué.\n";
}
?>
