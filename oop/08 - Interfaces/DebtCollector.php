<?php

interface DebtCollector
{
    public function collect(float $owed): float;
}
