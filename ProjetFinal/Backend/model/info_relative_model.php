<?php
require dirname(__FILE__) . '/../Config/bdd_connect.php';

class InfoRelativeModel
{
    private $db;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function createInfoRelative($courriel, $pers_annonce) {
        $sql = "INSERT INTO info_relative (courriel_envoye, pers_annonce_concerne) VALUES (:courriel, :pers_annonce)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':courriel', $courriel, PDO::PARAM_STR);
        $stmt->bindValue(':pers_annonce', $pers_annonce, PDO::PARAM_STR);

        return $stmt->execute(); // Retourne true en cas de succès, false en cas d'échec
    }

    public function getInfoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM info_relative WHERE id_info_relative = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    

    public function updateInfoRelative($id, $courrielEnvoye, $persAnnonceConcerne) {
        $stmt = $this->db->prepare("UPDATE info_relative SET courriel_envoye = ?, pers_annonce_concerne = ? WHERE id_info_relative = ?");
        return $stmt->execute([$courrielEnvoye, $persAnnonceConcerne, $id]);
    }
    
    
    public function deleteInfo($id)
    {
        $stmt = $this->db->prepare("DELETE FROM info_relative WHERE id_info_relative = ?");
        return $stmt->execute([$id]);
    }
    

    // Méthode pour obtenir toutes les infos
    public function getAllInfo() {
        $stmt = $this->db->prepare("SELECT * FROM info_relative");
        $stmt->execute(); 
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
}
?>
