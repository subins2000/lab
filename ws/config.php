<?php
ini_set('display_errors', 'on');
$docRoot = __DIR__;

require_once $docRoot . '/vendor/autoload.php';

if (!isset($dbh)) {
    session_start();
    date_default_timezone_set('UTC');

    $url = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $username = $url['user'];
    $password = $url['pass'];
    $hostname = $url['host'];
    $dbname   = substr($url['path'], 1);
    $port     = $url['port'];

    $dbh      = new PDO('mysql:dbname=' . $dbname . ';host=' . $hostname . ';port=' . $port, $username, $password);
    $dbh->exec("SET time_zone='+00:00';");
    /**
     * Change The Credentials to connect to database.
     */

    function isRunning()
    {
        exec("ps aux | grep '/bg.php';", $out);
        foreach ($out as $o) {
            if (strpos($o, 'php ') !== false) {
                return true;
                break;
            }
        }
        return false;
    }
}
