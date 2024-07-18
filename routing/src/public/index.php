<?php

require_once __DIR__ . "/../vendor/autoload.php";

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

$router = new App\Router();

session_start();

$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->get('/unset', [App\Classes\Home::class, 'unset'])
    ->post('/upload', [App\Classes\Home::class, 'upload'])
    ->get('/info', [App\Classes\Info::class, 'index'])
    ->get('/info/contact', [App\Classes\Info::class, 'contact'])
    ->post('/info/contact', [App\Classes\Info::class, 'store']);


echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


// phpinfo();