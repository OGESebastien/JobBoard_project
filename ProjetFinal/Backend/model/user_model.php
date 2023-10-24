<?php
require dirname(__FILE__) . '/../Config/bdd_connect.php';

class UserModel
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

    public function getAllUsers() {
        $sql = "SELECT * FROM `user`";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function createUser($nom, $prenom, $mail, $password, $role) {
        $sql = "INSERT INTO `user` (`nom`, `prenom`, `mail`, `password`, `role`) VALUES (:nom, :prenom, :mail, :password, :role)";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);

        return $stmt->execute(); // Retourne true en cas de succès, false en cas d'échec
    }

    public function getUserById($userId)
    {
        // Récupérer les informations d'un utilisateur par son ID
        $sql = "SELECT * FROM `user` WHERE `id_user` = :userId";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne les données de l'utilisateur
    }

    public function updateUser($userId, $mail, $password)
    {
        $query = "UPDATE users SET mail = ?, password = ? WHERE id_user = ?";
        $stmt = $this->connexion->prepare($query);
        return $stmt->execute([$mail, $password, $userId]);
    }
    
    




    public function deleteUser($userId)
    {
        // Supprimer un utilisateur de la base de données
        $sql = "DELETE FROM `user` WHERE `id_user` = :userId";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

        return $stmt->execute(); // Retourne true en cas de succès, false en cas d'échec
    }
}
?>
