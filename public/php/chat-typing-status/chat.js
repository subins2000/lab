function scTop(){
 $(".msgs").animate({scrollTop:$(".msgs")[0].scrollHeight});
}
function load_new_stuff(){
 localStorage['lpid']=$(".msgs .msg:last").attr("title");
 $(".msgs").load("msgs.php",function(){
  if(localStorage['lpid']!=$(".msgs .msg:last").attr("title")){
   scTop();
  }
 });
 $(".users").load("users.php");
}
lastKeyUp=0;
$(document).ready(function(){
 scTop();
 $("#msg_form").on("submit",function(){
  t=$(this);
  val=$(this).find("input[type=text]").val();
  if(val!=""){
   t.after("<span id='send_status'>Sending.....</span>");
   $.post("send.php",{msg:val},function(){
    load_new_stuff();
    $("#send_status").remove();
    t[0].reset();
   });
  }
  return false;
 });
 $("#msg_form input[type=text]").keyup(function(){
  lastKeyUp=0;
  $.post("typeStatus.php", {action:"startedTyping"}, function(){
   lastKeyUp=0;
  });
 });
});
setInterval(function(){
 load_new_stuff();
},5000);
setInterval(function(){
 lastKeyUp = ++lastKeyUp % 360 + 1;
 if(lastKeyUp>5 && $("#msg_form input[type=text]").val()!=""){
  $.post("typeStatus.php", {action:"stoppedTyping"}, function(data){
   lastKeyUp=0;
  });
 }
},1000);
