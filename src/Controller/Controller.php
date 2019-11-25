<?php

namespace src\Controller;

use src\App\View;

class Controller
{
    public function render($page, $datas)
    {
        $view = new View($page);
        $view->render($datas);
    }
}