<main class="container" style="margin-top: 40px;">
    <div class="container" style="max-width: 500px; background-color: #e9ecef;">
        <form action="up" method="POST">
            <h1 style='text-align: center;'>Вход</h1>
            <div class="container" style="margin-top: 20px; display:flex; flex-direction: column;">
                <label for="login"><h3>Имя пользователя</h3></label>
                <input name='login' id='login' type="text" value='' size='20' required
        >
            </div>
            <div class="container" style="margin-top: 20px; display:flex; flex-direction: column; padding-bottom: 40px;">
                <label for="password"><h3>Пароль</h3></label>
                <input name='password' id='password' type="password" value='' size='20' required
        >
            </div>
            <div class="container" style="padding: 20px 0;">
                <input type="submit" value='Подтвердить' class="btn btn-primary" style="display: block; margin: auto;">
            </div>
        </form>
    </div>
    <h3><a href="/" style="margin-left: 50px;"><-Назад</a></h3>
</main>
<?php
if ($data === true) {
    echo "<script>alert('Неверный логин или пароль!');</script>";
}
?>