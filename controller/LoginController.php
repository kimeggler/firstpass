<?php
require_once '../repository/UserRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class LoginController
{
    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('login');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }
    public function signUp()
    {
        $view = new View('user_create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }
    public function signIn()
    {
        if ($_POST['login']) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userRepository = new UserRepository();
            $userRepository->login($username, $password);
        }
    }
    public function deleteAccount()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);
        // Anfrage an die URI /login weiterleiten (HTTP 302)
        header('Location: /home');
    }
}