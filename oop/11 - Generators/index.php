<?php

function lazy(int $start, int $end): \Generator
{
    for ($i = $start; $i <= $end; $i++) {
        yield $i => $i;
    }
}

// for ($i = 0; $i < 3000; $i++) {
//     echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ' . $i;
// }

$loop = lazy(1, 100);

// echo $loop->current();
// echo $loop->next();
// echo $loop->current();

foreach ($loop as $key => $num) {
    echo $key . ' - ' . $num . '<br>';
};
