$musername = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$mpassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$hostname  = getenv('OPENSHIFT_MYSQL_DB_HOST');
$db        = getenv('OPENSHIFT_GEAR_NAME');
$port      = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbh=new PDO('mysql:dbname='.$db.';host='.$hostname.";port=".$port, $musername, $mpassword);
