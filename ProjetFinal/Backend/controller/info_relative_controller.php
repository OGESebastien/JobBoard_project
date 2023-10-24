<?php
require dirname(__FILE__) . '/../model/info_relative_model.php';

class InfoRelativeController {
    private $infoRelativeModel;

    public function __construct() {
        global $host, $dbname, $username, $password;
        $this->infoRelativeModel = new InfoRelativeModel($host, $dbname, $username, $password);
    }

    public function createInfoRelative($courriel, $pers_annonce) {
        return $this->infoRelativeModel->createInfoRelative($courriel, $pers_annonce);
    }

    public function getInfoById($id) {
        return $this->infoRelativeModel->getInfoById($id);
    }
    
    public function updateInfo($id, $courrielEnvoye, $persAnnonceConcerne) {
        return $this->infoRelativeModel->updateInfoRelative($id, $courrielEnvoye, $persAnnonceConcerne);
    }
    
    
    
    
    public function deleteInfo($id)
    {
        return $this->infoRelativeModel->deleteInfo($id);
    }
    
    
    // Méthode pour récupérer toutes les infos
    public function getAllInfo() {
        return $this->infoRelativeModel->getAllInfo();
    }
}
?>
