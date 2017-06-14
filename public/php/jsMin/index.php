<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(28);
?>
<!DOCTYPE html>
<html>
 <head>
  <?php head();?>
 </head>
 <body>
  <?php top();?>
  <div class="container" id="content">
   <p>Paste your JavaScript code in the textbox and click <b>Minify</b></p>
   <form method="POST">
    <textarea name="code" style="width:400px;height:200px;"></textarea><br/>
    <button style="padding:5px 30px;font-size:20px;">Minify</button>
   </form>
   <?php
   if(isset($_POST['code'])){
    require_once "min-js.php";
    $jSqueeze = new JSqueeze();
    $input = $_POST['code'];
    echo "<h2>Output</h2>";
    $code = $jSqueeze->squeeze($input, true, false);
    if($code != $input){
     echo '<textarea name="code" style="width:400px;height:200px;">'.$code.'</textarea>';
    }else{
     echo 'There was no need to be minified';
    }
   }
   ?>
  </div>
  <?php
  footer();
  ?>
 </body>
</html>