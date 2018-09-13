<?php
include $_SERVER['DOCUMENT_ROOT'] . '/DZ2/config/main.php';
include ROOT_DIR . '/services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(),'loadClass']);

$product = new app\models\Product();
$order = new app\models\Order();
$basket = new \app\models\Basket();


echo "Продукт: " . '<br>';
var_dump($product);
echo '<br><hr><br>Заказ:';
var_dump($order);
echo '<br><hr><br>Корзина:';
var_dump($basket);