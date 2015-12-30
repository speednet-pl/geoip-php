<?php
require 'vendor/autoload.php';

$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '213.192.107.210';
$dbFile = './databases/IP2LOCATION-LITE-DB11.BIN';
if (!file_exists($dbFile)) {
    die('First download DB file: http://lite.ip2location.com/database-ip-country-region-city-latitude-longitude-zipcode-timezone' . PHP_EOL);
}

$db = new \IP2Location\Database($dbFile, \IP2Location\Database::FILE_IO);
$records = $db->lookup($ip, \IP2Location\Database::ALL);

echo 'IP Address            : ' . $records['ipAddress'] . PHP_EOL;
echo 'Country Code          : ' . $records['countryCode'] . PHP_EOL;
echo 'Country Name          : ' . $records['countryName'] . PHP_EOL;
echo 'Region Name           : ' . $records['regionName'] . PHP_EOL;
echo 'City Name             : ' . $records['cityName'] . PHP_EOL;
echo 'Latitude              : ' . $records['latitude'] . PHP_EOL;
echo 'Longitude             : ' . $records['longitude'] . PHP_EOL;
