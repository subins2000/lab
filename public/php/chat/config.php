<?php
// ini_set("display_errors","on");
if(!isset($dbh)){
 session_start();
 date_default_timezone_set("UTC"); // Set Time Zone
 $musername = getenv('MYSQL_USER');
 $mpassword = getenv('MYSQL_PASSWORD');
 $hostname  = getenv('MYSQL_SERVICE_HOST');
 $dbname    = getenv('MYSQL_DATABASE');
 $port      = getenv('MYSQL_SERVICE_PORT');
 $dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=".$port,$musername, $mpassword);
 /*Change The Credentials to connect to database.*/
}
include("user_online.php");
?>
