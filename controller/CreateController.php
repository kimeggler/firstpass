<?php
require_once '../repository/LoginRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class CreateController
{
    public function index()
    {
        $view = new View('create');
        $view->display();
    }
    // Create user
    public function create()
    {
        //checks if action is create
        if ($_POST['create']) {
            //sets variables
            $uid = $_SESSION['uid'];
            $appname = $_POST['appname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordrepeat = $_POST['password-repeat'];
            $loginRepository = new LoginRepository();
            //executes create in repository
            $loginRepository->create($appname, $username, $email, $password, $passwordrepeat, $uid);
        }
    }
}