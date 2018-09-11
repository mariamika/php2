<?php
namespace app\models;
use app\services\Db;

class Product
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $producer;
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getOne($id){
        $sql = "SELECT * FROM products WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll(){
        $sql = "SELECT * FROM products";
        return $this->db->queryAll();
    }
}