<?php
require_once __DIR__ . "/Fr.star.php";

$star = new \Fr\Star(array(
  "db" => array(
    "host" => getenv('OPENSHIFT_MYSQL_DB_HOST'),
    "port" => getenv('OPENSHIFT_MYSQL_DB_PORT'),
    "username" => getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
    "password" => getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),
    "name" => getenv('OPENSHIFT_GEAR_NAME'),
    "table" => "Fr_star"
  )
));
