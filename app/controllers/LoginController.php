<?php
namespace app\controllers;

class LoginController extends Controller
{
    function __construct()
    {
        $this->view = new \app\views\View();
        $this->model = new \app\models\LoginModel();
    }

    function main($noLogin = false)
    {
        $this->view->generate('LoginView.php', 'Template.php', $noLogin);
    }

    function loginUp()
    {
        if ($this->model->getData($_POST)) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: /');
            //echo '<script>document.location.href="/"</script>';
        } else {
            $this->main(true);
        }
    }

    function loginOut()
    {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        header('Location: /');
    }
}
?>