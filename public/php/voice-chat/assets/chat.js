window.scTop = function(){
	$(".chatWindow .chatbox .msgs")[0].scrollHeight = $(".chatWindow .chatbox .msgs")[0].scrollHeight || 0;
  $(".chatWindow .chatbox .msgs").animate({
		scrollTop : $(".chatWindow .chatbox .msgs")[0].scrollHeight
	});
};
window.connect = function(){
	window.ws = $.websocket("ws://localhost:8000/?service=voice-chat", {
		open: function() {
			$(".chatWindow .chatbox .status").text("Online");
		},
		close: function() {
			$(".chatWindow .chatbox .status").text("Offline");
		},
		events: {
			fetch: function(e) {
				
			},
			onliners: function(e){
				$(".chatWindow .users").html('');
				$.each(e.data, function(i, elem){
					$(".chatWindow .users").append("<div class='user'>"+ elem.name +"</div>");
				});
			},
			single: function(e){
				
			},
      register: function(e){
        if(e.data == "taken"){
          alert("Name already in use. Try another name");
        }else{
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
  connect();
  
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
		}else{
      ws.close();
      connect();
      $(".chatWindow .chat").fadeOut(1000, function(){
        $(".chatWindow .login").fadeIn(1000, function(){
          $(".chatWindow .login #loginForm input[type=text]").focus();
        });
      });
    }
	});
});
