<?php
require dirname(__FILE__) . '/../model/entreprise_model.php';

class EntrepriseController {
    private $entrepriseModel;

    public function __construct() {
        global $host, $dbname, $username, $password;
        $this->entrepriseModel = new EntrepriseModel($host, $dbname, $username, $password);
    }

// Ajouter cette méthode pour créer une nouvelle entreprise
public function createEntreprise($nom, $description) {
    return $this->entrepriseModel->createEntreprise($nom, $description);
}


    public function getAllEntreprises() {
        return $this->entrepriseModel->getAllEntreprises();
    }

    public function getEntrepriseById($id) {
        return $this->entrepriseModel->getEntrepriseById($id);
    }


    public function updateEntreprise($id, $nom, $description)
{
    return $this->entrepriseModel->updateEntreprise($id, $nom, $description);
}


    public function deleteEntreprise($entrepriseId)
    {
        return $this->entrepriseModel->deleteEntreprise($entrepriseId);
    }
    
}
?>
