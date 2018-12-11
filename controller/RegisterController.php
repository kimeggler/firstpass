<?php
require_once '../repository/UserRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class RegisterController
{
    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('register');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }
    public function register()
    {
        if ($_POST['register']) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordrepeat = $_POST['password-repeat'];
            $userRepository = new UserRepository();
            $userRepository->create($username, $password, $passwordrepeat);
        }
    }
}