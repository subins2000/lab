<?php
require_once __DIR__ . "/Fr.star.php";

$star = new \Fr\Star(array(
  "db" => array(
    "host" => getenv('MYSQL_SERVICE_HOST'),
    "port" => getenv('MYSQL_SERVICE_PORT'),
    "username" => getenv('MYSQL_USER'),
    "password" => getenv('MYSQL_PASSWORD'),
    "name" => getenv('MYSQL_DATABASE'),
    "table" => "Fr_star"
  )
));
