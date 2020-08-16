<header class="bg-secondary" style="height: 100px;">
    <?php if (isset($_SESSION['login'])) : ?>
    <div class="h-inherit">
        <div class="d-flex ml-50 h-inherit">
            <a href="/logout" class="mt-20">
                <button class="btn btn-login">
                    <h3>Logout</h3>
                </button>
            </a>
            <div class="welcome">
                <h4>Привет, <?php echo $_SESSION['login'];?></h4>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="d-flex ml-50 h-inherit">
        <a href="/login" class="mt-20">
            <button class="btn btn-login">
                <h3>LOGIN</h3>
            </button>
        </a>
    </div>
    <?php endif;?>
</header>