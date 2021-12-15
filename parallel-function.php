<?php

use function Amp\ParallelFunctions\parallelMap;
use function Amp\Promise\wait;

require_once __DIR__.'/vendor/autoload.php';

$callback = static function (int $i): void {
    sleep($i);
    echo 'Hello, world!';
};

wait(parallelMap([1, 2, 3], $callback));
