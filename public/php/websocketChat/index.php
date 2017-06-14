<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(30);
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="assets/jquery.js"></script>
		<script src="assets/ws.js"></script>
		<script src="assets/chat.js"></script>
		<link href="assets/chat.css" rel="stylesheet"/>
		<?php head();?>
	</head>
	<body>
		<?php top();?>
		<div class="container" id="content">
			
			<div class="chatWindow">
				<div class="users"></div>
				<div class="chatbox">
					<div class="status">Offline</div>
					<div class="chat">
						<div class="msgs"></div>
	 					<form id="msgForm">
							<input type="text" size="30" />
							<button class="btn orange">Send</button>
						</form>
					</div>
					<div class="login">
						<p>Type in your name to start chatting !</p>
						<form id="loginForm">
							<input type="text" />
							<button class="btn orange">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<p>To Exit chat, just close the window.</p>
		</div>
		<?php footer();?>
	</body>
</html>
