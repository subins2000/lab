<?php
require_once __DIR__ . '/../../../inc/load.php';
init(27);

require 'config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Change Password</title>
    <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <h3>Change Password</h3>
      <?php
      if (isset($_POST['change_password'])) {
          if (isset($_POST['current_password']) && $_POST['current_password'] != '' && isset($_POST['new_password']) && $_POST['new_password'] != '' && isset($_POST['retype_password']) && $_POST['retype_password'] != '' && isset($_POST['current_password']) && $_POST['current_password'] != '') {

              $curpass         = $_POST['current_password'];
              $new_password    = $_POST['new_password'];
              $retype_password = $_POST['retype_password'];

              if ($new_password != $retype_password) {
                  echo "<p><h2>Passwords Doesn't match</h2><p>The passwords you entered didn't match. Try again.</p></p>";
              } else if ($LS->login($LS->getUser('username'), $_POST['current_password'], false, false) === false) {
                  echo '<h2>Current Password Wrong!</h2><p>The password you entered for your account is wrong.</p>';
              } else {
                  $change_password = $LS->changePassword($new_password);
                  if ($change_password === true) {
                      echo '<h2>Password Changed Successfully</h2>';
                  }
              }
          } else {
              echo '<p><h2>Password Fields was blank</h2><p>Form fields were left blank</p></p>';
          }
      }
      ?>
      <form action="<?php echo \Fr\LS::curPageURL(); ?>" method='POST'>
        <label>
          <p>Current Password</p>
          <input type='password' name='current_password' />
        </label>
        <label>
          <p>New Password</p>
          <input type='password' name='new_password' />
        </label>
        <label>
          <p>Retype New Password</p>
          <input type='password' name='retype_password' />
        </label>
        <button class="btn red" name='change_password' type='submit'>Change Password</button>
      </form>
    </div>
    <?php footer();?>
  </body>
</html>
