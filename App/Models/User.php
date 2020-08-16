<?php


namespace App\Models;


class User extends \App\Core\Model
{
    function isAdmin($login, $password)
    {
        $query = 'SELECT * FROM admins WHERE login = :login and password = :password';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        return $stmt->fetch();
    }
}