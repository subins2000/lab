<?php
require_once __DIR__ . "/../inc/load.php";
init(4);
?>
<!DOCTYPE html>
<html><head>
 <?php head();?>
 <script src="//code.jquery.com/jquery-1.9.0.min.js"></script>
 <title>URL Shorting Service With PHP & jQuery</title><?php include('../inc/track.php');?>
</head><body>
<?php top();?>
<div class="container" id="content">
<h2><u>Url Shortener Service</u></h2><br/>
<div style="height:80%;width:97%;border:2px solid black;padding:10px 8px;">
 <form id="subinsbshorter">
  <center>
   <input type="text" id="url" name="url" autocomplete="off" placeholder="Your URL here..."/><br/>
   <input type="submit" value="Short URL !"/><br/>
   Type in a <b>URL</b> and click on <b>Short URL !</b> to start shorting.
  </center>
  <div id="loader" style="display:none;">
   <center><img src="../assets/load.gif" /></center>
  </div>
  <div id="successDiv" style="display:none;">
   <h2 style="color:green;">Shorting Successful</h2>
   Here is Your Shorted URL : <a href=""></a>
  </div>
  <div id="errorDiv" style="display:none;">
   <h2 style="color:red;">Invalid URL</h2>
  </div>
 </form>
 <style>
  #url{font-family: 'Droid Sans', Arial;font-size: 15px;font-weight: normal;border-width: 0px;padding: 5px;color: #999999;width: 405px;outline-style: none; outline-width: 0px;}
 </style>
</div>
<script>
$(document).ready(function(){
 function isValidUrl(aUrl){var urlregex=new RegExp("^(http:\/\/|https:\/\/|ftp:\/\/){1}([0-9A-Za-z]+\.)");return urlregex.test(aUrl);}
 function ser(u){$("#errorDiv,#successDiv,#loader").hide();$("#errorDiv h2").text(u);$("#errorDiv").show();}
 function slo(){$("#errorDiv,#successDiv,#loader").hide();$("#loader").show();}
 function sss(v,s){$("#errorDiv,#successDiv,#loader").hide();$("#successDiv").show();$("#successDiv a").attr("href",v);$("#successDiv a").html("<blockquote>"+v+"</blockquote>");}
 $("#subinsbshorter").on('submit',function(){
  v=$(this).find("#url").val();
  slo();
  if(isValidUrl(v)){
   $.post('add.php',$(this).serialize(),function(d){
   d=JSON.parse(d);
   if(d.stat=='1'){
    sss(d.url,d.name);
   }else{
    ser("Failed To Short");
   }
   }).error(function(){ser("Failed To Short");});
  }else{
   ser("Invalid URL");
  }
  return false;
 });
});
</script>
<?php footer();?>
</body></html>
