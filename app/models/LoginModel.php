<?php
namespace app\models;
use \PDO;

class LoginModel extends Model
{

    function getData($array = null) 
    {
        $login = $array['login'];
        $password = $array['password'];

        $query = "SELECT * FROM admins WHERE login = :login and password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $array['login']);
        $stmt->bindParam(':password', $array['password']);
        $stmt->execute();

        if ($stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return true;
        }
        return false;
    }
}
?>