<?php


namespace App\Controllers;


use App\Models\User;

class AuthController extends \App\Core\Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    public function login()
    {
        $this->view->generate('auth/login.php', 'without-header.php');
    }

    public function loginUp()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if ($this->model->isAdmin($login, $password)) {
            $_SESSION['login'] = $login;
            header('Location: /tasks');
        } else {
            $message = 'Неправильное имя пользователя или пароль!';
            $backUrl = '/login';
            $this->view->generate('fail.php', 'response.php', compact('message', 'backUrl'));
        }
    }

    public function logOut()
    {
        unset($_SESSION['login']);
        header('Location: /tasks');
    }

    static function check()
    {
        return $_SESSION['login'];
    }
}