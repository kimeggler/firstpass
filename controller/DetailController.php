<?php
require_once '../repository/LoginRepository.php';
/**
 * Created by PhpStorm.
 * User: byaten
 * Date: 11.12.2018
 * Time: 09:49
 */

class DetailController
{
    public function index()
    {
        $loginRepository = new LoginRepository();

        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        } else {
            header('Location: /login');
        }
        
        $_SESSION['activedetail'] = $loginRepository->readOneLogin($_GET['appid'], $_SESSION['uid']);

        $view = new View('detail');
        $view->display();
    }
}