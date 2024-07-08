<?php

declare(strict_types=1);

require_once './Transaction.php';
require_once './Customer.php';
require_once './PaymentProfile.php';

$transaction = new Transaction(100,'Transaction 1');

echo $transaction->customer?->paymentProfile?->id ?? 'error';

echo '<pre>';
var_dump($transaction);
echo '</pre>';