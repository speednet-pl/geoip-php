<?php
require 'vendor/autoload.php';

if (!isset($_GET['lat']) || !isset($_GET['lon'])) {
    die();
}

$lat = $_GET['lat'];
$lon = $_GET['lon'];

$uri = 'https://nominatim.openstreetmap.org/reverse?format=json&zoom=18&lat=' . $lat . '&lon=' . $lon;
$client = new GuzzleHttp\Client();
$response = $client->request('GET', $uri);
$content = $response->getBody()->getContents();

$json = json_decode($content);
if (!is_object($json) || !property_exists($json, 'address')) {
    die('Problem with response from OpenStreetMap' . PHP_EOL);
}

echo $content;
