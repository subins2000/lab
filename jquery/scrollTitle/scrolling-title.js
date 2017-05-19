(function ( $ ) {
	$.scrollTitle = function(options){
		options = $.extend({
			direction: "left",
			speed: 500,
			title: $("head title").html(),
			continue: true
		}, options);
		$("head title").html(options.title);
		speed = options.speed;
		origTitle = options["title"];
		setInterval(function(){
			var t = $("head title").html();
			if(options.continue === false && t == origTitle){
				$("head title").html("");
			}
			if(options.continue === true){
				origTitle = options["title"] + " " + options["title"] + " " + options["title"] + " " + options["title"];
				if(t == origTitle){
					origTitle = origTitle.substring(0, 30);
				}
			}
			if(options.direction == "left"){
				$("head title").html(origTitle.substring(1));
			}else if(options.direction == "right"){
				p = origTitle.length - $("head title").html().length - 1;
				$("head title").html(origTitle.substring(p));
			}
		}, speed);
		return true;
	};
}( jQuery ));