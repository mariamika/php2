<?php
namespace app\models\repositories;
use app\models\entities\User;


class UserRepository extends Repository
{
    public function getTableName()
    {
        return 'users';
    }

    public function getEntityClass()
    {
        return User::class;
    }

    public function getUserById($id){
        $tableName = $this->getTableName();
        $sql = "select * from {$tableName} where id = :id";
        return $this->db->queryObject($sql,[':id' => $id], $this->getEntityClass())[0];
    }

    public function getUserByLoginPass($auth){
        $login = $auth['login'];
        $pass = $auth['password'];
        $tableName = $this->getTableName();
        $sql = "select * from {$tableName} where login = :login and password = :password";
        return $this->db->queryObject($sql,[':login' => $login, ':password' => $pass], $this->getEntityClass())[0];
    }
}