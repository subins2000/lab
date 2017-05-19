var settings = {
	checkURL : "login.php",
	form 	 : ".loginForm",
	username : ".loginForm input[name=username]",
	password : ".loginForm input[name=password]",
	overlay	 : ".loginForm .overlay",
	success	 : ".loginForm .overlay .success",
	error	 : ".loginForm .overlay .error",
	process	 : ".loginForm .overlay .processing",
};

function overlayDisplay(elem, type){
	if( type == "hide" ){
		$(elem).fadeOut(1000, function(){
			$(settings.overlay).hide();
		});
	}else{
		$(settings.overlay).show();
		$(elem).fadeIn(1000);
		
		/* Auto fade the error overlay and clear the password field after 3 seconds */
		if( elem == settings.error ){
			$(settings.password).val("");
			setTimeout(function(){
				overlayDisplay(settings.error, "hide");
			}, 3000);
		}
	}
}

$(document).ready(function(){
	$(settings.form).find(".submit").on("click", function(){
		var data = {
			"username" : $(settings.username).val(),
			"password" : $(settings.password).val(),
		};
		overlayDisplay(settings.overlay);
		
		$(settings.process).fadeIn(1000, function(){
			$.post(settings.checkURL, data, function(response){
				$(settings.overlay).children().hide(); // Hide all Overlay windows
			
				if(response == "incorrect" || response == ""){
					overlayDisplay(settings.error);
				}else if(response == "correct"){
					overlayDisplay(settings.success);
					/* Do What Else you want here */
				}
			}).fail(function(){
				overlayDisplay(settings.error);
			});
		});
		
		$(settings.form + "#tryAgain").on("click", function(){
			$(settings.error).fadeOut(500, function(){
				$(settings.overlay).hide();
			});
		});
	});
});