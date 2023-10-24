<?php
require dirname(__FILE__) . '/../model/annonces_model.php';

class AnnoncesController
{
    private $annoncesModel;

    public function __construct()
    {
        global $host, $dbname, $username, $password;
        $this->annoncesModel = new AnnoncesModel($host, $dbname, $username, $password);
    }

    public function getAllAnnonces()
    {
        return $this->annoncesModel->getAllAnnonces();
    }
    

    public function createAnnonce($titre, $description, $salaire, $lieu, $temps_travail, $domaine, $type_poste)
    {
        return $this->annoncesModel->createAnnonce($titre, $description, $salaire, $lieu, $temps_travail, $domaine, $type_poste);
    }

    public function updateAnnonce($id, $titre, $description, $lieu, $salaire, $temps_travail, $domaine, $type_poste)
    {
        return $this->annoncesModel->updateAnnonce($id, $titre, $description, $lieu, $salaire, $temps_travail, $domaine, $type_poste);
    }
    
    public function deleteAnnonce($id)
    {
        return $this->annoncesModel->deleteAnnonce($id);
    }

    public function getAnnonceById($id)
    {
        return $this->annoncesModel->getAnnonce($id);
    }

    public function getAnnoncesJSON()
    {
        $annonces = $this->getAllAnnonces();
        return json_encode($annonces);
    }
}
?>
