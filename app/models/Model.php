<?php
namespace app\models;

class Model
{
    public $conn;

    function __construct()
    {
        $database = new \app\config\Database();
        $this->conn = $database->getConnection();
    }

    function getData($array = null) {}

    function setData($data) {}

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
}
?>
