<?php
namespace app\models;
use app\services\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne(int $id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, [':id' => $id], get_called_class());
    }

    public function getAll() : array {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryObjectAll($sql, [], get_called_class());
    }

    public function insert($params = []){
        $tableName = $this->getTableName();
        $arrKey = [];
        $arrValue = [];
        foreach ($params as $key => $value){
            $arrKey[] = $key;
            $arrValue[] = $value;
        }
        $Key = implode(', ', $arrKey);
        $Value = implode('\', \'',$arrValue);
        $sql = "INSERT INTO {$tableName} ({$Key}) VALUES ('{$Value}')";
        return $this->db->execute($sql);
    }

    public function update($id,$params = []){
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET ";
        foreach ($params as $key => $value){
                $sql .= "{$key} = '{$value}', ";
        }
        $sql = substr_replace($sql," ",strlen($sql)-2,-1);
        $sql .= "WHERE id = {$id}";
        return $this->db->execute($sql);
    }

    public function delete($params = []){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE ";
        foreach ($params as $key => $value){
            $sql .= "{$key} = {$value}";
        }
        return $this->db->execute($sql);
    }


}