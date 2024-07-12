<?php

require_once "./DebtCollector.php";

class CollectionAgency implements DebtCollector
{
    public function collect(float $owed): float
    {
        $guaranteed = $owed * 0.5;

        return mt_rand($guaranteed, $owed);
    }
}
