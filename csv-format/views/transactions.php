<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
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
            <?php foreach ($items as $item) : ?>
                <tr>
                    <th><?= formatDate($item['date']) ?></th>
                    <th><?= $item['checkNumber'] ?></th>
                    <th><?= $item['description'] ?></th>
                    <?php if ($item['amount'] <= 0) : ?>
                        <th style="background-color: red;"><?= formatNum($item['amount']) ?></th>
                    <?php else : ?>
                        <th style="background-color: lime;"><?= formatNum($item['amount']) ?></th>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <?php $totals = calcTotals($items); ?>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?php echo formatNum($totals['inc']); ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><?php echo formatNum($totals['exp']); ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><?php echo formatNum($totals['net']); ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>