<?php
include $_SERVER['DOCUMENT_ROOT'] . '/DZ2/services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(),'loadClass']);

$product = new app\models\Product();

var_dump($product);