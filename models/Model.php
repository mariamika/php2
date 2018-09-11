<?php
namespace app\models;
use app\services\Db;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getOne($id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll();
    }

    abstract public function getTableName();
}