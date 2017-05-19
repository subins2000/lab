<?php
require_once "../../inc/load.php";
init(32);
?>
<!DOCTYPE html>
<html>
 	<head>
		<script src="//lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js"></script> <!-- //lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js -->
		<script src="//lab.subinsb.com/projects/jquery/chess/jquery.chess.min.js"></script>
		<?php head();?>
 	</head>
 	<body>
		<?php top();?>
		<div class="container" id="content">
			<h2>jQuery Chess Game</h2>
			<div id="game"></div>
			<script>
				$(document).ready(function(){
					$("#game").chess();
				});
			</script>
		</div>
		<?php footer()?>
 	</body>
</html>
