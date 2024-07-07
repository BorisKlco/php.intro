<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$root = __DIR__ . DIRECTORY_SEPARATOR;
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

include APP_PATH . 'app.php';
$files = scandir(FILES_PATH);
$items = [];
foreach ($files as $file) {
    $current_file = FILES_PATH . $file;
    if (is_file($current_file)) {
        $item = getFile($current_file);
        foreach ($item as $thing) {
            array_push($items, $thing);
        };
    }
};

include VIEWS_PATH . 'transactions.php';
