<?php
namespace app\controllers;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex(){
        $basket = (new BasketRepository())->getBasket();
        $totalCost = (new BasketRepository())->getTotalCost();
        if (!$basket){
            echo $this->render('emptyBasket');
        } else {
            echo $this->render('basket', ['product' => $basket, 'totalCost' => $totalCost]);
        }
    }

    public function actionAdd(){
        $basket = (new BasketRepository())->addInBasket();
        if (!$basket){
            throw new \Exception('<br>Ошибка! Данные в корзину не были добавлены!<br>');
        }
        //TODO здесь можно изменить, куда переходит страница после добавления товара в корзину
        echo $this->actionIndex();
    }

    public function actionDel(){
        $basket = (new BasketRepository())->delFromBasket();
        if (!$basket){
            throw new \Exception('<br>Ошибка! Данные из корзины не были удалены!<br>');
        }
        echo $this->actionIndex();
    }

    public function actionChange(){
        $basket = (new BasketRepository())->changeBasket();
        if (!$basket){
            throw new \Exception('<br>Ошибка! Данные корзины не были изменены!<br>');
        }
        echo $this->actionIndex();
    }
}