<?php

namespace App\Classes;

class Info
{
    public function index(): string
    {
        return 'Info';
    }

    public function contact(): string
    {
        return '<form action="/info/contact" method="post"><label>contact</label><input type="text" name="contact" />';
    }

    public function store(): string
    {
        $contact = $_POST['contact'];

        return $contact;
    }
}
