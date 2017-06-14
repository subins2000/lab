<?php
require_once __DIR__ . '/..//../inc/load.php';
init(8);
?>
<!DOCTYPE html>
<html>
 <head>
   <?php head();?>
  <script src="//code.jquery.com/jquery-latest.min.js"></script>
  <script src="checker.js"></script>
  <title>jQuery Username Availablity Checker</title>
  <?php include('../inc/track.php');?>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <input type="text" size="35" id="user" value="subinsiby" placeholder="Type Your Desired Username"/>
   <input type="button" id="check" style="cursor:pointer;" value="Check Availablity"/>
   <br/>
   <div style="margin:5px 15px;" id="msg">//mysite.com/<b id="prev">subinsiby</b></div>
   <h2>UnAvailabe Usernames :</h2>
   <ul>
    <li>subin</li>
    <li>siby</li>
    <li>simrin</li>
    <li>subin</li>
    <li>arjun</li>
    <li>firoz</li>
    <li>shinil</li>
   </ul>
   <b>Note that this page is only a demo. No SQL queries <br/>are executed. So Please Don't try SQL Injection.</b>
  </div>
  <style>
  input{
   border:none;
   padding:8px;
  }
  </style>
<?php footer();?>
 </body>
</html>
