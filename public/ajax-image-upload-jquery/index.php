<?php
require_once __DIR__ . '/../../inc/load.php';
init(3);
?>
<!DOCTYPE html>
<html><head>
 <?php head();?>
 <script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
 <script src="//malsup.github.io/jquery.form.js"></script>
 <title>Uploading An Image Using AJAX In jQuery With PHP Example</title>
</head><body>
<?php top();?>
<div class="container" id="content">
<div style="height:80%;width:97%;border:2px solid black;padding:10px 8px;">
 <form action="upload.php" method="POST" id="uploadform">
  <input type="file" name="file"/>
  <input type="submit" value="Upload"/>
  <div id="loader" style="display:none;">
   <center><img src="../assets/load.gif" /></center>
  </div>
  <div>
   Message :
   <div id="onsuccessmsg" style="border:5px solid #CCC;padding:15px;"></div>
  </div>
 </form>
</div>
<script>
$(document).ready(function(){
 function onsuccess(response,status){
  $("#loader").hide();
  $("#onsuccessmsg").html("Status :<b>"+status+'</b><br><br>Response Data :<div id="msg" style="border:5px solid #CCC;padding:15px;">'+response+'</div>');
 }
 $("#uploadform").on('submit',function(){
  $("#loader").show();
  var options={
   url     : $(this).attr("action"),
   success : onsuccess
  };
  $(this).ajaxSubmit(options);
 return false;
 });
});
</script>
<?php footer();?>
</body></html>
