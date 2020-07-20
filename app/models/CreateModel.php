<?php
namespace app\models;
use \PDO;

class CreateModel extends Model
{

    function setData($data)
    {
        $insert = "INSERT tasks(name, `e-mail`, content) VALUES (:name, :email, :content)";
        $stmt = $this->conn->prepare($insert);

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':content', $data['content']);

        $stmt->execute();
    }
}
?>