<?php
require_once __DIR__ . "/../../inc/load.php";
init(22);
?>
<!DOCTYPE html>
<html>
 <head>
  <?php head();?>
  <title><?php echo $GLOBALS['title'];?></title>
  
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <center>
    <p>Hey, you want a dynamic download ? Just click the button</p>
    <a href="download.php">
     <button style="margin:5px auto;padding:10px 25px;">Download</button>
    </a>
   </center>
  </div>
  <?php
  
  footer();
  ?>
 </body>
</html>
