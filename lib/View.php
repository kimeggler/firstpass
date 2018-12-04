<?php

class View
{
    private $viewfile;
    private $properties = array();
    public function __construct($viewfile)
    {
        $this->viewfile = "./../views/$viewfile.php";
    }
    public function __set($key, $value)
    {
        if (!isset($this->$key)) {
            $this->properties[$key] = $value;
        }
    }
    public function __get($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }
    }
    public function display()
    {
        extract($this->properties);
        require './../views/top.php';
        require './../views/header.php';
        require $this->viewfile;
        require './../views/bottom.php';
    }
}