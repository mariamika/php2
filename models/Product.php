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

    public function getTableName() : string
    {
        return 'product';
    }

    public function __construct()
    {
        $this->categoryProduct = new Category();
    }
}