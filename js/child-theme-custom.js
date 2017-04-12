(function($){ // jQuery code here 

    $('#mainnavtoggle').click(function() {
        $('#navbartoggled2').slideToggle();
    });

    if($('.filtercontrols').length) {

	    var current_width = $(window).width();

	    $( window ).resize(function() {
			
			current_width = $(window).width();
			$('.filtercontrols').slideDown();

		});

	    $('#togglefilters').click(function() {

	    	if(current_width < 768){

		        $('.filtercontrols').slideToggle();

		    }

	    });

	}

})(jQuery); 