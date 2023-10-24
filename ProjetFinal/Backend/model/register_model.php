<?php
require dirname(__FILE__) . '/../Config/bdd_connect.php';

class RegisterModel
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

    public function registerUser($nom, $prenom, $mail, $password)
    {
        $sql = "SELECT id_user FROM `user` WHERE `mail` = :mail";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetch()) {
            return false;
        }

        // Ensure password is at least 12 characters, has uppercase, lowercase, digit, and special character
        if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{12,}$/', $password)) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO `user` (`nom`, `prenom`, `mail`, `password`, `role`) VALUES (:nom, :prenom, :mail, :password, :role)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            $stmt->bindValue(':role', 'utilisateur', PDO::PARAM_STR);

            if ($stmt->execute()) {
                return true;
            }
        }

        return false;
    }
}
