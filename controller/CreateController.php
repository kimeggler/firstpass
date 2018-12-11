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
    public function create()
    {
        if ($_POST['create']) {
            $uid = $_SESSION['uid'];
            $appname = $_POST['appname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordrepeat = $_POST['password-repeat'];
            $loginRepository = new LoginRepository();
            $loginRepository->create($appname, $username, $email, $password, $passwordrepeat, $uid);
        }
    }
}