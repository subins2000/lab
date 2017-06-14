<?php
if(isset($_GET['text'])){
 $txt = $_GET['text'];
 $txt = rawurlencode($txt);
 if($txt!="" || strlen($txt) < 100){
    header("Content-type: audio/mpeg");
    $url="//translate.google.com/translate_tts?ie=UTF-8&q=$txt&tl=en";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $audio = curl_exec($ch);
    echo $audio;
  }else{
    echo "No value or String exceeds 100 characters.";
  }
}
?>
