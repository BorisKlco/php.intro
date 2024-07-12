<?php

require_once "./DebtCollector.php";

class Rocky implements DebtCollector
{
    public function collect(float $owed): float
    {
        $guaranteed = $owed * 0.65;

        return $guaranteed;
    }
}
