<?php

require_once "./LatteTrait.php";
require_once "./CappuccinoTrait.php";

class AllInOne extends CoffeeMaker
{
    use LatteTrait;
    use CappuccinoTrait;
}
