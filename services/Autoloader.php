<?php
namespace app\services;
class Autoloader
{
    public function loadClass($className){
        $str = str_replace('app\\','',$className);
        list($folder,$name) = explode('\\',$str);
        $app = $_SERVER['DOCUMENT_ROOT'] . '/DZ2';
        $fileName = "{$app}/{$folder}/{$name}.php";

        if (file_exists($fileName)) {
            include $fileName;
        } else {
            echo "Упс, такой класс не найден: " . '<br>';
        }
    }
}