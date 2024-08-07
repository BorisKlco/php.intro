<?php

namespace App\Controller;

use App\View;
use PDO;

class Home
{
    public function index(): View
    {
        echo '<pre>';
        try {
            $db = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
        } catch (\Throwable $th) {
            http_response_code(404);
            echo 'db ';
            return View::make('error/404');
        }
        $q = 'SELECT * FROM users';
        $r = $db->query($q);
        foreach ($r as $item) {
            echo $item["name"] . ' ' . $item["email"] . '<br>';
        };
        var_dump($db);
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
        echo '<pre>';
        var_dump($_SESSION);
        echo '<pre> <br>';
        echo '<pre>';
        var_dump($_COOKIE);
        echo '<pre> <br>';
        echo $_SESSION['count'] . '<br>';

        return View::make('index');
    }

    public function unset(): View
    {
        unset($_SESSION['count']);
        var_dump($_SESSION);
        return View::make('unset');
    }

    public function upload(): string
    {

        $arr = [];
        $count = count($_FILES['file']['name']);
        for ($i = 0; $i < $count; $i++) {
            if (!$_FILES['file']['error'][$i]) {
                $arr[$i] = [
                    "name" => $_FILES['file']['name'][$i],
                    "tmp" => $_FILES['file']['tmp_name'][$i],
                ];
            }
        }

        foreach ($arr as $file) {
            $filePath = STORAGE . '/' . $file['name'];
            $fileTmp = $file['tmp'];
            move_uploaded_file($fileTmp, $filePath);
            echo '<pre>';
            var_dump($file);
            echo '<pre>';
            var_dump(pathinfo($fileTmp));
            echo '<pre>';
            var_dump(pathinfo($filePath));
            echo 'END OF FILE ' . $file['name'];
        }

        echo '<pre>';
        var_dump($_FILES['file']);
        echo '<pre> <br>';
        echo 'End of file dump <br>';
        return $this->index();
    }
}
