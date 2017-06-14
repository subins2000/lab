<?php
require_once __DIR__ . '/..//../inc/load.php';
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
  <?php include('../inc/track.php');?>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <?php
function age($birthday){
 list($day,$month,$year) = explode("/",$birthday);
 $year_diff  = date("Y") - $year;
 $month_diff = date("m") - $month;
 $day_diff   = date("d") - $day;
 if ($day_diff < 0 && $month_diff==0){$year_diff--;}
 if ($day_diff < 0 && $month_diff < 0){$year_diff--;}
 return $year_diff;
 /* //www.subinsb.com/2013/05/the-best-age-calculation-code-in-php.html */
}
$birth=$_POST['birth'];
if(isset($_POST) && $birth!=''){
 $birth=explode("-",$birth);
 $nbir=$birth[2]."/".$birth[1]."/".$birth[0];
 $age=age($nbir);
 echo "Your Age is $age.<br/><a href='index.php'>Click Here To Go To Demo Form</a>";
}
?>
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
