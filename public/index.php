<?php
require_once __DIR__ . '/../inc/load.php';

if ($_SERVER['REQUEST_URI'] !== '/' && $_SERVER['REQUEST_URI'] !== '/index.php') {
    require_once __DIR__ . '/../inc/route.php';
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
    head('index');
    ?>
    <link href="//demos.sim/assets/css/index.css" rel="stylesheet" />
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <center>
        <h1 style="font-size: 4rem;">Subin's Lab</h1>
        <p style="margin: 10px 0px 30px;">My experiements with code</p>
      </center>
      <div class="demos_list">
        <?php
        krsort($demoList);
        $i    = 0;
        $even = array(0, 2, 4, 6, 8);
        foreach ($demoList as $demoIndex => $demo) {
            $i++;
            if ($i % 2 == 0) {
                echo '<div class="row even">';
            } else {
                echo '<div class="row">';
            }
            echo "<div class='field'>{$demo['title']}</div>";

            if ($demo['url'] != '') {
                echo "<div class='field'><a href='{$demo['url']}' target='_blank' class='btn tut waves-effect waves-light'>Tutorial</a></div>";
            } else {
                echo "<div class='field'>Coming Soon...</div>";
            }

            echo "<div class='field'><a href='{$demo['demo']}' class='btn red dm'>Demo</a></div>";

            if (isset($demo['download'])) {
                $downloadLink = '/download/' . $demo['id'];
                echo "<div class='field'><a href='" . $downloadLink . "' class='btn blue dow'>Download</a></div>";
            }
            echo '</div>';
        }
        ?>
      </div>
    </div>
    <?php require_once __DIR__ . '/../inc/views/partial/index_footer.php';?>
  </body>
</html>
