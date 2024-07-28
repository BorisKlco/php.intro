<?php

namespace App;

class Uplaod
{
    public function upload(): string
    {

        $arr = [];
        $count = count($_FILES['file']['name']);
        for ($i = 0; $i < $count; $i++) {
            if (!$_FILES['file']['error'][$i]) {
                $arr[$i] = [
                    "name" => $_FILES['file']['name'][$i],
                    "tmp" => $_FILES['file']['tmp_name'][$i],
                ];
            }
        }

        foreach ($arr as $file) {
            $filePath = STORAGE . '/' . $file['name'];
            $fileTmp = $file['tmp'];
            move_uploaded_file($fileTmp, $filePath);
            echo '<pre>';
            var_dump($file);
            echo '<pre>';
            var_dump(pathinfo($fileTmp));
            echo '<pre>';
            var_dump(pathinfo($filePath));
            echo 'END OF FILE ' . $file['name'];
        }

        echo '<pre>';
        var_dump($_FILES['file']);
        echo '<pre> <br>';
        echo 'End of file dump <br>';
        return 'ok';
    }
}
