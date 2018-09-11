<?php
namespace app\models;

class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;
    protected $tableName = 'users';
}