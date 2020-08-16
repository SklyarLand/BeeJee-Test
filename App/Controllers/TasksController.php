<?php


namespace App\Controllers;


use App\Core\View;
use App\Models\Tasks;

class TasksController extends \App\Core\Controller
{
    function __construct()
    {
        $this->view = new View();
        $this->model = new Tasks();
    }

    public function index()
    {
        $data = $this->model->getIndexData();
        $this->view->generate('tasks/index.php', 'base-template.php', $data);
    }

    public function create()
    {
        $this->view->generate('tasks/create.php', 'base-template.php');
    }

    public function store()
    {
        $data = $_POST;
        if ($this->model->addObject($data)) {
            $message = 'Добавлена новая задача!';
            $backUrl = '/tasks';
            $this->view->generate('success.php', 'response.php', compact('message', 'backUrl'));
        }
        else {
            $message = 'Ошибка при добавлении!';
            $backUrl = '/tasks/create';
            $this->view->generate('fail.php', 'response.php', compact('message', 'backUrl'));
        }
    }

    public function edit($id)
    {
        $data = $this->model->getTask($id);
        $this->view->generate('tasks/edit.php', 'base-template.php', $data);
    }

    public function show($id)
    {
        $data = $this->model->getTask($id);
        $this->view->generate('tasks/show.php', 'base-template.php', $data);
    }

    public function delete($id)
    {
        if ($this->model->removeObject($id)) {
            $message = "Задача №$id была удалена!";
            $backUrl = '/tasks';
            $this->view->generate('success.php', 'response.php', compact('message', 'backUrl'));
        }
        else {
            $message = 'Ошибка при удалении!';
            $backUrl = "/tasks/$id";
            $this->view->generate('fail.php', 'response.php', compact('message', 'backUrl'));
        }
    }

    public function update($id)
    {
        $data = $_POST;
        if ($this->model->updateObject($id, $data)) {
            $message = "Задача №$id была обновлена!";
            $backUrl = '/tasks';
            $this->view->generate('success.php', 'response.php', compact('message', 'backUrl'));
        }
        else {
            $message = 'Ошибка при обновлении!';
            $backUrl = "/tasks/$id";
            $this->view->generate('fail.php', 'response.php', compact('message', 'backUrl'));
        }
    }
}