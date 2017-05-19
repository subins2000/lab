<?php
require_once __DIR__ . '/../inc/load.php';
init(1);
?>
<!DOCTYPE html>
<html><head>
 <?php head();?>
<title>MySQL injection free Secure Login System - PHP Demo</title><?php include '../inc/track.php';?>
</head><body>
<?php top();?>
<div class="container" id="content">
<p>There is a simple, much better, more secure login system called <a href="<?php echo $GLOBALS['demoList'][27]['d']; ?>">logSys</a>. I HIGHLY advice you to use that instead of this.</p>
<form method="POST" action="index.php" style="border:1px solid black;display:table;margin:0px auto;padding-left:10px;padding-bottom:5px;">
<table width="300" cellpadding="4" cellspacing="1">
<tr><td><td colspan="3"><strong>User Login</strong></td></tr>
<tr><td width="78">E-Mail</td><td width="6">:</td><td width="294"><input size="25" name="mail" type="text"></td></tr>
<tr><td>Password</td><td>:</td><td><input name="pass" size="25" type="password"></td></tr>
<tr><td></td><td></td><td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
E-Mail & Password Can be found <a target="_blank" href='//subinsb.com/php-secure-login-system'>here.</a>
<?php
session_start();
if (isset($_SESSION['user'])) {header('Location:home.php');}
$musername = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$mpassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$hostname  = getenv('OPENSHIFT_MYSQL_DB_HOST');
$db        = getenv('OPENSHIFT_GEAR_NAME');
$port      = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbh       = new PDO('mysql:dbname=' . $db . ';host=' . $hostname . ';port=' . $port, $musername, $mpassword); /*Change The Credentials to connect to database.*/
$email     = isset($_POST['mail']) ? $_POST['mail'] : '';
$password  = isset($_POST['pass']) ? $_POST['pass'] : '';
if ($email != '' && $password != '') {
    $sql = $dbh->prepare('SELECT * FROM users WHERE username=?');
    $sql->execute(array($email));
    if ($sql->rowCount() > 0) {
        while ($r = $sql->fetch()) {
            $p      = $r['password'];
            $p_salt = $r['psalt'];
            $id     = $r['id'];
        }
        $site_salt   = 'subinsblogsalt'; /*Common Salt used for password storing on site. You can't change it. If you want to change it, change it when you register a user.*/
        $salted_hash = hash('sha256', $password . $site_salt . $p_salt);
        if ($p == $salted_hash) {
            $_SESSION['user'] = $id;
            header('Location:home.php');
        } else {
            echo '<h2>E-Mail/Password is Incorrect.</h2>';
        }
    } else {
        echo '<h2>E-Mail/Password is Incorrect.</h2>';
    }
}
?>
</form>
<?php footer();?>
</div>
</body></html>
