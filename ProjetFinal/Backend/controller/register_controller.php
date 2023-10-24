<?php 
require dirname(__FILE__) . '/../model/register_model.php';

class RegisterController
{
    private $registerModel;

    public function __construct()
    {
        global $host, $dbname, $username, $password;

        $this->registerModel = new RegisterModel($host, $dbname, $username, $password);
    }

    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $nom = $data['registerName'];
            $prenom = $data['registerPrenom'];
            $mail = $data['registerEmail'];
            $password = $data['registerPassword'];

            $result = $this->registerModel->registerUser($nom, $prenom, $mail, $password);

            echo json_encode([
                'success' => $result
            ]);
            // if ($result === true) {
            //     echo "<script>alert('Inscription réussie !'); window.location.href = 'http://localhost:3001/login';</script>";
            // } else {
            //     echo "<script>alert('Erreur lors de l'inscription.'); window.location.href = 'http://localhost:3001';</script>";
            // }
        }
    }
}
