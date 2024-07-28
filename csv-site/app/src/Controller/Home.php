<?php

namespace App\Controller;

use App\View;

class Home
{
    public function index(): View
    {
        return View::make('index', ['content' => 'home']);
    }

    public function add(): View
    {
        return View::make('index', ['content' => 'add']);
    }

    public function edit(): View
    {
        return View::make('index', ['content' => 'edit']);
    }
}
