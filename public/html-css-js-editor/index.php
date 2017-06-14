<?php
require_once __DIR__ . '/../../../inc/load.php';
init(7);
?>
<!DOCTYPE html>
<html>
 <head>
   <?php head();?>
  <script src="../assets/jquery.min.js"></script>
  <script src="htmleditor.js"></script>
  <title>HTML, CSS, JS Code Editor Using jQuery</title>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   <center><h1 style="margin:10px 0px 0px 0px;">HTML, CSS, JS Code Editor Using jQuery</h1></center>
   <table>
    <tbody>
     <tr>
      <td>
       <h2>HTML</h2>
       <textarea class="codes" id="html" placeholder="Your HTML Code HERE"></textarea>      
      </td>
      <td>
       <h2>CSS</h2>
       <textarea class="codes" id="css" placeholder="Your CSS Code HERE"></textarea>
      </td>
     </tr>
     <tr>
      <td>
       <h2>JS</h2>
       <textarea class="codes" id="js" placeholder="Your JavaScript Code HERE"></textarea>
      </td>
      <td>
       <h2>Preview</h2>
       <iframe id="preview" src="javascript:;"></iframe>
      </td>
     </tr>
     <tr>
      <td>
      <div style="text-align:right;"><input id="upjs" type="button" value="Update And Run JS"/></div>
      </td>
     </tr>
    </tbody>
   </table>
  </div>
  <style>
  .codes,#preview{
   width: 320px;
   height: 135px;
   border:2px dashed white;
   background:white;
   color:black;
   overflow:auto;
  }
  </style>
  <?php
  
  footer();
  ?>
 </body>
</html>
