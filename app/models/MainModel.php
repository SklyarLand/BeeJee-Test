<?php
namespace app\models;
use \PDO;

class MainModel extends Model
{

    function getData($array = null)
    {
        $groupBy = 'id';
        if(isset($array['sort']))
            $groupBy = $array['sort'];
        if ($array['page']) 
            $num_str = intval($array['page']) * 3;
        else
            $num_str = 0;

        $direct = 'DESC';
        if($array['direct'] == 1)   
            $direct = 'ASC';

        $query = "SELECT * FROM (SELECT *, @i := @i + 1 AS row_number FROM tasks, (SELECT @i:=0) AS z ORDER BY `$groupBy` $direct) AS m LIMIT 3 OFFSET $num_str";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = Model::convertOutput($result);
        $result['page'] = $num_str / 3;

        return $result;
    }

    function getCount()
    {
        $query = "SELECT COUNT(*) FROM tasks";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>