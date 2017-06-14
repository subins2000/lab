<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(27);
require "config.php";
?>
<html>
  <head>
    <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <h3>Log In</h3>
      <?php
      \Fr\LS::forgotPassword();
      ?>
    </div>
    <?php footer();?>
  </body>
</html>
