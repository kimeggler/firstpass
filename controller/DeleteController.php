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

        $view = new View('delete');
        $view->display();
    }
    public function delete()
    {
        $loginRepository = new LoginRepository();
        $loginRepository->deleteById($id, $uid);
    }
}