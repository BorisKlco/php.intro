<?php

declare(strict_types=1);

//require_once './PaymentGateway/Stripe/Transaction.php';

spl_autoload_register(function($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {
        require $path;
    }
    var_dump($path);
});


use PaymentGateway\Stripe\Transaction;

$stripe = new Transaction();

echo '<pre>';
var_dump($stripe);
echo '</pre>';