<?php

namespace app\controllers;


use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex(){
        $product = Basket::getBasket();
        echo $this->render('basket',['product' => $product]);
    }



}