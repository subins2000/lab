<?php
require_once __DIR__ . '/..//../../inc/load.php';
init(14);
?>
<!DOCTYPE html>
<html>
 <head>
   <?php head();?>
  <title><?php echo $GLOBALS['title'];?></title>
  <?php include('../inc/track.php');?>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <?php
function send_mail($email,$subject,$msg) {
$api_key="key-6qtg93oyx-ffc5aseuumo8-sn1x3jov2";/* Api Key got from https://mailgun.com/cp/my_account */
$domain ="subinsb.com";/* Domain Name you given to Mailgun */
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.$domain.'/messages');
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
'from' => 'Open <mail@subinsb.com>',
'to' => $email,
'subject' => $subject,
'html' => $msg
));
$result = curl_exec($ch);
curl_close($ch);
return $result;
}
   if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $msg=$_POST['message'];
    if($name!="" && $msg!=""){
     $ip_address=$_SERVER['REMOTE_ADDR'];
     send_mail("subins2000@gmail.com","New Message","The IP ($ip_address) has sent you a message : <blockquote>$msg</blockquote>");
     echo "<h2 style='color:green;'>Your Message Has Been Sent</h2>";
    }else{
     echo "<h2 style='color:red;'>Please Fill Up all the Fields</h2>";
    }
   }
   ?>
 <?php footer();?>
 </body>
</html>
