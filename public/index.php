<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Pandora/config/main.php';
include ROOT_DIR . '/services/Autoloader.php';
include ROOT_DIR.'vendor/autoload.php';

spl_autoload_register([new \app\services\Autoloader(),'loadClass']);

$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$action = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE . '\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)){
    $controller = new $controllerClass(new \app\services\TwigRenderer());
    $controller->run($action);
}
