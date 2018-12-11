<?php
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
        $view = new View('detail');
        $view->display();
    }
}