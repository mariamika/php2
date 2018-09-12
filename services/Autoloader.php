<?php
namespace app\services;
class Autoloader
{
    public function loadClass($className){

        $app = $_SERVER['DOCUMENT_ROOT'] . '/DZ2';
        $str = str_replace('app',$app,$className);
        $str = str_replace('\\','/',$str);

        $fileName = "{$str}.php";
        if (file_exists($fileName)) {
            include $fileName;
        } else {
            echo "Упс, такой класс не найден: " . '<br>';
        }
    }
}