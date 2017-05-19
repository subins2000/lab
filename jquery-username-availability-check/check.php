<?php
$users=array("subin","siby","simrin","arjun","firoz","shinil");
$usr=htmlspecialchars(strtolower($_POST['user']));
if(isset($_POST) && $usr!=''){
 if(array_search($usr,$users)===false){
  echo "available";
 }else{
  echo "not-available";
 }
}
?>
