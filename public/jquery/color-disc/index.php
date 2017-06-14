<?php
require_once __DIR__ . '/../../../inc/load.php';
init(33);
?>
<!DOCTYPE html>
<html>
 	<head>
		<script src="//lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js"></script> <!-- //lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js -->
		<script src="//lab.subinsb.com/projects/jquery/colorDisc/raphael.js"></script>
		<script src="//lab.subinsb.com/projects/jquery/colorDisc/jquery.colorDisc.min.js"></script>
		<link href="//lab.subinsb.com/projects/jquery/colorDisc/jquery.colorDisc.css" rel="stylesheet" />
		<?php head();?>
 	</head>
 	<body>
		<?php top();?>
		<div class="container" id="content">
			<p>Check out different versions of Newton Color Disc. Ensure that you have a good <b><a target="_blank" style="color: white;" href="//en.wikipedia.org/wiki/Graphics_processing_unit">GPU</a></b></p>
			<div class="discs">
				<a class="disc" data-color="red,green,blue">Red-Green-Blue</a>
				<a class="disc" data-color="violet,indigo,blue,green,yellow,orange,red">VIBGYOR</a>
				<a class="disc" data-color="yellow,blue">Yellow-Blue</a>
				<a class="disc" data-color="">My Own</a>
			</div>
			<div id="holder"></div>
			<div class="controls">
				<a>Increase Speed</a>
				<a data-speed="0.01">Faster</a>
				<a data-speed="0.0001">Fastest</a>
				<a data-speed="">Custom Speed</a>
			</div>
			<script>
			$(document).ready(function(){
				var cd = $("#holder").colorDisc();
				$(".controls a").on("click", function(){
					s = $(this).data("speed");
					if(s == ""){
						s = prompt("Lower the value, speeder it'll be. Fastest Speed : 0.0001");
					}
					s != null ? $("#holder").colorDisc("speed", s) : "";
				});
				$(".discs a").on("click", function(){
					color = $(this).data("color");
					if(color == ""){
						color = prompt("Give colors separated by a comma. No whitespaces");
					}
					colors = color.split(",");
					$("#holder").colorDisc(colors);
				});
			});
			</script>
			<style>
			#content{
				background: black;
				color: white;
				padding: 0px 20px 40px;
			}
			.controls a, .discs a{
				margin: 5px;
				cursor: pointer;
				display: inline-block;
				background: white;
				color: black;
				padding: 5px 15px;
			}
			#holder #colorDisc{
				margin: 10px;
			}
			</style>
		</div>
		<?php footer()?>
 	</body>
</html>
