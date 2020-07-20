<?php
namespace app\controllers;

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new \app\views\View();
    }

    function main() {}
    
    function set() {}
}
?>