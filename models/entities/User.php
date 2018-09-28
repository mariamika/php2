<?php
namespace app\models\entities;


class User extends DataEntity
{
    public $id;
    public $login;
    public $password;
    public $name;
    public $last_name;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $password
     * @param $name
     * @param $last_name
     */
    public function __construct($id = null, $login = null, $password = null, $name = null, $last_name = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->last_name = $last_name;
    }


}