<?php
require_once __DIR__ . "/../inc/load.php";
init(5);
?>
<!DOCTYPE html>
<html>
 <head>
   <?php head();?>
  <script src="//code.jquery.com/jquery-1.8.0.min.js"></script>
  <script src="texteditor.js"></script>
  <title>Simple Text Editor Created Using jQuery</title>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <h2>Simple Text Editor With jQuery</h2>
   <div class="ze ie"></div>
   <style>
   .font-bold.bold{font-weight:bold;}.italic{font-style:italic;}.selected .btn{background: orange !important;}#openpb{margin:15px;}
   </style>
   <button type="button" class="btn orange" id='stext'>Text</button>&nbsp;&nbsp;&nbsp;&nbsp;
   <button type="button" class="btn blue" id='shtml'>HTML</button>
   <div id="controls" style="margin: 10px;">
    <a id="bold" style="color:black;display: inline-block;" class="font-bold">
     <button type="button" class="btn indigo">B</button>
    </a>&nbsp;&nbsp;&nbsp;
    <a id="italic" style="color:black !important;display: inline-block;"class="italic">
     <button type="button" class="btn indigo">I</button>
    </a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a id="link" class="link" style="display: inline-block;">
     <button type="button" class="btn indigo">Link</button>
    </a>&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="fonts" class="g-button">
     <option value="Normal">Normal</option>
     <option value="Arial">Arial</option>
     <option value="Comic Sans MS">Comic Sans MS</option>
     <option value="Courier New">Courier New</option>
     <option value="Monotype Corsiva">Monotype</option>
     <option value="Tahoma New">Tahoma</option>
     <option value="Times">Times</option>
     <option value="Trebuchet New">Trebuchet</option>
     <option value="Ubuntu">Ubuntu</option>
    </select>
   </div>
   <iframe frameborder="0" id="textEditor" style="width:500px; height:80px;border:2px solid #CCC;border-radius:20px;overflow:auto;margin: 10px;"></iframe>
   <textarea name="text" id='text' style="border-radius:20px;overflow:auto;display:none;padding-left: 10px;margin: 10px;" rows="6" cols="53"></textarea>
  </div>
<?php footer();?>
 </body>
</html>
