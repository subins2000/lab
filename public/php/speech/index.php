<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(17);
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
   
   <form action="index.php" method="POST">
    <textarea name="msg" cols="40" rows="10"></textarea><br/>
    <input type="submit" name="submit" value="Make It Speak"/>
   </form>
   Make sure the text you submit doesn't exceed 100 <br/>characters, because it won't work.<br/><b>Your browser should support HTML5 audio element</b>
   <?php
   if(isset($_POST['submit'])){
      $msg = urlencode($_POST['msg']);
      echo "<h2>Audio Output</h2><audio autoplay controls src='get_sound.php?text=$msg'></audio>";
   }
   ?>
  </div>
  <?php footer();?>
 </body>
</html>
