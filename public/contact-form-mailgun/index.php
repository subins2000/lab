<?php
require_once __DIR__ . '/../../inc/load.php';
init(14);
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
   <form action="contact.php" method="POST">
    Name<br/>
    <input type="text" name="name" placeholder="Your Name" size="40"/><br/>
    Message<br/>
    <textarea name="message" cols="40" rows="10"></textarea><br/>
    <input type="submit" value="Send Message" name="submit"/>
   </form>
 <?php echo footer();?>
 </body>
</html>
