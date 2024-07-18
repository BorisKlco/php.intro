<?php

namespace App\Classes;

class Home
{
    public function index(): string
    {
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
        echo '<pre>';
        var_dump($_SESSION);
        echo '<pre> <br>';
        echo '<pre>';
        var_dump($_COOKIE);
        echo '<pre> <br>';
        $form = <<<HTML
        Home - <a href="/unset">unset</a>
        {$_SESSION['count']}  
        <a href="/info">Info</a>

        <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <button type="submit">Upload</button>
        </form>
        HTML;
        return $form;
    }

    public function unset(): string
    {
        unset($_SESSION['count']);
        var_dump($_SESSION);
        return '<br> <a href="../">back</a> <br>' . '<br>';
    }

    public function upload(): string
    {
        echo '<pre>';
        var_dump($_FILES);
        echo '<pre> <br>';
        echo 'End of file dump <br>';
        return $this->index();
    }
}
