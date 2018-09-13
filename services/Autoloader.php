<?php
namespace app\services;
class Autoloader
{
    public $fileExtension = '.php';

    public function loadClass($className){

        $fileName = str_replace(["app\\","\\"],[ROOT_DIR,"/"],$className);
        $fileName .= $this->fileExtension;
        if (file_exists($fileName)) {
            include $fileName;
        } else {
            echo "Упс, такой класс не найден: " . '<br>';
        }
    }
}