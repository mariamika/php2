<?php
include $_SERVER['DOCUMENT_ROOT'] . '/DZ2/config/main.php';
include ROOT_DIR . '/services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(),'loadClass']);

$user = \app\models\User::getOne(9);
$user->last_name = 'Petrushkin';
$user->name = 'Oves';

$user->update();