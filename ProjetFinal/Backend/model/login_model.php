<?php
require dirname(__FILE__) . '/../Config/bdd_connect.php';

class LoginModel
{
    private $connexion;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->connexion = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $username,
            $password,
            array(
                PDO::ATTR_PERSISTENT => true
            )
        );
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function loginUser($mail, $password)
    {
        $sql = "SELECT id_user, password, role, nom, prenom FROM `user` WHERE `mail` = :mail";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    
}
