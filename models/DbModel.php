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
        $this->db = Db::getInstance();
    }

    /**
     * @param int $id
     * @return static
     */
    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], get_called_class());
    }

    /**
     * @return static[]
     */
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryObjectAll($sql, [], get_called_class());
    }

    public function insert(){
        $params = [];
        $columns = [];
        foreach ($this as $key => $value){

            if ($key == 'db'){
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
            if ($key == 'db'){continue;}
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