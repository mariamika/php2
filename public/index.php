<?php
include $_SERVER['DOCUMENT_ROOT'] . '/DZ2/config/main.php';
include ROOT_DIR . '/services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(),'loadClass']);

$product = new app\models\Product();
$user = new \app\models\User();
echo "<pre>";
var_dump($product->getAll());
//var_dump($product->getOne(4));
//var_dump($user->insert(['login'=>'alex', 'password'=>'654963', 'name'=>'Sasha', 'last_name'=>'Tim']));
//var_dump($user->update(8,['name'=>'maro','last_name'=>'Mi']));
//var_dump($user->delete(['id'=>'9']));