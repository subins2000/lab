<?php
session_start();
require 'google_api.php';
/*Configuration*/
$redirect_url="//demos.sim/google-php-lib-simple/server.php";/*URL to visit after user has authorised your app in Google Accounts*/
$scopes="https://www.googleapis.com/auth/userinfo.email,https://www.googleapis.com/auth/userinfo.profile,https://www.googleapis.com/auth/plus.login";/*Seperate with a comma. See the list of scopes @ //*/
$client_id="1031485682646.apps.googleusercontent.com";
$client_secret=getenv('demo1_google_client_secret');
/*End Configuration*/
if(isset($_GET['code']) && !isset($_GET['info'])){
?>
<script>window.opener.foo("<?php echo$_GET['code'];?>");window.close();</script>
<?php}else{
if(isset($_GET['code']) && isset($_GET['info']) && $_GET['code']!=''){gtoken($client_id,$client_secret,$_GET['code'],$redirect_url);
$info=gget("https://www.googleapis.com/oauth2/v2/userinfo");/*Get User Info. This Include E-mail,Name,gender and birthday. You can get more details than this*/
echo"<pre>";print_r($info);echo"</pre>";}else{gstart($client_id,$redirect_url,$scopes);}}
?>
