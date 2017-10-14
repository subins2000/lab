<?php
header('Content-Type: text/html');
function randtext($length){$chars="abcdefghijklmnopqrstuvwxyzsubinsblogABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";$size=strlen($chars);for($i=0;$i<$length;$i++){$str.=$chars[rand(0,$size-1)];}return $str;}
$dir="/urls/";/*Directory to store URL's. If main folder use "/" */
$url=$_POST['url'];
if(!preg_match("/^(http:\/\/|https:\/\/|ftp:\/\/){1}([0-9A-Za-z]+\.)/",$url)){
 die('{"stat":"0"}');
}
$name = randtext(5);
if (file_exists($name)){
 $name = randtext(6);
}else{
 mkdir('.'.$dir.$name);
 $subinsbshort = fopen('.'.$dir.$name.'/index.php', 'x') or die('{"stat":"0"}');
}
if(fwrite($subinsbshort,'<?php header("Location:'.$url.'");?>')){
 echo '{"stat":"1","url":"<?php echo $siteURL;?>/url-shortener'.$dir.$name.'","name":"'.$name.'"}';
}else{
 die('{"stat":"0"}');
}
fclose($subinsbshort);
?>
