<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="/login">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Login:</label>

                            <div class="col-md-6">
                                <input id="login" type="login" class="form-control" name="login" placeholder="Введите логин" required autocomplete="on" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Введите пароль" required autocomplete="on">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Войти
                                </button>
                                <a href="/tasks" class="mt-20">
                                    <button type="button" class="btn btn-dark">Список Задач</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
