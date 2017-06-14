<?php
require_once __DIR__ . '/../../../inc/load.php';
init(44);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <form>
        <p>Type in seconds :</p>
        <input type="text" name="seconds" />
      </form>
      <?php
      function secToHR($seconds, $other = false) {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        return $other ? "$hours:$minutes:$seconds" : ($hours > 0 ? "$hours hours, $minutes minutes remaining" : ($minutes > 0 ? "$minutes minutes, $seconds seconds remaining" : "$seconds seconds remaining"));
      }
      if(isset($_GET['seconds'])){
        echo "<h3>Result</h3>";
        echo @secToHR(htmlspecialchars($_GET['seconds'])) . "<br/>";
        echo @secToHR(htmlspecialchars($_GET['seconds']), true);
      }
      ?>
    </div>
    <?php
    footer();
    ?>
  </body>
</html>
