<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(20);
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
   
   <form action="" method="POST">
    <textarea name="string" style="width:300px;height:100px;" placeholder="Paste/Add a string here."><?php echo isset($_POST['string']) ? htmlspecialchars($_POST['string']):"";?></textarea><br/>
    <input type="submit" value="Check"/>
    <p>A correct valid JSON data is like this:<blockquote>{"host" : "demos.subinsb.com"}</blockquote></p>
   </form>
   <?php
   function isJSON($string){
    return is_object(json_decode($string));
   }
   if(isset($_POST['string']) && $_POST['string']!=""){
    echo "<h3>";
    echo isJSON($_POST['string']) ? "It's JSON" : "Not JSON";
    echo "</h3>";
   }
   ?>
  </div>
  <?php
  
  footer();
  ?>
 </body>
</html>
