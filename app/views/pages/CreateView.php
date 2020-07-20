<main class="container">
    <h1>Новая задача</h1>
    <form action="set" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    <label for="name">Введите свое имя:</label><br>
                    <input name='name' id='name' type="text" value='имя' size='50' required
>
                </div>
                <div class="container" style="margin-top: 20px">
                    <label for="email">Введите свой e-mail:</label><br>
                    <input name='email' id='email' type="email" value='alex@examle.com' size='50' required
>
                </div>
                <div class="container" style="margin-top: 20px">
                    <input type="submit" value='Подтвердить' class="btn btn-primary" >
                </div>
            </div>
            <div class="container col-lg-6" >
                <label for="content">Введите текст задачи:</label><br>
                <textarea name="content" id="content" cols="60" rows="15" required
></textarea>
            </div>
        </div>
    </form>
</main>