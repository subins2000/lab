<?php
require_once __DIR__ . "/../inc/load.php";
init(11);
?>
<!DOCTYPE html>
<html><head>
 <?php head();?>
<script src="//code.jquery.com/jquery-latest.min.js"></script>
<title>Change URL Without Reloading Page</title><?php include('../inc/track.php');?>
</head><body>
<?php top();?>
<div class="container" id="content">
 <a id="check"><center style="border:2px solid black;padding:10px;background:#EEE;font-size:40px;cursor:pointer;">CHECK NOW (jQuery)</center></a>
 <br/>
 <a onclick="onJSButtonclick();return false;"><center style="border:2px solid black;padding:10px;background:#EEE;font-size:40px;cursor:pointer;">CHECK NOW (JS)</center></a>
</div>
<script>
function checkJSNetConnection(){
 var xhr = new XMLHttpRequest();
 var file = "//demos.sim/assets/dot.png";
 var r = Math.round(Math.random() * 10000); 
 xhr.open('HEAD', file + "?subins=" + r, false); 
 try {
  xhr.send(); 
  if (xhr.status >= 200 && xhr.status < 304) {
   return true;
  } else {
   return false;
  }
 } catch (e) {
  return false;
 }
}
function onJSButtonclick(){
 if(checkJSNetConnection()==true){
  alert("Internet Connection Exists");
 }else{
  alert("Internet Connection Doesn't Exist");
 }
}
function checkNetConnection(){
 jQuery.ajaxSetup({async:false});
 re="";
 r=Math.round(Math.random() * 10000);
 $.get("//demos.sim/assets/dot.png",{subins:r},function(d){
  re=true;
 }).error(function(){
  re=false;
 });
 return re;
}
$(document).ready(function(){
 $("#check").on('click',function(){
  if(checkNetConnection()==true){
   alert("Internet Connection Exists");
  }else{
   alert("Internet Connection Doesn't Exist");
  }
 });
});
</script>
<?php footer();?>
</body></html>
