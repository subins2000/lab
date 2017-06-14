$(document).ready(function(){
 v=$("#user");
 $("#check").on('click',function(){
  v.attr("disabled","true");
  v.css({background:"url(../assets/load.gif) no-repeat",backgroundSize: "2em",backgroundPosition: "center right"});
  $.post('check.php',{user:v.val().toLowerCase()},function(d){
   v.css("background","white");
   v.removeAttr("disabled");
   if(d=='available'){
    $("#msg").html("<span style='color:green;'>The username <b>"+v.val().toLowerCase()+"</b> is available</span>");
   }else{
    $("#msg").html("<span style='color:red;'>The username <b>"+v.val().toLowerCase()+"</b> is not available</span>");
   }
  });
 });
 v.bind('keyup',function(){
  $("#prev").text(v.val().toLowerCase());
 });
});
