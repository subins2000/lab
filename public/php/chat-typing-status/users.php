<?php
include("config.php");
echo "<h4>Users</h4>";
$sql=$dbh->prepare("SELECT name FROM chatters2");
$sql->execute();
while($r=$sql->fetch()){
 $name=$r['name'];
 echo "<div class='user'>$name";
 if(isset($_SESSION['user']) && $name!=$_SESSION['user']){
  $sql2=$dbh->prepare("SELECT what FROM typeStatus WHERE name=?");
  $sql2->execute(array($name));
  if($sql2->rowCount()!=0){
   $action=str_replace("startedTyping", "Typing...", str_replace("stoppedTyping", "Stopped Typing", $sql2->fetchColumn()));
   echo "<div class='status'>$action</div>";
  }
 }
 echo "</div>";
}
// Remove Old Type Statuses
$sql=$dbh->query("DELETE FROM typeStatus WHERE `inserted` < DATE_ADD(NOW(), INTERVAL -30 second) AND `what`='stoppedTyping'");
?>
