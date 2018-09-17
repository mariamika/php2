<?php
namespace app\services;

use app\traits\TSingleton;

class Db
{
    use TSingleton;
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'store',
        'charset' => 'utf8',
    ];

    private $conn = null;

    private function getConnection(){
        if (is_null($this->conn)){
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->conn;
    }

    public function queryOne($sql, $params = []){
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = []){
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql,$params = []){
        return $this->query($sql, $params);
    }

    private function query($sql, $params = []){
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function insertData($sql){
        return $this->execute($sql);
    }

    private function prepareDsnString(){
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}