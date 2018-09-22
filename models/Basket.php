<?php
namespace app\models;


use app\services\Db;

class Basket extends DbModel
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

    public function getBasket(){
        $sql = "select p.id, p.name , p.description, b.amount, c.name as category, p.price, p.producer  from basket b 
                inner join product p on b.id_product = p.id
                inner join category c on p.id_category = c.id;";
        echo '<pre>';
        return Db::getInstance()->queryObjectAll($sql, [], get_called_class());
    }
}