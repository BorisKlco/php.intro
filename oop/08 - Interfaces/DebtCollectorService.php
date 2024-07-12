<?php

class DebtCollectorService
{
    public function collectDebt(DebtCollector $collector)
    {
        $owed = mt_rand(100, 1000);
        $collected = $collector->collect($owed);

        echo $collector::class . ' - Collected $' . $collected . ' of $' . $owed . '<br>';
    }
}
