<?php

use function Amp\ParallelFunctions\parallelMap;
use function Amp\Promise\wait;
use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__.'/vendor/autoload.php';

$request = static function (string $url): string {
    $client = HttpClient::create();

    $response = $client->request('GET', $url);

    return $response->getContent(false);
};

$responses = wait(parallelMap(
    ['https://github.com', 'https://facebook.com'],
    $request
));

var_dump($responses);
