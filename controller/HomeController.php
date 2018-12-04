<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class HomeController
{
    public function index()
    {
        $view = new View('home');
        $view->display();
    }
}
