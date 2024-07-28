<?php

namespace App\Controller;

use App\View;

class Home
{
    public function index(): View
    {
        return View::make('index', [
            'content' => 'home',
            'header' => 'Transactions'
        ]);
    }

    public function add(): View
    {
        return View::make('index', [
            'content' => 'add',
            'header' => 'Add transaction'
        ]);
    }

    public function edit(): View
    {
        return View::make('index', [
            'content' => 'edit',
            'header' => 'Edit transactions'
        ]);
    }

    public function upload()
    {
        $store = new Upload();
        $store->store($_FILES);
    }
}
