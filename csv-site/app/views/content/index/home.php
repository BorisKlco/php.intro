<?php

$fetch = new App\Controller\Fetch();
$transactions = $fetch->transactions();
$totals = $fetch->difference();

function formatNum(float $amount): string
{
    $isNeg = $amount < 0;

    return ($isNeg ? '-' : '') . '$' . number_format(abs($amount), 2);
}

?>
<div class=".section-home">
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $item) : ?>
                <tr>
                    <th><?= $item['transaction_date'] ?></th>
                    <th><?= $item['check_id'] ?></th>
                    <th><?= $item['info'] ?></th>
                    <?php if ($item['amount'] <= 0) : ?>
                        <th style="background-color: red;"><?= formatNum($item['amount']) ?></th>
                    <?php else : ?>
                        <th style="background-color: lime;"><?= formatNum($item['amount']) ?></th>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?php echo formatNum((float) $totals['income']); ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><?php echo formatNum((float) $totals['expense']); ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><?php echo formatNum((float) $totals['sum']); ?></td>
            </tr>
        </tfoot>
    </table>
</div>