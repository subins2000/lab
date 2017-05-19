<?php
require_once __DIR__ . "/../inc/load.php";
init(9);
?>
<!DOCTYPE html>
<html>
 <head>
   <?php head();?>
  <script src="//code.jquery.com/jquery-latest.min.js"></script>
  <script src="passchecker.js"></script>
  <title>Simple jQuery Password Strength Checker</title>
  <?php include('../inc/track.php');?>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <table><tbody>
    <tr>
     <td>
      Username :
     </td>
     <td>
      <input type="text" size="35" id="user" placeholder="Username"/>
     </td>
    </tr>
    <tr>
     <td>
      Password :
     </td>
     <td>
      <input type="password" size="35" id="pass" placeholder="Type A Password"/>
     </td>
    </tr>
    <tr>
     <td></td>
     <td>
      <div id="ppbar" title="Strength"><div id="pbar"></div></div>
      <div id="ppbartxt"></div>
     </td>
    <tr>
     <td>
      Retype Password :
     </td>
     <td>
      <input type="password" size="35" id="pass2" placeholder="ReType Password"/>
     </td>
    </tr>
   </tbody></table>
  </div>
  <style>
  input{
   border:none;
   padding:8px;
  }
  #ppbar{
   background:#CCC;
   width:300px;
   height:15px;
   margin:5px;
  }
  #pbar{
   margin:0px;
   width:0px;
   background:lightgreen;
   height: 100%;
  }
  #ppbartxt{
   text-align:right;
   margin:2px;
  }
  </style>
<?php footer();?>
 </body>
</html>
