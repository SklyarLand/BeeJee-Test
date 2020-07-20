<?php
namespace app\controllers;

class MainController extends Controller
{
    function __construct()
    {
        $this->view = new \app\views\View();
        $this->model = new \app\models\MainModel();
    }

    public function main($array = null)
    {
        $array['page'] = $array['0'];
        $array['sort'] = $_GET['sort'];
        $array['direct'] = $_GET['direct'];
         
        $data = $this->model->getData($array);
        $count = $this->model->getCount();

        $data['count'] = $count['COUNT(*)'];
        $data['sort'] = $_GET['sort'];
        $data['direct'] = $_GET['direct'];

        $this->view->generate('MainView.php', 'Template.php', $data);
    }
}
?>