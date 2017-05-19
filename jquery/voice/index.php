<?php
header("HTTP/1.1 301 Moved Permanently"); 
header("Location: /Francium/voice/");
exit();
include "../../inc/load.php";
init(31);
?>
<!DOCTYPE html>
<html>
   <head>
    <script src="//lab.subinsb.com/projects/jquery/core/jquery-2.1.1.js"></script>
    <script src="//lab.subinsb.com/projects/jquery/voice/recorder.js"></script>
    <script src="//lab.subinsb.com/projects/jquery/voice/jquery.voice.min.js"></script>
    <script src="assets/record.js"></script>
    <?php head();?>
   </head>
   <body>
    <?php top();?>
    <div class="container" id="content">
      <h2>Record, Play & Download Microphone Voice</h2>
      <audio controls src="" id="audio"></audio>
      <div style="margin:10px;">
        <a class="button" id="record">Record</a>
        <a class="button disabled one" id="pause">Pause</a>
        <a class="button disabled one" id="stop">Reset</a>
        <a class="button disabled one" id="play">Play</a>
        <a class="button disabled one" id="download">Download</a>
        <a class="button disabled one" id="base64">Base64 URL</a>
        <a class="button disabled one" id="mp3">MP3 URL</a>
        <a class="button disabled one" id="save">Upload to Server</a>
      </div>
      <input class="button" type="checkbox" id="live"/>
      <label for="live">Live Output</label>
      <p>
        <h2>NOTE</h2>
        <p>Since Chrome version 47, Voice Recording works only on HTTPS sites. You can see the demo on HTTPS <a href="https://demos.subinsb.com/jquery/voice/">here</a>.</p>
      </p>
      <style>
      .button{
        display: inline-block;
        vertical-align: middle;
        margin: 0px 5px;
        padding: 5px 12px;
        cursor: pointer;
        outline: none;
        font-size: 13px;
        text-decoration: none !important;
        text-align: center;
        color:#fff;
        background-color: #4D90FE;
        background-image: linear-gradient(top,#4D90FE, #4787ED);
        background-image: -ms-linear-gradient(top,#4D90FE, #4787ED);
        background-image: -o-linear-gradient(top,#4D90FE, #4787ED);
        background-image: linear-gradient(top,#4D90FE, #4787ED);
        border: 1px solid #4787ED;
        box-shadow: 0 1px 3px #BFBFBF;
      }
      a.button{
        color: #fff;
      }
      .button:hover{
        box-shadow: inset 0px 1px 1px #8C8C8C;
      }
      .button.disabled{
        box-shadow:none;
        opacity:0.7;
      }
      </style>
    </div>
    <?php footer()?>
   </body>
</html>
