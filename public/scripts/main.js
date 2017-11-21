window.addEventListener("load", function() {
    $("#msg").hide();
	$(".navigation").show();
	$(".main-cont").show();
	$("footer").show();
	$(".footer").show();
	$("html").niceScroll();
	$( '.dropdown' ).on( 'show.bs.dropdown', function() {
	    $( this ).find( '.dropdown-menu' ).first().stop( true, true ).slideDown( 300 );
	} );
	$('.dropdown').on( 'hide.bs.dropdown', function(){
	    $( this ).find( '.dropdown-menu' ).first().stop( true, true ).slideUp( 300 );
	} );
	var pushWidth = $(".events").width()+24;
	$(".white-box").css("left", ((-pushWidth)-6));
	$(".white-box").css("width", (pushWidth));
	if($(window).width() > 767)
	{
		$(".events").height($(".main").height()-75); 
	}
	$(".question-mark").height($(".question").height());

	var colors = ["2ecc71",
				  "95a5a6",
				  "e67e22",
				  "e74c3c",
				  "1abc9c",
				  "9b59b6"];
	var j = Math.floor(Math.random() * 6);
	$('.color').each(function(i, obj) {
	    if(j<=5)
	    {
	    	$(obj).css("background-color", "#"+colors[j]);
	    	j++;
	    }else 
	    {
	     	j = 0;
	     	$(obj).css("background-color", "#"+colors[j]); 
	     	j++;
	 	}
	});

	$(window).resize(function() {
		if($(window).width() > 767)
		{
			pushWidth = $(".events").width()+24;
			$(".white-box").css("left", ((-pushWidth)-6));
			$(".white-box").css("width", (pushWidth));
			$(".events").height($(".main").height()-75); 
		}else{
			$(".events").css("height", "auto");
		}
		$(".question-mark").height($(".question").height());
	});
}, false); 
