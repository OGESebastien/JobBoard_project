<?php
require dirname(__FILE__) . '/../model/user_model.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        global $host, $dbname, $username, $password;
        $this->userModel = new UserModel($host, $dbname, $username, $password);
    }

    public function createUser($nom, $prenom, $mail, $password, $role) {
        return $this->userModel->createUser($nom, $prenom, $mail, $password, $role);
    }
    public function readUser($userId)
    {
        return $this->userModel->getUserById($userId);
    }

    public function getAllUsers()
    {
        return $this->userModel->getAllUsers();
    }
    public function updateUser($userId, $mail, $password)
    {
        return $this->userModel->updateUser($userId, $mail, $password);
    }
    


    public function deleteUser($userId)
    {
        return $this->userModel->deleteUser($userId);
    }
}
?>
