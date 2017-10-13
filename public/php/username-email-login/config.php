$musername = getenv('MYSQL_USER');
$mpassword = getenv('MYSQL_PASSWORD');
$hostname  = getenv('MYSQL_SERVICE_HOST');
$db        = getenv('MYSQL_DATABASE');
$port      = getenv('MYSQL_SERVICE_PORT');
$dbh=new PDO('mysql:dbname='.$db.';host='.$hostname.";port=".$port, $musername, $mpassword);
