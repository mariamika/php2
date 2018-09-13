<?php
namespace app\models;


class Basket extends Model
{
    public $amount;         // количество товара
    public $selectProduct;     // выбранные товары
    public $totalCost;      // общая стоимость всех выбранных товаров

    public function getTableName() : string
    {
        return 'basket';
    }

    public function __construct()
    {
        $this->selectProduct = new Product();
    }

    public function calcTotalCost(){

    }
}