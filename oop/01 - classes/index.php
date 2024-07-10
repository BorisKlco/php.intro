<?php

declare(strict_types=1);

require_once './Transaction.php';

$transaction = new Transaction(100,'Transaction 1');

$transaction->addTax(8);
$transaction->applyDiscount(10);

echo '<pre>';
var_dump($transaction);
var_dump($transaction->getAmount());
echo '</pre>';