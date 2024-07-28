<?php

namespace App\Controller;

use App\View;

class Auth
{
    public function login(): View
    {
        return View::make('auth', ['content' => 'home']);
    }

    public function register(): View
    {
        return View::make('auth', ['content' => 'add']);
    }
}
