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
        
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        } else {
            header('Location: /login');
        }

        $_SESSION['logins'] = $loginRepository->readAllLogins($_SESSION['uid']);

        $view = new View('home');
        $view->display();
    }

    public function getLogins()
    {
        return $logins;
    }
}
