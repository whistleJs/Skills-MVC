<?php

namespace src\Controller;

use src\App\DB;

class ViewController extends Controller
{
    public function index()
    {
        $title = 'Index Page';

        return $this->render('pages/index', ['title' => $title]);
    }
}