<?php
namespace app\controllers;

class CreateController extends Controller
{
    function __construct()
    {
        $this->view = new \app\views\View();
        $this->model = new \app\models\CreateModel();
    }

    public function main()
    {
        $this->view->generate('CreateView.php', 'Template.php');
    }
    public function set()
    {
        $this->model->setData($_POST);
        echo '<script>document.location.href="/"</script>';

    }
}
?>