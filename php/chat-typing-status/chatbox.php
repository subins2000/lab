<?php
include("config.php");
if(isset($_SESSION['user'])){
?>
 <h5>Room For ALL</h5>
 <a style="right: 20px;top: 20px;position: absolute;cursor: pointer;" href="logout.php">Log Out</a>
 <div class='msgs'>
  <?php include("msgs.php");?>
 </div>
 <form id="msg_form">
  <input name="msg" size="30" type="text"/>
  <button class="btn orange">Send</button>
 </form>
<?php
}
?>
