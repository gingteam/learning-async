<?php

use Amp\Loop;

require_once __DIR__.'/vendor/autoload.php';

$i = 0;

Loop::repeat(1000, function () use (&$i) {
    echo 'Lặp lại lần: '.++$i.PHP_EOL;
});

// Kết thúc vòng lập sự kiện sau 10s
Loop::delay(10000, function () {
    Loop::stop();
});

Loop::run();
