<?php

use Amp\Deferred;
use Amp\Loop;
use function Amp\Promise\all;
use function Amp\Promise\wait;

require_once __DIR__.'/vendor/autoload.php';

function asyncTask1()
{
    $deferred = new Deferred();

    Loop::delay(1000, function () use ($deferred) {
        $deferred->resolve('task #1');
    });

    return $deferred->promise();
}

function asyncTask2()
{
    $deferred = new Deferred();

    Loop::delay(5000, function () use ($deferred) {
        $deferred->resolve('task #2');
    });

    return $deferred->promise();
}

$promises = [
    asyncTask1(),
    asyncTask2(),
];

$start = time();
$result = wait(all($promises));
$total = time() - $start;

foreach ($result as $output) {
    echo $output.PHP_EOL;
}

\printf("Thời gian thực thi %ds\n", $total);
