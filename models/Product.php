<?php
namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $producer;
    protected $tableName = 'products';

}