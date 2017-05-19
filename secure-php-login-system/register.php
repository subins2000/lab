<?php
session_start();
if ($_SESSION['user'] != '') {
    header('Location:home.php');
}
?>
<!DOCTYPE html>
<html>
 <head></head>
 <body>
  <form action="register.php" method="POST">
   <label>E-Mail <input name="user" /></label><br/>
   <label>Password <input name="pass" type="password"/></label><br/>
   <button name="submit">Register</button>
  </form>
  <?php
  if (isset($_POST['submit'])) {
      $musername = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
      $mpassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
      $hostname  = getenv('OPENSHIFT_MYSQL_DB_HOST');
      $db        = getenv('OPENSHIFT_GEAR_NAME');
      $port      = getenv('OPENSHIFT_MYSQL_DB_PORT');
      $dbh       = new PDO('mysql:dbname=' . $db . ';host=' . $hostname . ';port=' . $port, $musername, $mpassword); /*Change The Credentials to connect to database.*/
      if (isset($_POST['user']) && isset($_POST['pass'])) {
          $password = $_POST['pass'];
          $sql      = $dbh->prepare('SELECT COUNT(*) FROM `users` WHERE `username`=?');
          $sql->execute(array($_POST['user']));
          if ($sql->fetchColumn() != 0) {
              die('User Exists');
          } else {
              function randString($length)
              {
                  $str   = '';
                  $chars = 'subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                  $size  = strlen($chars);
                  for ($i = 0; $i < $length; $i++) {
                      $str .= $chars[rand(0, $size - 1)];
                  }
                  return $str; /* //subinsb.com/php-generate-random-string */
              }

              $p_salt      = randString(20); /* //subinsb.com/php-generate-random-string */
              $site_salt   = 'subinsblogsalt'; /*Common Salt used for password storing on site.*/
              $salted_hash = hash('sha256', $password . $site_salt . $p_salt);
              $sql         = $dbh->prepare('INSERT INTO `users` (`id`, `username`, `password`, `psalt`) VALUES (NULL, ?, ?, ?);');
              $sql->execute(array($_POST['user'], $salted_hash, $p_salt));
              echo 'Successfully Registered.';
          }
      }
  }
  ?>
 </body>
</html>
