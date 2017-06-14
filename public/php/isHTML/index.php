<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(19);
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
   </form>
   <?php
   function isHTML($string){
    return $string != strip_tags($string) ? true:false;
   }
   if(isset($_POST['string']) && $_POST['string']!=""){
    echo "<h3>";
    echo isHTML($_POST['string']) ? "It's HTML" : "Not HTML";
    echo "</h3>";
   }
   ?>
  </div>
  <?php
  
  footer();
  ?>
 </body>
</html>
