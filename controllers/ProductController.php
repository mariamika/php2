<?php
namespace app\controllers;
use app\base\App;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex(){
        $product = (new ProductRepository())->getAll();
        if (!$product){
            throw new \Exception('Данные каталога из базы не получены!');
        }
        echo $this->render('catalog',['product' => $product]);
    }

    public function actionCard(){
        $id = App::call()->request->getParams('id');
        $product = (new ProductRepository())->getOne($id);

        if (!$product){
            throw new \Exception('Продукт не найден!');
        }
        echo $this->render('card',['product' => $product]);
    }
}