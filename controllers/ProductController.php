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

        try {
            $product = Product::getOne($id);
        } catch (\PDOException $e){
            echo 'ошибка базы';
            exit;
        } catch (\Exception $e){
            echo 'Произошла ошибка!!!';
            exit;
        } finally {
            
        }

        if (!$product){
            throw new \Exception('Продукт не найден!!!');
        }
        echo $this->render('card',['product' => $product]);
    }
}