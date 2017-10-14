<?php
Header("content-type: application/x-javascript");
echo file_get_contents("./jquery.min.js");
?>
$(document).ready(function(){
 $("body").css({fontFamily:"Ubuntu",fontSize:"13px",background:"url(<?php echo $siteURL;?>/assets/bg.gif)"});
 $("#content").css({margin: "10px auto",display: "table",marginBottom: "40px"});
 $("body").append("<style>a{text-decoration:none;color:black;}a:hover{color: blue;}</style>");
});
