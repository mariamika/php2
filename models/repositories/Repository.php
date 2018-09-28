<?php
namespace app\models\repositories;
use app\base\App;
use app\models\entities\DataEntity;

abstract class Repository
{
    protected $db;

    public function __construct()
    {
        $this->db = App::call()->db;
    }

    abstract public function getTableName();

    abstract public function getEntityClass();

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryObjectAll($sql, [], $this->getEntityClass());
    }

    public function save(DataEntity $entity){
        if (!is_null($entity->id)){
            $this->update($entity);
        } else {
            $this->insert($entity);
        }
    }

    public function insert(DataEntity $entity){
        $params = [];
        $columns = [];
        foreach ($entity as $key => $value){
            if (is_object($value)){
                continue;
            }
            if (is_null($value)){$value = '';}
            $params[":{$key}"] = "$value";
            $columns[] = "{$key}";
        }
        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
    }

    public function update(DataEntity $entity){
        $oldObject = $this->getOne($entity->id);
        //echo '<pre>'; var_dump($oldObject); exit;
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET ";
        foreach ($entity as $key => $value){
            if (is_object($value)){continue;}
            if ($value != $oldObject->{$key}){
                $params[":{$key}"] = "$value";
                $sql .= "{$key} = :{$key}, ";
            }
        }
        $sql = substr_replace($sql," ",strlen($sql)-2,-1);
        $sql .= "WHERE id = {$entity->id}";
        return $this->db->execute($sql,$params);
    }

    public function delete(DataEntity $entity){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql,[':id' => $entity->id]);
    }


}