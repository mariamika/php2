<?php
namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $producer;
    public $categoryProduct;

    public function __construct()
    {
        parent::__construct();
        $this->categoryProduct = new Category();
    }

    public static function getTableName()
    {
        return 'product';
    }
}