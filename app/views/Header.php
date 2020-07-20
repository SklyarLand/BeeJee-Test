<header class="bg-secondary" style="height: 100px;">
    <?php 
    if(isset($_SESSION['login']) && isset($_SESSION['password'])): ?>
    <h3>Привет, <?php echo $_SESSION['login'];?></h3>
    <h3><a href="/login/out" style="margin-left: 50px;">Выйти</a></h3>
    <?php else: ?>
    <a href="/login/" style="margin-left: 50px;"><img style="margin-top: 25px;" src="/images/login.png" alt="Войти как администратор" height="50" width="50"></a>
    <?php endif;?>
</header>