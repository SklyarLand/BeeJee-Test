<?php
namespace app\controllers;

class EditController extends Controller
{
    function __construct()
    {
        $this->view = new \app\views\View();
        $this->model = new \app\models\EditModel();
    }

    function main()
    {
        if (isset($_SESSION['login'])) {
            $this->view->generate('EditView.php', 'Template.php', $this->model->getData($_GET));
        } else {
            header('Location: /login/');
        }
    }

    function update()
    {
        if (isset($_SESSION['login'])) {
            $updateData = $_POST;
            $oldData = $this->model->getData($updateData);
            if ($updateData['content'] !== $oldData['content'] && !$oldData['edited']) {
                $updateData['edited'] = 1;
            } else {
                $updateData['edited'] = 0;
            }
            if ($updateData['closed'] === null) {
                $updateData['closed'] = 0;
            } else {
                $updateData['closed'] = 1;
            }

            $this->model->setData($updateData);
            header('Location: /');
        } else{
            header('Location: /login/');
        }
    }
}
?>