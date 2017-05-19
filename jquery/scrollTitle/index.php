<?php
require_once "../../inc/load.php";
init(31);
?>
<!DOCTYPE html>
<html>
 	<head>
		<script src="//lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js"></script>
		<script src="scrolling-title.js"></script>
		<?php $pt="Scrolling Title";head();?>
 	</head>
 	<body>
		<?php top();?>
		<div class="container" id="content">
			<h2>Scrolling Page Title</h2>
			<p>See the tab of the browser of this page or the window name</p>
		</div>
		<script>
			$(document).ready(function(){
				$.scrollTitle({
					direction: "right",
					speed: 300,
					continue: true
				});
			});
		</script>
		<?php footer()?>
 	</body>
</html>