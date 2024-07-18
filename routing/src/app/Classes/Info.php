<?php

namespace App\Classes;

class Info
{
    public function index(): string
    {
        var_dump($_SESSION);
        return '<br>' . '<a href="../">Home</a> <br> <a href="info/contact">contact</a>';
    }

    public function contact(): string
    {
        return '<form action="/info/contact" method="post"><label>contact </label><input type="text" name="contact" /> <br> <a href="../">Home</a>';
    }

    public function store(): string
    {
        $contact = $_POST['contact'];

        echo 1;
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
