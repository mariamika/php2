<?php
namespace app\interfaces;


interface IRenderer
{
    public function render($template, $params = [], $mes = 0);
}