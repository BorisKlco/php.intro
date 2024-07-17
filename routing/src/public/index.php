<?php

require_once __DIR__ . "/../vendor/autoload.php";

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

$router = new App\Router();

$router
    ->register('/', [App\Classes\Home::class, 'index'])
    ->register('/info', [App\Classes\Info::class, 'index']);

echo $router->resolve($_SERVER['REQUEST_URI']);
