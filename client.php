<?php

require_once(__DIR__ . '/vendor/autoload.php');
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

$client = new Client(['base_uri' => 'http://localhost/guzzle/']);
$urls = [
    'server.php?idx=0',
    'server.php?idx=1',
    'server.php?idx=2',
    'server.php?idx=3',
    'server.php?idx=4',
];
echo "Star<br>";
$promises = [];
foreach ($urls as $url) {
    $promises[] = $client->getAsync($url)
        ->then(
            function (ResponseInterface $response) {
                echo $response->getBody();
                return $response;
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );
}
echo "End<br>";

// Wait for the requests to complete; throws an exception
$results = Utils::unwrap($promises);
// Wait for the requests to complete, even if some of them fail
// $results = Utils::settle($promises)->wait();

$promise->then(
    // The success callback
    function (ResponseInterface $response) {
        echo 'Successfully!';
        // execute something…
        return $response;
    },
    // The failure callback
    function (\Exception $exception) {
        echo 'Error!';
        throw $exception;
    }
);
