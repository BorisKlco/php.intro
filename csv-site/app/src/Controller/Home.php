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

        $files = scandir(STORAGE);
        echo '<pre>';
        foreach ($files as $file) {
            $path = STORAGE . $file;
            if (is_file($path)) {
                echo '<pre>';
                $open_file = fopen($path, 'r');
                $header = fgetcsv($open_file);
                echo '<pre>';
                var_dump($header);
                $test = [];

                while (($line = fgetcsv($open_file)) !== false) {
                    $test[] = [
                        $header[0] => $line[0],
                        $header[1] => $line[1],
                        $header[2] => $line[2],
                        $header[3] => $line[3],
                    ];
                }

                echo '<pre>';
                var_dump($test);

                // $items = [];

                // while (($line = fgetcsv($file)) !== false) {
                //     $items[] = extractInfo($line);
                // }
            }
        }
    }
}
