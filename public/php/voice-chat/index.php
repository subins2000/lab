<?php
require_once __DIR__ . '/../../../inc/load.php';
init(35);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
    <!--
    <script src="//lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js"></script>
		<script src="//lab.subinsb.com/projects/jquery/voice/recorder.js"></script>
		<script src="//lab.subinsb.com/projects/jquery/voice/jquery.voice.min.js"></script>
    -->
    <script src="//lab.sim/projects/jquery/core/jquery-2.1.1.js"></script>
		<script src="//lab.sim/projects/jquery/voice/recorder.js"></script>
		<script src="//lab.sim/projects/jquery/voice/jquery.voice.min.js"></script>
    <script src="assets/ws.js"></script>
		<script src="assets/chat.js"></script>
    <link href="assets/chat.css" rel="stylesheet"/>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      
      <div class="chatWindow">
        <div class="users"></div>
        <div class="chatbox">
					<div class="status" title="Click to Login/Logout">Offline</div>
					<div class="chat">
            <audio id="audio"></audio>
						<img class="msgs" src="assets/mic.jpg" />
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
    </div>
    <?php
    footer();
    ?>
  </body>
</html>
