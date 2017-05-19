<?php
require_once __DIR__ . "/../../inc/load.php";
init(27);

require "config.php";
\Fr\LS::init();
?>
<html>
 <head>
  <title>Log In</title>
  <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <h3>Log In</h3>
      <p>This demo shows how logSys can be used to implement two step verification.</p>
      <?php
      $two_step_login_active = false;
      if(\Fr\LS::twoStepLogin() === false && isset($_POST['action_login'])){
        $identification = $_POST['login'];
        $password = $_POST['password'];
        if($identification == "" || $password == ""){
          echo "<h2>Error</h2><p>Username / Password left blank</p>";
        }else{
          $login = \Fr\LS::twoStepLogin($identification, $password, isset($_POST['remember_me']));
          if($login === false){
            echo "<h2>Error</h2><p>Username / Password Wrong !</p>";
          }else if(is_array($login) && $login['status'] == "blocked"){
            echo "<h2>Error</h2><p>Too many login attempts. You can attempt login after ". $login['minutes'] ." minutes (". $login['seconds'] ." seconds)</p>";
          }else{
            $two_step_login_active = true;
          }
        }
      }
      if(!$two_step_login_active){
      ?>
        <form action="login.php" method="POST" style="margin:0px auto;display:table;">
          <label>
            <input name="login" type="text" placeholder="Username or E-Mail" />
          </label><br/>
          <label>
            <input name="password" type="password" placeholder="Password" />
          </label><br/>
          <label>
            <input type="checkbox" name="remember_me" id="remember_me" />
            <label for="remeber_me" onclick="document.getElementById('remember_me').click();">Remember Me</label>
          </label>
          <div clear></div>
          <button style="width:150px;" name="action_login" class="btn green">Log In</button>
        </form>
      <?php
      }else{
      ?>
      <style>
        input[type=checkbox]{
          display: inline-block !important;
          left: 0 !important;
          visibility: visible !important;
          position: static !important;
        }
      </style>
      <?php
      }
      ?>
      <p>
        <p>Don't have an account ?</p>
        <a class="btn orange" href="register.php">Register</a>
      </p>
      <p>
        <p>Forgot Your Password ?</p>
        <a class="btn red" href="reset.php">Reset Password</a>
      </p>
    </div>
    <?php footer()?>
  </body>
</html>
