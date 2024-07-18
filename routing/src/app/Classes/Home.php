<?php

namespace App\Classes;

class Home
{
    public function index(): string
    {
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
        var_dump($_SESSION);
        echo '<pre>';
        var_dump($_COOKIE);
        echo '<pre>';
        return '<br> Home - <a href="/unset">unset</a> <br>' . $_SESSION['count'] . '<br> <a href="/info">Info</a>';
    }

    public function unset(): string
    {
        unset($_SESSION['count']);
        var_dump($_SESSION);
        return '<br> <a href="../">back</a> <br>' . '<br>';
    }
}
