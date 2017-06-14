<?php
$host = "localhost"; // Hostname
$port = "3306"; // MySQL Port : Default : 3306
$user = "username"; // Username Here
$pass = "password"; //Password Here
$db   = "database_name"; // Database Name
$dbh  = new PDO('mysql:dbname='.$db.';host='.$host.';port='.$port,$user,$pass);
?>
