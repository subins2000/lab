<?php
if(isset($_SESSION['user'])){
 $sqlm=$dbh->prepare("SELECT name FROM chatters2 WHERE name=?");
 $sqlm->execute(array($_SESSION['user']));
 if($sqlm->rowCount()!=0){
  $sql=$dbh->prepare("UPDATE chatters2 SET seen=NOW() WHERE name=?");
  $sql->execute(array($_SESSION['user']));
 }else{
  $sql=$dbh->prepare("INSERT INTO chatters2 (name,seen) VALUES (?,NOW())");
  $sql->execute(array($_SESSION['user']));
 }
}
$sql=$dbh->prepare("SELECT * FROM chatters2");
$sql->execute();
while($r=$sql->fetch()){
 $curtime=strtotime(date("Y-m-d H:i:s",strtotime('-25 seconds', time())));
 if(strtotime($r['seen']) < $curtime){
  $kql=$dbh->prepare("DELETE FROM chatters2 WHERE name=?");
  $kql->execute(array($r['name']));
 }
}
?>
