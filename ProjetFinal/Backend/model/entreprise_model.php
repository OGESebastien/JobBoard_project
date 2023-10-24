<?php
require dirname(__FILE__) . '/../Config/bdd_connect.php';

class EntrepriseModel
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

// Ajouter cette méthode pour insérer une nouvelle entreprise dans la base de données
public function createEntreprise($nom, $description) {
    $sql = "INSERT INTO `entreprise` (`nom`, `description`) VALUES (:nom, :description)";
    $stmt = $this->connexion->prepare($sql);
    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);

    return $stmt->execute(); // Retourne true en cas de succès, false en cas d'échec
}


    public function getAllEntreprises() 
    {
        $sql = "SELECT * FROM `entreprise`";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEntrepriseById($id) 
    {
        $sql = "SELECT * FROM `entreprise` WHERE `id_entreprise` = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateEntreprise($id, $nom, $description)
    {
        $sql = "UPDATE `entreprise` SET `nom` = :nom, `description` = :description WHERE `id_entreprise` = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    
        return $stmt->execute(); // Retourne true en cas de succès, false en cas d'échec
    }
    
    public function deleteEntreprise($entrepriseId)
    {
        $sql = "DELETE FROM `entreprise` WHERE `id_entreprise` = :entrepriseId";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':entrepriseId', $entrepriseId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
?>


<!-- public function deleteUser($userId)
    {
        // Supprimer un utilisateur de la base de données
        $sql = "DELETE FROM `user` WHERE `id_user` = :userId";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

        return $stmt->execute(); // Retourne true en cas de succès, false en cas d'échec
    } -->