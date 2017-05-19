<?php
include("config.php");
if(isset($_POST['action']) && isset($_SESSION['user'])){
 $act=$_POST['action'];
 if($act=="startedTyping" || $act=="stoppedTyping"){
  $sql=$dbh->prepare("SELECT name FROM typeStatus WHERE `name`=?");
  $sql->execute(array($_SESSION['user']));
  if($sql->rowCount()==0){
   $sql2=$dbh->prepare("INSERT INTO typeStatus (`name`, `what`, `inserted`) VALUES (:name, :what, NOW())");
   $sql2->execute(array(
    ":name" => $_SESSION['user'],
    ":what" => $act
   ));
  }else{
   $query=$act=="startedTyping" ? "UPDATE typeStatus SET `what`=:what, `inserted`=NOW() WHERE name=:name":"UPDATE typeStatus SET `what`=:what WHERE name=:name";
   $sql2=$dbh->prepare($query);
   $sql2->execute(array(
    ":name" => $_SESSION['user'],
    ":what" => $act
   ));
  }
 }else{
  echo "You can't fool me.";
 }
}
?>
