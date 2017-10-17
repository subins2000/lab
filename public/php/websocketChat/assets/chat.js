window.scTop = function(){
	$(".chatWindow .chatbox .msgs").animate({
		scrollTop : $(".chatWindow .chatbox .msgs")[0].scrollHeight
	});
};
window.connect = function(){
	window.ws = $.websocket("ws://"+location.hostname+":8000/?service=text-chat", {
		open: function() {
			$(".chatWindow .chatbox .status").text("Online");
			ws.send("fetch");
		},
		close: function() {
			$(".chatWindow .chatbox .status").text("Offline");
		},
		events: {
			fetch: function(e) {
				$(".chatWindow .chat .msgs").html('');
				$.each(e.data, function(i, elem){
					$(".chatWindow .chat .msgs").append("<div class='msg' title='"+ elem.posted +"'><span class='name'>"+ elem.name +"</span> : <span class='msgc'>"+ elem.msg +"</span></div>");
				});
				scTop();
			},
			onliners: function(e){
				$(".chatWindow .users").html('');
				$.each(e.data, function(i, elem){
					$(".chatWindow .users").append("<div class='user'>"+ elem.name +"</div>");
				});
			},
			single: function(e){
				var elem = e.data;
				$(".chatWindow .chat .msgs").append("<div class='msg' title='"+ elem.posted +"'><span class='name'>"+ elem.name +"</span> : <span class='msgc'>"+ elem.msg +"</span></div>");
				scTop();
			},
      register: function(e){
        if(e.data == "taken"){
          alert("Name already in use. Try another name");
        }else{
          ws.send("fetch");
          $(".chatWindow .login").fadeOut(1000, function(){
				    $(".chatWindow .chat").fadeIn(1000, function(){
					    scTop();
					    $(".chatWindow .chat #msgForm input[type=text]").focus();
  				  });
			    });
        }
      }
		}
	});
};
$(document).ready(function(){
	$(".chatWindow .chat #msgForm").on("submit", function(e){
		e.preventDefault();
		var form = $(this);
		var val	 = $(this).find("input[type=text]").val();
		if(val != ""){
			ws.send("send", {"msg": val});
			form[0].reset();
		}
	});
	$(".chatWindow .login #loginForm").on("submit", function(e){
		e.preventDefault();
		var val	= $(this).find("input[type=text]").val();
		if(val != ""){
			ws.send("register", {"name": val});
		}
	});
	$(".chatWindow .chatbox .status").on("click", function(){
		if($(this).text() == "Offline"){
			connect();
		}
	});
	setInterval(function(){
		ws.send("onliners", {"c" : "c"});
	}, 4000);
	connect();
});
