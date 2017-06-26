<?php
require_once __DIR__ . '/../../../inc/load.php';
init(27);
require 'config.php';
if (isset($_POST['newName'])) {
    $_POST['newName'] = $_POST['newName'] == '' ? 'Dude' : $_POST['newName'];
    $LS->updateUser(array(
        'name' => $_POST['newName'],
    ));
}
?>
<html>
  <head>
    <title>Home</title>
    <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
    <h3>Welcome</h3>
          <p>You have been successfully logged in.</p>
          <p>
            <a href="logout.php">Log Out</a>
          </p>
          <p>
            You registered on this website <strong><?php echo $LS->joinedSince(); ?></strong> ago.
          </p>
          <p>
            Here is the full data, the database stores on this user :
          </p>
          <pre><?php
               $details = $LS->getUser();
               print_r($details);
               ?></pre>
          <p>
            Change the name of your account :
          </p>
          <form action="home.php" method="POST">
              <input name="newName" placeholder="New name" />
              <button class="btn orange">Change Name</button>
          </form>
      <p>
        <a class="btn blue" href="change.php">Change Password</a>
      </p>
    </div>
    <?php footer();?>
  </body>
</html>
