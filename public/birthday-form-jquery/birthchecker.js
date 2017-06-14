$(document).ready(function(){
 v=$('#birth');
 function above13(v){
  cur=new Date();
  cls=new Date(v.val());
  age = new Date(cur - cls).getFullYear() - 1970;
  console.log(age);
  if(age<13){
   v.css("background","red");
   $("#ermsg").show();
  }else{
   v.css("background","white");
   $("#ermsg").hide();
  }
 }
 v.DatePicker({
  format:'Y-m-d',
  date: v.val(),
  current: v.val(),
  starts: 1,
  position: 'r',
  onBeforeShow:function(){
   v.DatePickerSetDate(v.val(), true);
  },
  onChange:function(formated, dates){
   v.val(formated);
   v.DatePickerHide();
   above13(v);
  }
 });
 v.on("keyup",function(){
  above13(v);
 });
});
