<?php
namespace app\models;



class Order extends Model
{
    protected $allSelectProduct;
    public $delivery;       // способ доставки
    public $user;       /*Не уверена, что могу к этому свойству прикрепить данные из класса User,
                              поэтому пока оставляю название customer, чтобы из базы подтягивать запросом данные о пользователе*/
    public $comments;       // комментарии к заказу
    public $paymentMethod;  // способ оплаты

    public function __construct()
    {
        $this->allSelectProduct = new Basket();
    }

    public function getTableName() : string
    {
        return 'orders';
    }

    public function approvedOrder(){

    }
}