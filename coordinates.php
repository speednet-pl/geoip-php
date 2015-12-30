<?php
require 'vendor/autoload.php';

$lat = 54.49;
$lon = 18.54;

$uri = 'https://nominatim.openstreetmap.org/reverse?format=json&zoom=18&lat=' . $lat . '&lon=' . $lon;
$client = new GuzzleHttp\Client();
$response = $client->request('GET', $uri);
$content = $response->getBody()->getContents();

$json = json_decode($content);
if (!is_object($json) || !property_exists($json, 'address')) {
    die('Problem with response from OpenStreetMap' . PHP_EOL);
}

echo 'Country Code          : ' . $json->address->country_code . PHP_EOL;
echo 'Country Name          : ' . $json->address->country . PHP_EOL;
echo 'Region Name           : ' . $json->address->state . PHP_EOL;
echo 'City Name             : ' . $json->address->city . PHP_EOL;
echo 'Street                : ' . $json->address->road . PHP_EOL;
