<?php


namespace App\Core;


class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function index()
    {
    }

    function create()
    {
    }
    public function store()
    {
    }

    function show($id)
    {
    }

    function edit($id)
    {
    }

    function update($id)
    {
    }

    function delete($id)
    {
    }
}
