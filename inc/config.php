<?php
// ini_set("display_errors","on");

date_default_timezone_set('UTC'); // Set Time Zone

$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$hostname = getenv('MYSQL_SERVICE_HOST');
$dbname   = getenv('MYSQL_DATABASE');
$port     = getenv('MYSQL_SERVICE_PORT');
$dbh      = new PDO('mysql:dbname=' . $dbname . ';host=' . $hostname . ';port=' . $port, $username, $password);

$siteHostname = 'demos.subinsb.com';
$siteURL      = 'https://demos.subinsb.com';
$blogURL      = 'https://subinsb.com';
