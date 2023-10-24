<?php
require './controller/register_controller.php';
$controller = new RegisterController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $request_uri === '/inscription/register') {
    $controller->registerUser();
} else {
    echo "Page non trouvée.";
}
