<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['user_id'] = rand(0, 1024);
}

require_once __DIR__ . '/../../../inc/load.php';
init(41);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
    <link rel="stylesheet" href="css/Fr.star.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//lab.subinsb.com/projects/Francium/star/Fr.star.js"></script>
    <script src="js/rate.js"></script>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <p>Rating for "index_page" :</p>
      <?php
      require_once __DIR__ . "/config.php";
      $star->id = "index_page";
      
      echo "Rating :";
      echo "<p>" . $star->getRating("userChoose size-1") . "</p>";
      
      echo "<p>Your Rating :</p>";
      echo $star->userRating($_SESSION['user_id']);
      echo "<p>^- You will have to refresh page to update the above value</p>";
      
      echo "<h2>Different Sizes</h2>";
      
      echo "<p>170x30" . $star->getRating("userChoose size-2") . "</p>";
      echo "<p>115x20" . $star->getRating("userChoose size-3") . "</p>";
      echo "<p>55x10" . $star->getRating("userChoose size-4") . "</p>";
      
      echo "<h2>Just Show It !</h2>";
      
      echo "<p>170x30" . $star->getRating("size-2") . "</p>";
      echo "<p>115x20" . $star->getRating("size-3") . "</p>";
      echo "<p>55x10" . $star->getRating("size-4") . "</p>";
      ?>
    </div>
    <?php
    footer();
    ?>
  </body>
</html>
