<?php

require_once __DIR__ . "/../vendor/autoload.php";

define("STORAGE", __DIR__ . '/../storage');
define("VIEW_PATH", __DIR__ . '/../views');
define("ENV_SECRET", __DIR__ . '/../secret');

$env = new App\Env();
$router = new App\Router();

session_start();

$router
    ->get('/', [App\Controller\Home::class, 'index'])
    ->get('/unset', [App\Controller\Home::class, 'unset'])
    ->get('/routes', [App\Router::class, 'routes'])
    ->post('/upload', [App\Controller\Home::class, 'upload'])
    ->get('/info', [App\Controller\Info::class, 'index'])
    ->get('/info/contact', [App\Controller\Info::class, 'contact'])
    ->post('/info/contact', [App\Controller\Info::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

// phpinfo();
