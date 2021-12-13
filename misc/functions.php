<?php

use Symfony\Component\HttpClient\HttpClient;

function doRequest(string $url): string
{
    $client = HttpClient::create();
    $response = $client->request('GET', $url);

    return $response->getContent();
}
