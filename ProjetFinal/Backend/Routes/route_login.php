<?php
require './controller/login_controller.php';

$loginController = new LoginController();
$loginController->loginUser();
