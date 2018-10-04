<?php

namespace app\services;
use app\base\App;
use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
    public function render($template,$params = [], $mes = 0){
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templatesDir'] . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}