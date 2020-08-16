<div class="container">
    <h1>Новая задача</h1>
    <form action="/tasks" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    <label for="name">Введите свое имя:</label><br>
                    <input name='name' id='name' type="text" placeholder='имя' size='50' required
                    >
                </div>
                <div class="container mt-20">
                    <label for="email">Введите свой e-mail:</label><br>
                    <input name='email' id='email' type="email" placeholder='alex@examle.com' size='50' required
                    >
                </div>
                <div class="container mt-20" >
                    <input type="submit" value='Подтвердить' class="btn btn-primary" >
                </div>
            </div>
            <div class="container col-lg-6" >
                <label for="content">Введите текст задачи:</label><br>
                <textarea name="content" id="content" cols="60" rows="15" required
                          placeholder="Расскажите о новой задаче"></textarea>
            </div>
        </div>
    </form>
    <a href="/tasks" class="mt-20">
        <button type="button" class="btn btn-dark">Список Задач</button>
    </a>
</div>