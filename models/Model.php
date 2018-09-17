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
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll() : array {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function insert($params = []){
        $tableName = $this->getTableName();
        foreach ($params as $key => $value){
            $sql = "INSERT INTO {$tableName}({$key}) VALUES ({$value})";
            return $this->db->insertData($sql);
        }

    }
}