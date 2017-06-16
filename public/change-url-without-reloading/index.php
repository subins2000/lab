<?php
require_once __DIR__ . '/../../inc/load.php';
init(6);
?>
<!DOCTYPE html>
<html><head>
 <?php head();?>
<script src="../assets/jquery.min.js"></script>
<title>Change URL Without Reloading Page</title>
</head><body>
<?php top();?>
<div class="container" id="content">
 Here are some url's. When you click it, the URL field of your <b>Browser</b><br/> will only change and you will not be redirected to that page.
 <br/>
 <h3>
  <a href="php" class="no">PHP</a><br/>
  <a href="blogger" class="no">Blogger</a><br/>
  <a href="js" class="no">JS</a><br/>
  <a href="html5" class="no">HTML5</a><br/>
 </h3>
</div>
<script>
$(document).ready(function(){
 if(window.history.replaceState==undefined){
  alert("Your Browser Don't support window.history.replaceState() function.");
 }
 $(".no").on('click',function(){
  window.history.replaceState({},'subinsb.com','/change-url-without-reloading/'+$(this).attr("href"));
  return false;
 });
});
</script>
<?php footer();?>
</body></html>
