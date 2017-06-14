<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(27);
include "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
    head();
    ?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      
      <a href="login.php">Log In</a><br/>
      <a href="register.php">Register</a><br/>
      <a href="reset.php">Forgot Password ?</a>
    </div>
    <?php
    footer();
    ?>
  </body>
</html>
