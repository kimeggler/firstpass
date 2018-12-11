<?php
require_once '../repository/LoginRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class HomeController
{
    public function index()
    {
        $loginRepository = new LoginRepository();

        $_SESSION['logins'] = $loginRepository->readAll($_SESSION['uid']);



        $view = new View('home');
        $view->display();
    }

    public function getLogins()
    {
        return $logins;
    }
}
