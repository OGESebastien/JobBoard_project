<?php
$host = "localhost";
$dbname = "epitech_projet1";
$username = "root";
$password = "root";
try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, array(
        PDO::ATTR_PERSISTENT => true
    ));
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "test";
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}
?>