<?php
namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $password;
    public $name;
    public $lastName;

    public function getTableName() : string
    {
        return 'users';
    }
}