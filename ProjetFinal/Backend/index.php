<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

$request_uri = $_SERVER['REQUEST_URI'];




// On détermine quel fichier de routage inclure en fonction de l'URL
if (strpos($request_uri, '/user/') === 0) {
    require 'Routes/route_user.php';
} elseif (strpos($request_uri, '/annonce/') === 0) {
    require 'Routes/route_annonces.php';
} elseif (strpos($request_uri, '/entreprise/') === 0) {
    require 'Routes/route_entreprise.php';
} elseif (strpos($request_uri, '/info/') === 0) {
    require 'Routes/route_info_relative.php';
} elseif (strpos($request_uri, '/inscription/') === 0) {
    require 'Routes/route_register.php';
} elseif (strpos($request_uri, '/connexion/') === 0) {
    require 'Routes/route_login.php';
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Page non trouvée.";
}




?>