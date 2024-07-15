<?php

require_once "./CoffeeMaker.php";
require_once "./LatteMaker.php";
require_once "./CappuccinoMaker.php";
require_once "./AllInOneMaker.php";

$coffee = new CoffeeMaker();
$latte = new LatteMaker();
$cappuccino = new CappuccinoMaker();
$allinone = new AllInOne();

echo $coffee->makeCoffee();
echo $latte->makeCoffee();
echo $latte->makeLatte();
echo $cappuccino->makeCoffee();
echo $cappuccino->makeCappuccino();
echo $allinone->makeCoffee();
echo $allinone->makeLatte();
echo $allinone->makeCappuccino();
