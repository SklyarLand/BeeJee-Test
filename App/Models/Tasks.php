<?php


namespace App\Models;


use PDO;

class Tasks extends \App\Core\Model
{
    public function getIndexData()
    {

        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';

        if ($_GET['page'])
            $num_str = intval($_GET['page']) * 3;
        else
            $num_str = 0;

        $direct = $_GET['direct'] == 'asc' ? 'asc' : 'desc';

        $tasks = $this->getTasksPage($sort, $direct, $num_str);
        $page = $num_str / 3;
        $pageCount = $this->getTasksCount() / 3;

        return compact('tasks','page', 'sort', 'direct', 'pageCount');
    }

    public function getTasksPage($sort = 'id', $direct = 'asc', $number_str = '10')
    {
        $query = "SELECT * FROM (SELECT *, @i := @i + 1 AS row_number FROM tasks, (SELECT @i:=0) AS z ORDER BY `$sort` $direct) AS m LIMIT 3 OFFSET $number_str";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tasks = Tasks::convertOutput($tasks);
        return $tasks;
    }

    public function getTasksCount()
    {
        $query = "SELECT COUNT(*) AS `count` FROM tasks";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC)["count"];
        return $result;
    }

    function addObject($data)
    {
        $insert = "INSERT tasks(name, `e-mail`, content) VALUES (:name, :email, :content)";
        $stmt = $this->conn->prepare($insert);

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':content', $data['content']);
        return $stmt->execute();
    }

    function getTask($id)
    {
        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        return compact('task');
    }

    public function removeObject($id)
    {
        $delete = 'DELETE FROM tasks WHERE id = :id';
        $stmt = $this->conn->prepare($delete);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateObject($id, $data)
    {
        $closed = $data['closed'] ? $data['closed'] : 0;

        $oldData = $this->getTask($id);
        $edited = $oldData['task']['content'] != $data['content'];

        $update = 'UPDATE tasks SET content = :content, edited = :edited, closed = :closed  WHERE id = :id';
        $stmt = $this->conn->prepare($update);

        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':edited', $edited);
        $stmt->bindParam(':closed', $closed);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}