<?php

declare(strict_types=1);

function extractInfo(array $line): array
{
    [$date, $checkNumber, $description, $amount] = $line;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount,
    ];
}

function calcTotals(array $items): array
{
    $totals = ['net' => 0, 'inc' => 0, 'exp' => 0];

    foreach ($items as $item) {
        $totals['net'] += $item['amount'];

        if ($item['amount'] <= 0) {
            $totals['exp'] += $item['amount'];
        } else {
            $totals['inc'] += $item['amount'];
        }
    }

    return $totals;
}

function getFile(string $path)
{
    $file = fopen($path, 'r');
    $header = fgetcsv(($file));
    $items = [];

    while (($line = fgetcsv($file)) !== false) {
        $items[] = extractInfo($line);
    }

    return $items;
}

function formatNum(float $amount): string
{
    $isNeg = $amount < 0;

    return ($isNeg ? '-' : '') . '$' . number_format(abs($amount), 2);
}

function formatDate(string $date): string
{
    return date('M j,Y', strtotime($date));
}
