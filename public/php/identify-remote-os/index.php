<?php
require_once __DIR__ . '/../../../inc/load.php';
init(25);
?>
<!DOCTYPE html>
<html>
 <head>
  <?php head();?>
  <title><?php echo  $GLOBALS['title'];?></title>
 </head>
 <body>
  <?php top();?>
  <div class="container" id="content">
   <p>You can identify the Operating System (OS) of a remote computer by it's IP address. But, it can't be 100% accurate and can produce unexpected results.</p>
   <form action="" method="POST" style="margin-top:10px;">
    <label>
     IP Address
     <input type="text" name="ip"/>
    </label><br/>
    <button class="btn orange">Find Operating System</button>
   </form>
   <?php
   function detectOs($ip, $returnArray=true){
    if(filter_var($ip, FILTER_VALIDATE_IP)){
     $cmd="ping -c 2 $ip";
     $shell=shell_exec($cmd);
     preg_match("/ttl=(.*?)\stime/", $shell, $m);
     if(isset($m[1])){
      $ttl=$m[1];
      $list=file_get_contents("./ttlValues.txt");
      $list=json_decode($list, true);
      $oses=array();
      if($ttl==64){$oses[]="Mostly A *nix Device (Linux, Unix etc..)";}
      if($ttl==128){$oses[]="Mostly A Windows Device";}
      if($ttl==254){$oses[]="Mostly A Solaris/AIX Device";}
      foreach($list as $vals) {
       if($vals['ttl']==$ttl){
        $oses[]=$vals['device']." ".$vals['version'];
       }
      }
      return $returnArray===true ? $oses:implode(",", $oses);
     }else{
      return "connectionFailed";
     }
    }else{
     return "invalidIP";
    }
   }
   if(isset($_POST['ip'])){
    $os=detectOs($_POST['ip']);
    if($os=="invalidIP"){
     echo "Invalid IP address";
    }elseif($os=="connectionFailed"){
     echo "Unable to connect to external server";
    }else{
     echo "<br/>The Operating System Can Be one of the following : <ul>";
     foreach($os as $v){
      echo "<li>$v</li>";
     }
     echo "</ul>";
    }
   }
   ?>
  </div>
  <?php footer();?>
 </body>
</html>
