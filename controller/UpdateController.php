<?php
require_once '../repository/LoginRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class UpdateController
{
    public function index()
    {
        $loginRepository = new LoginRepository();
        
        $_SESSION['activedetail'] = $loginRepository->readOneLogin($_GET['appid'], $_SESSION['uid']);

        $view = new View('update');
        $view->display();
    }
    public function update()
    {
                    
        $config = require '../config.php';
        $key = $config['key'];
        
        if ($_POST['update']) {
            $uid = $_SESSION['uid'];
            $id = $_GET['appid'];
            $appname = $_POST['appname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordrepeat = $_POST['password-repeat'];
            $loginRepository = new LoginRepository();
            $loginRepository->updateById($id, $appname, $username, $email, $password, $passwordrepeat, $uid);
        }
    }
}