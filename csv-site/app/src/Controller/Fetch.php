<?php

namespace App\Controller;

use App\DB;

class Fetch
{
    public function transactions(): array
    {
        $db = DB::connection();
        $fetch = $db->query(
            'SELECT * FROM transactions'
        )->fetchAll();

        return $fetch;
    }

    public function difference(): array
    {
        $db = DB::connection();
        $sum = $db->query(
            'SELECT SUM(amount) AS amount FROM transactions'
        )->fetch();
        $income = $db->query(
            'SELECT SUM(amount) AS amount FROM transactions WHERE amount > 0'
        )->fetch();
        $expense = $db->query(
            'SELECT SUM(amount) AS amount FROM transactions WHERE amount < 0'
        )->fetch();

        return [
            'sum' => $sum['amount'],
            'income' => $income['amount'],
            'expense' => $expense['amount'],
        ];
    }
}
