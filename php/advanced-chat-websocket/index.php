<?php
include "../../inc/load.php";
init(40);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php head();?>
    <!--
    <script src="//lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js"></script>
		<script src="//lab.subinsb.com/projects/Francium/voice/recorder.js"></script>
		<script src="//lab.subinsb.com/projects/Francium/voice/Fr.voice.js"></script>
    -->
    
    <script src="//lab.sim/projects/jquery/core/jquery-2.1.1.js"></script>
		<script src="//lab.sim/projects/Francium/voice/recorder.js"></script>
		<script src="//lab.sim/projects/Francium/voice/Fr.voice.js"></script>
    
    <script src="js/time.js"></script>
    <script src="js/chat.js"></script>
    <link href="css/chat.css" rel="stylesheet"/>
  </head>
  <body>
    <?php top();?>
    <div class="container" id="content">
      <div class="chatWindow">
        <div style="display: none;postion: absolute;">
          <input type="file" id="photoFile" accept="image/*" />
          <audio src="assets/message.wav" controls="false" id="notification"></audio>
        </div>
        <div class="users"></div>
        <div class="chatbox">
					<div class="topbar">
            <span id="status" title="Click to Login/Logout">Offline</span>
            <span id="fullscreen" title="Toggle Fullscreen of Chat Box">Fullscreen</span>
          </div>
					<div class="chat">
            <div class="msgs"></div>
            <form id="msgForm">
							<textarea name="msg" placeholder="Type message here...."></textarea>
              <a class="button" id="voice" title="Click to start recording message"></a>
              <a class="button" id="photo" title="Type in a message and choose image to send"></a>
						</form>
					</div>
					<div class="login">
						<p>Type in your name to start chatting !</p>
						<form id="loginForm">
							<input type="text" value="" />
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
