<?php
require_once __DIR__ . "/../../inc/load.php";
init(21);
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
    <label>
     Username / E-Mail
     <input type="text" name="login" />
    </label><br/>
    <label>
     Password
     <input type="password" name="password"/>
    </label><br/>
    <button name="submit">Login</button>
   </form>
   <?php
   if(isset($_POST['submit'])){
    $user=$_POST['login'];
    $pass=$_POST['password'];
    if($user=="" || $pass==""){
     $msg="Username / Password Left Blank";
    }else{
     if(($user=="subins2000" || $user=="mail@subinsb.com") && $pass=="testaccount"){
      $msg="Login Successful";
     }else{
      $msg="Username / Password Incorrect";
     }
    }
    if(isset($msg)){
     echo "<blockquote><b>$msg</b></blockquote>";
    }
   }
   ?>
   <p>
    <h2>User Details</h2>
    <table><tbody>
     <tr><td>Username</td><td>:</td><td>subins2000</td></tr>
     <tr><td>E-Mail</td><td>:</td><td>mail@subinsb.com</td></tr>
     <tr><td>Password</td><td>:</td><td>testaccount</td></tr>
    </tbody></table>
   </p>
  </div>
  <?php
  
  footer();
  ?>
 </body>
</html>
