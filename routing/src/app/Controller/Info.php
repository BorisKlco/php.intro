<?php

namespace App\Controller;

use App\View;

class Info
{
    public function index(): View
    {
        var_dump($_SESSION);
        return View::make('info/index');
    }

    public function contact(): string
    {
        return View::make('info/contact');
    }

    public function store(): string
    {
        $contact = $_POST['contact'];

        setcookie(
            'contact',
            $contact,
            0,
            '/'
        );

        var_dump($_SESSION);
        return $this->contact();
    }
}
