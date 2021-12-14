<?php

use function Amp\asyncCall;
use Amp\Delayed;
use Amp\Loop;

require_once __DIR__.'/vendor/autoload.php';

asyncCall(function () {
    yield new Delayed(5000);

    echo 'Hello world'.PHP_EOL;
});

asyncCall(function () {
    for ($i = 0; $i < 5; ++$i) {
        echo $i.PHP_EOL;

        yield new Delayed(500);
    }
});

Loop::run();
