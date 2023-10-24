<?php 

require dirname(__FILE__) . '/../model/login_model.php';
require __DIR__ . '/../../vendor/autoload.php';
use \Firebase\JWT\JWT;
class LoginController
{
    private $loginModel;

    public function __construct()
    {
        global $host, $dbname, $username, $password;

        $this->loginModel = new LoginModel($host, $dbname, $username, $password);
    }

    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $mail = $data['loginEmail'];
            $password = $data['loginPassword'];
            
            $user = $this->loginModel->loginUser($mail, $password);
            
            if ($user) {
                // Création d'un JWT
                $key = "Vqj$2Cf7z&9rX!tW5sE8mP";
                $payload = array(
                    "user_id" => $user['id_user'],
                    "email" => $mail,
                    "role" => $user['role'],
                    "nom" => $user['nom'],
                    "prenom" => $user['prenom']
                );
                $jwt = JWT::encode($payload, $key, 'HS256');
        
                // Envoi du JWT en réponse
                echo json_encode(array("token" => $jwt));
        
            } else {
                echo "<script>alert('Erreur lors de la connexion.'); window.location.href = 'http://localhost:3001/login';</script>";
            }
        }
    }
    
}
