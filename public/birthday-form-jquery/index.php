<?php
require_once __DIR__ . '/../../inc/load.php';
init(10);
?>
<!DOCTYPE html>
<html>
 <head>
  <link href="datepicker.css" rel="stylesheet"/>
   <?php head();?>
  <script src="//code.jquery.com/jquery-latest.min.js"></script>
  <script src="datepicker.js"></script>
  <script src="birthchecker.js"></script>
  <title>jQuery Birthday Form Field & Checker</title>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <form method="POST" action="submit.php">
    <table><tbody>
     <tr>
      <td>Birthday :</td>
      <td><input id="birth" name="birth" value="2000-01-20"/><div id="ermsg">Users under 13 are not allowed.</div></td>
      <td>YY-MM-DD</td>
     </tr>
     <tr>
      <td></td>
      <td><input type="submit"/></td>
     </tr>
    </tbody></table>
   </form>
  </div>
  <style>
  input{
   border:none;
   padding:8px;
  }
  #ermsg{
   display:none;
   color:red;
  }
  </style>
<?php footer();?>
 </body>
</html>
