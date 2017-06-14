<?php
require_once __DIR__ . '/../../../inc/load.php';
init(15);
?>
<!DOCTYPE html>
<html>
 <head>
  <?php head();?>
  <script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
  <script src="smention.js"></script>
  <link href="smention.css" rel="stylesheet"/>
  <title><?php echo $GLOBALS['title'];?></title>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <form action="validate.php" method="POST" id="sm-demo">
    <h2>Works On Inputs</h2>
    <input type="text" name="input" size="40"/><br/>
    <h2>As well as Textareas</h2>
    <textarea name="textarea" cols="40" rows="10"></textarea><br/>
    <input type="submit" value="Server Validate" name="submit"/>
   </form>
   <br/><div>There are only two users available - Subin Siby & Anandu</div>
  
  <script>
  $(document).ready(function(){
   $("#sm-demo input, #sm-demo textarea").smention("get_users.php",{
    avatar:true,
    extraParams:{lk:"a"}
   });
  });
  </script>
 <?php footer();?>
 </body>
</html>
