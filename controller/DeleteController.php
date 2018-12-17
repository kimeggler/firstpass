<?php
require_once '../repository/LoginRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class UpdateController
{
    public function delete()
    {
        $loginRepository = new LoginRepository();
        $loginRepository->deleteById($id, $uid);
    }
}