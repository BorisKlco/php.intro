<?php

require './ClassA.php';
require './ClassB.php';

$a = new ClassA();
$b = new ClassB();

echo $a->getN() . '<br>';
echo $b->getN() . '<br>';

echo ClassA::getN() . '<br>';
echo ClassB::getN();
