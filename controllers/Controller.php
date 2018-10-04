<?php

namespace app\controllers;
use app\interfaces\IRenderer;
use app\models\repositories\BasketRepository;

abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;
    protected $renderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Запускает существующий контроллер или выводит на страницу 404
     */
    public function run($action = null){
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this,$method)){
            $this->$method();
        } else {
            echo $this->render('404');
        }
    }

    /**
     * Запускает шаблоны HTML
     * @param $template
     * @param array $params
     * @param $mes
     * @return mixed
     */
    protected function render($template,$params = [],$mes = 0){
        //$amount = (new BasketRepository())->getCounts();
        if ($this->useLayout){
            $content = $this->renderTemplate($template,$params,$mes);
            return $this->renderTemplate("layouts/{$this->layout}",['content' => $content]);
        }
        return $this->renderTemplate($template,$params,$mes);
    }

    protected function renderTemplate($template,$params = [],$mes = 0){
        return $this->renderer->render($template,$params,$mes);
    }
}