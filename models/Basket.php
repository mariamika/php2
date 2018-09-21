<?php
namespace app\models;


class Basket extends Model
{
    public $id;
    public $amount;         // количество товара
    public $selectProduct;     // выбранные товары
    public $totalCost;      // общая стоимость всех выбранных товаров

    public static function getTableName()
    {
        return 'basket';
    }

    public function __construct()
    {
        parent::__construct();
        $this->selectProduct = new Product();
    }

    public function calcTotalCost(){

    }
}