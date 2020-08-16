<?php
    function getArrowhead($sort)
    {
        $arrowhead = '';
        if ($_GET['sort'] === $sort) {
            $arrowhead = '˅';
            if ($_GET['direct'] === 'asc') {
                $arrowhead = '˄';
            }
        }
        return $arrowhead;
    }

    function getParamsUrl($page, $sort, $turnDirect = false)
    {
        if ($turnDirect)
            $direct = ($_GET['sort'] === $sort && $_GET['direct'] === 'desc') ? 'asc' : 'desc';
        else
            $direct = $_GET['direct'];

        $urlParams =  [
            'sort' => $sort,
            'direct' => $direct,
            'page' => $page
        ];
        return http_build_query($urlParams);
    }
?>

<div class="container">
    <h1>Список задач</h1>
    <div id="table" class='container'>
        <div class="row bg-dark text-light table-header">
            <div class="col-md-1">
                <a href="?<?= getParamsUrl($page, 'id', true)?>">
                    #
                    <?= getArrowhead('id')?>
                </a>
            </div>
            <div class="col-md-2">
                <a href="?<?= getParamsUrl($page, 'name', true)?>">
                    Имя пользователя
                    <?= getArrowhead('name')?>
                </a>
            </div>
            <div class="col-md-2">
                <a href="?<?= getParamsUrl($page, 'e-mail', true)?>">
                    E-mail
                    <?= getArrowhead('e-mail')?>
                </a>
            </div>
            <div class="col-md-4">
                <a href="?<?= getParamsUrl($page, 'content', true)?>">
                    Текст задачи
                    <?= getArrowhead('content')?>
                </a>
            </div>
            <div class="col-md-1">Статус</div>
            <div class="col-md-2">Редактировано</div>
        </div>
        <?php foreach ($tasks as $task) : ?>
            <a href="/tasks/<?= $task['id']?>">
                <div class="row task-row">
                    <div class="col-md-1 border"><?= $task['id']?></div>
                    <div class="col-md-2 border"><?= $task['name']?></div>
                    <div class="col-md-2 border"><?= $task['e-mail']?></div>
                    <div class="col-md-4 border"><?= $task['content']?></div>
                    <div class="col-md-1 border" style='text-align: center;' >
                        <input type='checkbox' disabled <?= $task['closed'] ? 'checked' : '' ?>>
                    </div>
                    <div class="col-md-2 border" style='text-align: center;' >
                        <input type='checkbox' disabled <?= $task['edited'] ? 'checked' : '' ?>>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="row container mt-20 d-flex justify-content-between">
        <div>
            <a href="/tasks/create" class='col-lg-3'>
                <button type="button" class="btn btn-primary">Добавить Задачу</button>
            </a>
        </div>
        <div class="container col-lg-3 row" style="">
            <?php if ($page > 0) : ?>
                <a href="/tasks?<?= getParamsUrl($page -1, $sort) ?>">
                    <button class="btn btn-primary"> < </button>
                </a>
            <?php endif; ?>

            <div class="btn btn-light"><?= $page ?></div>

            <?php if ($page < $pageCount - 1) : ?>
                <a href="/tasks?<?= getParamsUrl($page + 1, $sort)?>">
                    <button class="btn btn-primary"> > </button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

