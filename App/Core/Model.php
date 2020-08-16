<?php


namespace App\Core;


use App\Config\Database;

class Model
{
    public $conn;

    function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    static function convertOutput ($array)
    {
        foreach ($array as $i => $str) {
            foreach ($str as $key => $value) {
                $str[$key] = htmlspecialchars($value);
            }
            $array[$i] = $str;
        }
        return $array;
    }

    function addObject($data)
    {
    }

    function removeObject($id)
    {
    }
}