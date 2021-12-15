<?php

use Amp\Parallel\Worker\DefaultPool;
use function Amp\ParallelFunctions\parallelMap;
use function Amp\Promise\wait;

require_once __DIR__.'/vendor/autoload.php';

$pool = new DefaultPool(5);

$closure = static function (int $i): void {
    sleep($i);
    echo 'Task #'.$i.PHP_EOL;
};

wait(parallelMap(range(1, 100), $closure, $pool));
