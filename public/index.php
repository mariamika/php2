<?php
include $_SERVER['DOCUMENT_ROOT'] . '/DZ2/config/main.php';
include ROOT_DIR . '/services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(),'loadClass']);

$product = new app\models\Product();
$user = new \app\models\User();

var_dump($user->insert(['login'=>'maro',
                        'password'=>'963',
                        'name'=>'MARO',
                        'last_name'=>'Mi']));
