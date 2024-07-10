<?php

require_once './transaction.php';

$transaction = new Transaction();

$transaction->setStatus(Status::PENDING);
echo '<pre>';
var_dump($transaction);
echo '</pre>';
echo '$END setStatus from index <br>';
