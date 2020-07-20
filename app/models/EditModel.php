<?php
namespace app\models;
use \PDO;

class EditModel extends Model
{
    function getData($array = null)
    {
        $insert = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($insert);

        $stmt->bindParam(':id', $array['task']);

        $stmt->execute();
 
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function setData($data)
    {
        $insert = "UPDATE tasks SET content = :content, edited = :edited, closed = :closed WHERE id = :id";
        $stmt = $this->conn->prepare($insert);

        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':edited', $data['edited']);
        $stmt->bindParam(':closed', $data['closed']);
        $stmt->bindParam(':id', $data['id']);

        $stmt->execute();
    }
}
?>