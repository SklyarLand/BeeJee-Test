<div class="container">
    <h1>Задача № <?= $task['id']?> (Редактирование)</h1>
    <form action="/tasks/<?= $task['id']?>/update" method="POST">
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
                    <label for="closed">Задача закончена:</label>
                    <input name='closed' id='closed' type="checkbox" <?= $task['closed'] ? 'checked' : '' ?> value=1 >
                </div>
                <div class="container mt-40" >
                    <input type="submit" value='Подтвердить' class="btn btn-primary" >
                </div>
            </div>
            <div class="container col-lg-6" >
                <label for="content">Текст задачи:</label><br>
                <textarea name="content" id="content" cols="60" rows="15" required
                ><?= $task['content']?></textarea>
            </div>
        </div>
    </form>
    <a href="/tasks" class="mt-20">
        <button type="button" class="btn btn-dark">Список Задач</button>
    </a>
</div>
