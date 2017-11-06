<?php
/**
 * Created by PhpStorm.
 * User: zaks
 * Date: 2017/11/6
 * Time: 12:43
 */
class itemsModel extends Model{
    public function test(){
        $sql = "SELECT * FROM {$this->table}";
        echo $sql;
        $list = $this->db->getAll($sql);
        return $list;
    }
}