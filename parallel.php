<?php

use function Amp\Parallel\Worker\enqueueCallable;
use function Amp\Promise\all;
use function Amp\Promise\wait;

require_once __DIR__.'/vendor/autoload.php';

$urls = [
    'https://github.com',
    'https://www.w3schools.in',
    'https://facebook.com',
];

$promises = [];
foreach ($urls as $url) {
    $promises[$url] = enqueueCallable('doRequest', $url);
}

$responses = wait(all($promises));

foreach ($responses as $url => $response) {
    \printf("Read %d bytes from %s\n", \strlen($response), $url);
}
