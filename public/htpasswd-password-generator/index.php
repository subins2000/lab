<?php
require_once __DIR__ . '/..//../inc/load.php';
init(2);
?>
<!DOCTYPE html>
<html><head>
 <?php head();?>
<title>Password for .HTPASSWD Generator</title><?php include('../inc/track.php');?>
</head><body>
<?php top();?>
<div class="container" id="content">
<h2><u>Password for .HTPASSWD Generator</u></h2><br/>
<div style="height:80%;width:97%;border:2px solid black;padding:10px 8px;">
<form method="POST" action="">
 Username : <input type="text" name="user"/><br/>
 Password : <input type="password" name="pass"/><br/>
 <input type="submit"/> 
</form>
<?php
if(isset($_POST['user']) && isset($_POST['pass']) && $_POST['user']!='' && $_POST['pass']!=''){
 $p=htmlspecialchars($_POST['pass']);
 $p=crypt($p,base64_encode($p));
 echo '<h3>Copy the text below to your .htpasswd file :</h3>';
 echo '<textarea cols="55" rows="5">'.htmlspecialchars($_POST['user']).':'.$p.'</textarea>';
}
?>
<?php footer();?>
</div>
</body></html>
