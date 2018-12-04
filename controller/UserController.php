<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $this->create();
    }

    public function create()
    {
        echo 'User erstellen';
    }
}
