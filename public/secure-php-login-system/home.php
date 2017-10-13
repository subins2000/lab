<?php
require_once __DIR__ . '/../../inc/load.php';
init(1);
?>
<!DOCTYPE html>
<html><head></head>
<body>
<?php
session_start();
if ($_SESSION['user'] == '') {
    header('Location:login.php');
} else {
    $musername = getenv('MYSQL_USER');
    $mpassword = getenv('MYSQL_PASSWORD');
    $hostname  = getenv('MYSQL_SERVICE_HOST');
    $db        = getenv('MYSQL_DATABASE');
    $port      = getenv('MYSQL_SERVICE_PORT');
    $dbh       = new PDO('mysql:dbname=' . $db . ';host=' . $hostname . ';port=' . $port, $musername, $mpassword); /*Change The Credentials to connect to database.*/
    $sql       = $dbh->prepare('SELECT * FROM users WHERE id=?');
    $sql->execute(array($_SESSION['user']));
    while ($r = $sql->fetch()) {
        echo '<center><h2>Hello, ' . $r['username'] . '</h2>';
        echo "<a href='logout.php'>Log Out</a></center>";
    }
}
?>
</body>
</html>
