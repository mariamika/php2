<?php
namespace app\models;

class User extends Model
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