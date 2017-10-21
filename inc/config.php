<?php
// ini_set("display_errors","on");

date_default_timezone_set('UTC'); // Set Time Zone

$url = parse_url(getenv('CLEARDB_DATABASE_URL'));

$username = $url['user'];
$password = $url['pass'];
$hostname = $url['host'];
$dbname   = substr($url['path'], 1);
$port     = $url['port'];
$dbh      = new PDO('mysql:dbname=' . $dbname . ';host=' . $hostname . ';port=' . $port, $username, $password);

$siteHostname = 'demos.subinsb.com';
$siteURL      = 'https://demos.subinsb.com';
$blogURL      = 'https://subinsb.com';
