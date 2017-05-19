<?php
function gstart($c,$r,$s){$sc=explode(',',$s);for($i=0;$i<count($sc);$i++){$scope.=$sc[$i];if($i!=count($sc)-1){$scope.="+";}}
header("Location: https://accounts.google.com/o/oauth2/auth?redirect_uri=$r&response_type=code&client_id=$c&approval_prompt=force&scope=$scope&access_type=offline");
}
function gtoken($c,$cs,$co,$r){
$pvars   = "code=$co&redirect_uri=$r&client_id=$c&client_secret=$cs&grant_type=authorization_code";
$timeout = 30;
$curl= curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
$xml = curl_exec($curl);curl_close ($curl);$xml=json_decode($xml,true);
$at=$xml['access_token'];$_SESSION['at']=$at;
}
function gget($s){
$info=file_get_contents($s.'?access_token='.$_SESSION['at']);$info=json_decode($info,true);if($info==''){return "Some Error occured.<a href='//".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."'>Try again</a>";}else{return $info;}
}
?>
