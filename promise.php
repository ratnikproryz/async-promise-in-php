<?php

require_once(__DIR__ . '/vendor/autoload.php');
use GuzzleHttp\Client;

$client = new Client;

$urls = [
    'http://localhost/guzzle/server.php?idx=0',
    'http://localhost/guzzle/server.php?idx=1',
    'http://localhost/guzzle/server.php?idx=2',
    'http://localhost/guzzle/server.php?idx=3',
    'http://localhost/guzzle/server.php?idx=4',
];

$promises = [];

foreach ($urls as $idx => $url) {
    $promises[] = $client->getAsync($url);
}

foreach ($promises as $promise) {
    $response = $promise->wait();
    echo $response->getBody();
}
