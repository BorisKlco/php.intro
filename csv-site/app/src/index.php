<?php

namespace App;

require_once __DIR__ . "/../vendor/autoload.php";

define("VIEW_PATH", __DIR__ . '/../views');
define("STORAGE", __DIR__ . '/../storage');

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();
$db = new DB([
    'host' => $_ENV['DB_HOST'],
    'db' => $_ENV['DB'],
    'usr' => $_ENV['DB_USER'],
    'psw' => $_ENV['DB_PASS'],
]);

$router
    ->get('/', [Controller\Home::class, 'index'])
    ->get('/add', [Controller\Home::class, 'add'])
    ->get('/edit', [Controller\Home::class, 'edit'])
    ->post('/upload', [Controller\Home::class, 'upload'])
    ->get('/auth/login', [Controller\Auth::class, 'login'])
    ->get('/auth/register', [Controller\Auth::class, 'register'])
    ->get('/debug', [Router::class, 'routes']);

try {
    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (\App\Exceptions\RouteNotFound $e) {
    http_response_code(404);
    echo View::make('error/404');
}

// echo '<pre>';
// var_dump($_SERVER);
// echo '<pre>';
