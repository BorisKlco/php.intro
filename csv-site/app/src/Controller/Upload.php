<?php

namespace App\Controller;

class Upload
{
    public function store(array $files): string
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

        return 'ok';
    }
}
