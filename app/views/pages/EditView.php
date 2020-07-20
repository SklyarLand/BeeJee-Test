<main class="container">
    <form action="update" method="POST">
        <?php echo "<h1>Задача #<input name='id' type='text' value='${data['id']}' size=10 readonly style='outline: none; border: none;'></h1>"; ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    <label for="name">Имя автора:</label><br>
                    <?php echo "<input name='name' id='name' type='text' value='${data['name']}' size='50' readonly
>"; ?>
                </div>
                <div class="container" style="margin-top: 20px">
                    <label for="email">E-mail автора:</label><br>
                    <?php echo "<input name='email' id='email' type='email' value='${data['e-mail']}' size='50' readonly>"; ?>
                </div>
                <div class="container" style="margin-top: 20px">
                    <label for="closed">Статус:</label>
                    <?php 
                    if ($data['closed'])
                        $closed = 'checked';
                    echo "<input name='closed' id='closed' type='checkbox' $closed>";?>
                </div>
                <div class="container" style="margin-top: 20px">
                    <input type="submit" value='Подтвердить' class="btn btn-primary" >
                </div>
            </div>
            <div class="container col-lg-6" >
                <label for="content">Текст задачи:</label><br>
                <textarea name="content" id="content" cols="60" rows="15" required
> <?php echo $data['content']; ?></textarea>
            </div>
        </div>
    </form>
</main>