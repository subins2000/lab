<?php
// ini_set("display_errors","on");
if (!isset($dbh)) {
    date_default_timezone_set('UTC'); // Set Time Zone

    $username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $hostname = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbname   = getenv('OPENSHIFT_GEAR_NAME');
    $port     = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $dbh      = new PDO('mysql:dbname=' . $dbname . ';host=' . $hostname . ';port=' . $port, $username, $password);

    $siteHostname = 'demos.sim';
    $siteURL      = 'https://demos.sim';
    $blogURL      = 'https://subinsb.com';
}
