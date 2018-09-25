<?php
namespace app\controllers;
use app\models\Product;
use app\models\User;

class ProductController extends Controller
{
    public function actionIndex(){
        //$this->>useLayout = false;
        $product = Product::getAll();
        echo $this->render('catalog',['product' => $product]);
    }

    public function actionCard(){
        //$this->useLayout = false;
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card',['product' => $product]);
    }
}