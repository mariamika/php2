<?php
namespace app\controllers;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex(){
        $basket = (new BasketRepository())->getBasket();
        if (!$basket){
            throw new \Exception('Данные корзины из базы не получены!');
        }
        echo $this->render('basket',['product' => $basket]);
    }


}