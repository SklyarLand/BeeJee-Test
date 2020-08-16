<div class="container">
    <h1>Задача № <?= $task['id']?></h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="container">
                <label for="name">Имя автора:</label><br>
                <input name='name' id='name' type="text" value='<?= $task['name']?>' size='50' readonly
                >
            </div>
            <div class="container mt-20">
                <label for="email">E-mail автора:</label><br>
                <input name='email' id='email' type="email" value='<?= $task['e-mail']?>' size='50' readonly
                >
            </div>
            <div class="container mt-20">
                <label for="edited">Редактировано администратором:</label>
                <input name='edited' id='edited' type="checkbox" <?= $task['edited'] ? 'checked' : '' ?>'
                disabled >
            </div>
            <div class="container mt-20">
                <label for="closed">Задача закончена:</label>
                <input name='closed' id='closed' type="checkbox" <?= $task['closed'] ? 'checked' : '' ?>'
                disabled >
            </div>
            <?php if ($_SESSION['login']) : ?>
                <div class="container mt-40">
                    <a href="/tasks/<?= $task['id']?>/edit">
                        <button type="button" class="btn btn-dark">Редактировать</button>
                    </a>
                    <form action="/tasks/<?= $task['id']?>/delete" id="btn-delete" method="POST">
                        <input type="submit" class="btn btn-danger" value="Удалить">
                    </form>
                </div>
            <?php endif; ?>
        </div>
        <div class="container col-lg-6" >
            <label for="content">Текст задачи:</label><br>
            <textarea name="content" id="content" cols="60" rows="15" readonly
            ><?= $task['content']?></textarea>
        </div>
    </div>
    <a href="/tasks" class="mt-20">
        <button type="button" class="btn btn-dark">Список Задач</button>
    </a>
</div>
