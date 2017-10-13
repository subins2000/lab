<?php
ini_set("display_errors","on");
if(!isset($dbh)){
 session_start();
 date_default_timezone_set("UTC");

  $musername = getenv('MYSQL_USER');
  $mpassword = getenv('MYSQL_PASSWORD');
  $hostname  = getenv('MYSQL_SERVICE_HOST');
  $dbname    = getenv('MYSQL_DATABASE');
  $port      = getenv('MYSQL_SERVICE_PORT');
  
 $dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=".$port,$musername, $mpassword);
 $dbh->exec("SET time_zone='+00:00';");
 
 /*Change The Credentials to connect to database.*/
 include("user_online.php");
}
?>
