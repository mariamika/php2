<?php
namespace app\services;
use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    public function render($template,$params = []){
        $loader = new \Twig_Loader_Filesystem(ROOT_DIR .'views');
        $twig = new \Twig_Environment($loader, array(
            'cache' => false,
        ));
        $twigTemplate = $twig->load($template . ".html.twig");
        echo $twigTemplate->render($params);
    }
}



