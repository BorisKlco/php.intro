<?php

$start = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
    $value = getenv('TEST');
}
$end = microtime(true);
echo "Time taken for getenv: " . ($end - $start) . " seconds\n";

$myVar = 'myValue';
$start = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
    $value = $myVar;
}
$end = microtime(true);
echo "Time taken for PHP variable: " . ($end - $start) . " seconds\n";