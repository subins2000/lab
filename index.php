<?php
require_once __DIR__ . "/inc/load.php";
?>
<!DOCTYPE html>
<html>
	<head>
    <?php
    head("index");
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
        include "inc/posts.php";
        krsort($parr);
        $i = 0;
        $even = array(0, 2, 4, 6, 8);
        foreach($parr as $k => $v){
          $i++;
          if($i % 2 == 0){
            echo '<div class="row even">';
          }else{
            echo '<div class="row">';
          }
          echo "<div class='field'>{$v['title']}</div>";
          if($v['url'] != ''){
            echo "<div class='field'><a href='{$v['url']}' target='_blank' class='btn tut waves-effect waves-light'>Tutorial</a></div>";
          }else{
            echo "<div class='field'>Coming Soon...</div>";
          }
          echo "<div class='field'><a href='{$v['d']}' class='btn red dm'>Demo</a></div>";
          if($v['down'] != ''){
            $v['down'] = "down.php?class=$k";
            echo "<div class='field'><a href='{$v['down']}' class='btn blue dow'>Download</a></div>";
          }
          echo '</div>';
        }
        ?>
			</div>
		</div>
		<?php include 'inc/views/index_footer.php';?>
	</body>
</html>
