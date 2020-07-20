<main class="container">
    <h1>Список задач</h1>
    <table id="table" class='table table-bordered'>
        <thead class='thead-light'>
            <tr>
                <?php if(isset($_SESSION['login'])) :?>
                <th></th>
                <?php endif; ?>

                <?php if ($data['sort'] ==='name' && $data['direct'] == 1) : ?>
                <th><a href="?sort=name&direct=-1">Имя пользователя</a></th>
                <?php else : ?>
                <th><a href="?sort=name&direct=1">Имя пользователя</a></th> 
                <?php endif; ?> 

                <?php if ($data['sort'] ==='e-mail' && $data['direct'] == 1) : ?>
                <th><a href="?sort=e-mail&direct=-1">E-mail</a></th>
                <?php else : ?>
                <th><a href="?sort=e-mail&direct=1">E-mail</a></th> 
                <?php endif; ?>

                <?php if ($data['sort'] ==='content' && $data['direct'] == 1) : ?>
                <th><a href="?sort=content&direct=-1">Текст задачи</a></th>
                <?php else : ?>
                <th><a href="?sort=content&direct=1">Текст задачи</a></th> 
                <?php endif; ?>

                <th>Статус</th>
                <th>Отредактировано<br>администратором</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $value) {
                if (isset($value['id'])) {
                    $closed = $value['closed'] ? 'checked' : '';
                    $edited = $value['edited'] ? 'checked' : '';
                    $isAdmin = isset($_SESSION['login']);
                    $edit = $isAdmin ? "<td class=''><a href='edit/?task=${value['id']}'>Редактировать</a></td>" : "";
                    if ($value['id']) {
                        echo "
                        <tr id='${value['id']}'>
                            $edit
                            <td class=''>${value['name']}</td>
                            <td class=''>${value['e-mail']}</td>
                            <td class='col-lg-3'>${value['content']}</td>
                            <td style='text-align: center;'><input type='checkbox' $closed disabled></td>
                            <td style='text-align: center;'><input type='checkbox' $edited disabled></td>
                        </tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <div class="row">
        <a href="/create/" class='col-lg-3'><h2 style=" display: inline;">Создать задачу</h2></a>
        <div class="container col-lg-6 row" style="">
            <?php
            $pageNumber = $data["page"];
            $previosPage = $pageNumber - 1;
            $nextPage = $pageNumber + 1;
            foreach ($data as $key => $value) {
                if (isset($value['row_number']) && $value['row_number'] == $data['count']) {
                    $nextPage = 0;
                }
            }
            $get = isset($data['sort']) ? '?sort='.$data['sort'].'&direct='.$data['direct'] : '';
            //var_dump();
            $block = "<h3> $pageNumber </h3>";
            if ($previosPage >= 0) {
                $block = "<a href='/$previosPage$get'><h3><</h3></a>" . $block;
            }
            if ($nextPage) {
                $block .= "<a href='/$nextPage$get'><h3>></h3></a>";
            }
            echo  $block;
            ?>
        </div>
    </div>
</main>