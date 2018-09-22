<?php
namespace app\models;

class User extends DbModel
{
    public $id;
    public $login;
    public $password;
    public $name;
    public $last_name;

    public static function getTableName()
    {
        return 'users';
    }
}