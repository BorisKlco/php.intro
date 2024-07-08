<?php

declare(strict_types=1);

require_once './PaymentGateway/Stripe/Transaction.php';
require_once './PaymentGateway/Paddle/Transaction.php';

use PaymentGateway\Stripe\Transaction;
use PaymentGateway\Paddle\Transaction as PaddleTransaction;

$stripe = new Transaction();
$paddle = new PaddleTransaction();

echo '<pre>';
var_dump($stripe, $paddle);
echo '</pre>';