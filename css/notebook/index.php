<?php
include "../../inc/load.php";
init(39);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
    <script src="//lab.subinsb.com/projects/jquery/core/jquery-latest.js"></script>
    <script src="js/jquery.notebook.js"></script>
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/jquery.notebook.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      
      <div class="paper-wrapper">
        <div class="paper">
          <h2 style="margin: 0px;font-size: 1.5em;">HEADING</h2>
          <div class="entry"></div>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $(".paper .entry").notebook();
        });
      </script>
    </div>
    <?php
    footer();
    ?>
  </body>
</html>
