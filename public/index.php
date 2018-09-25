<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../config/main.php';
include VENDOR_DIR . 'autoload.php';


$request = new \app\services\Request();

$controllerName = $request->getControllerName() ?: DEFAULT_CONTROLLER;
$action = $request->getActionName();

$controllerClass = CONTROLLERS_NAMESPACE . '\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)){
    $controller = new $controllerClass(new \app\services\TemplateRenderer());
    $controller->run($action);
}
