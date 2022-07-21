<?php
$client = new GuzzleHttp\Client;

$promise = $client->getAsync('http://example.com/get');
$promise = $client->deleteAsync('http://example.com/delete');
$promise = $client->headAsync('http://example.com/get');
$promise = $client->optionsAsync('http://example.com/get');
$promise = $client->patchAsync('http://example.com/patch');
$promise = $client->postAsync('http://example.com/post');
$promise = $client->putAsync('http://example.com/put');
