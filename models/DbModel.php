<?php
namespace app\models;
use app\services\Db;
use app\interfaces\IDbModel;

abstract class DbModel implements IDbModel
{
    protected $db;

    /**
     * @param $db
     */
    public function __construct()
    {
        $this->db = static::getDb();
    }

    /**
     * @param int $id
     * @return static
     */
    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return static::getDb()->queryObject($sql, [':id' => $id], get_called_class());
    }

    /**
     * @return static[]
     */
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getDb()->queryObjectAll($sql, [], get_called_class());
    }

    private static function getDb(){
        return Db::getInstance();
    }

    public function save(){
        if (!is_null($this->id)){
            $this->update();
        } else {
            $this->insert();
        }

    }

    public function insert(){
        $params = [];
        $columns = [];
        foreach ($this as $key => $value){
            if (is_object($value)){
                continue;
            }
            if (is_null($value)){$value = '';}
            $params[":{$key}"] = "$value";
            $columns[] = "{$key}";
        }
        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    public function update(){
        $oldObject = $this->getOne($this->id);
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET ";
        foreach ($this as $key => $value){
            if (is_object($value)){continue;}
            if ($value != $oldObject->{$key}){
                $params[":{$key}"] = "$value";
                $sql .= "{$key} = :{$key}, ";
            }
        }
        $sql = substr_replace($sql," ",strlen($sql)-2,-1);
        $sql .= "WHERE id = {$this->id}";
        return $this->db->execute($sql,$params);
    }

    public function delete(){
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql,[':id' => $this->id]);
    }


}