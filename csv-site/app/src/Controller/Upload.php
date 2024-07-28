<?php

namespace App\Controller;

use App\DB;

class Upload
{
    public function store(array $files): self
    {

        $arr = [];
        $count = count($files['file']['name']);
        for ($i = 0; $i < $count; $i++) {
            if (!$files['file']['error'][$i]) {
                $arr[$i] = [
                    "name" => $files['file']['name'][$i],
                    "tmp" => $files['file']['tmp_name'][$i],
                ];
            }
        }

        foreach ($arr as $file) {
            $filePath = STORAGE . '/' . $file['name'];
            $fileTmp = $file['tmp'];
            move_uploaded_file($fileTmp, $filePath);
        }

        return $this;
    }

    public function process()
    {
        $db = DB::connection();
        $files = scandir(STORAGE);
        foreach ($files as $current) {
            $path = STORAGE . $current;
            if (is_file($path)) {
                $this->extract($path, $db);
            }
        }
    }

    private function extract(string $path, \PDO $db)
    {
        $open_file = fopen($path, 'r');
        $header = fgetcsv($open_file);

        $insert_transaction = $db->prepare(
            'INSERT INTO transactions (transaction_date,check_id,info,amount,added)
            VALUES(:transaction_date, :check_id, :info, :amount, NOW())'
        );

        while (($line = fgetcsv($open_file)) !== false) {
            try {
                $db->beginTransaction();
                $format_date = \DateTime::createFromFormat('d/m/Y', $line[0])->format('Y-m-d');
                $insert_transaction->execute(
                    [
                        'transaction_date' => $format_date,
                        'check_id' => empty($line[1]) ? null : $line[1],
                        'info' => $line[2],
                        'amount' => (float) str_replace(['$', ','], '', $line[3]),
                    ]
                );
                $db->commit();
            } catch (\Throwable) {
                if ($db->inTransaction()) {
                    $db->rollBack();
                }
            }
        }
        unlink($path);
    }
}
