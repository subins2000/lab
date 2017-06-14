<?php
require_once __DIR__ . '/../../inc/load.php';
init(0);
?>
<!DOCTYPE html>
<html><head>
 <?php head();?>
<title>Google PHP Library Simplified Demo</title><?php include('../inc/track.php');?>
<script>
function opesn(){
new_window = window.open('server.php','name','height=400,width=500');
}
function foo(k){
window.location="server.php?info=true&code="+k;
}
</script>
</head><body>
<?php top();?>
<div class="container" id="content">
<h2><u>Google PHP Library Simplified Demo</u></h2><br/>
<div style="height:60%;width:97%;border:2px solid black;padding:10px 8px;"><img onclick="opesn();" src="//accounts.subins.com/files/images/pluslogin.png">
<?php footer();?>
</div>
</body></html>
