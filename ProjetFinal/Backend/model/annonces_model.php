<?php
require dirname(__FILE__) . '/../Config/bdd_connect.php';

class AnnoncesModel
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

    public function getAllAnnonces()
    {
        $sql = "SELECT * FROM `annonces`";
        $stmt = $this->connexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createAnnonce($titre, $description, $salaire, $lieu, $temps_travail, $domaine, $type_poste)
    {
        $sql = "INSERT INTO `annonces` (`titre`, `description`, `salaire`, `lieu`, `temps_travail`, `domaine`, `type_poste`) VALUES (:titre, :description, :salaire, :lieu, :temps_travail, :domaine, :type_poste)";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':salaire', $salaire, PDO::PARAM_STR);
        $stmt->bindValue(':lieu', $lieu, PDO::PARAM_STR);
        $stmt->bindValue(':temps_travail', $temps_travail, PDO::PARAM_INT);
        $stmt->bindValue(':domaine', $domaine, PDO::PARAM_STR);
        $stmt->bindValue(':type_poste', $type_poste, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAnnonce($id)
    {
        $sql = "SELECT * FROM `annonces` WHERE `id_annonces` = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAnnonce($id, $titre, $description, $lieu, $salaire, $temps_travail, $domaine, $type_poste)
    {
        $sql = "UPDATE `annonces` SET 
                `titre` = :titre, 
                `description` = :description, 
                `lieu` = :lieu, 
                `salaire` = :salaire, 
                `temps_travail` = :temps_travail, 
                `domaine` = :domaine,
                `type_poste` = :type_poste
                WHERE `id_annonces` = :id";
        
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':lieu', $lieu, PDO::PARAM_STR);
        $stmt->bindValue(':salaire', $salaire, PDO::PARAM_INT);
        $stmt->bindValue(':temps_travail', $temps_travail, PDO::PARAM_INT);
        $stmt->bindValue(':domaine', $domaine, PDO::PARAM_STR);
        $stmt->bindValue(':type_poste', $type_poste, PDO::PARAM_STR);
    
        return $stmt->execute(); // Retourne true en cas de succès, false en cas d'échec
    }
    

    public function deleteAnnonce($id)
    {
        $sql = "DELETE FROM `annonces` WHERE `id_annonces` = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
