<?php
include("config.php");
include("login.php");
require_once __DIR__ . "/../../inc/load.php";
init(23);
?>
<!DOCTYPE html>
<html>
 <head>
  <?php head();?>
  <script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
  <script src="chat.js"></script>
  <link href="chat.css" rel="stylesheet"/>
  <title><?php echo $GLOBALS['title'];?></title>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <div class="chat">
    <div class="users">
     <?php include("users.php");?>
    </div>
    <div class="chatbox">
     <?php
     if(isset($_SESSION['user'])){
      include("chatbox.php");
     }else{
      $display_case=true;
      include("login.php");
     }
     ?>
    </div>
   </div>
  </div>
  <?php footer();?>
 </body>
</html>
