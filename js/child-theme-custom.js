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

	$('.load-more a').live('click', function(e){
		e.preventDefault();

		var link = $(this).attr('href');
		$('.load-more').html('<span class="loader">Loading More Cats...</span>');
		$.get(link, function(data) {
			var post = $("#cats-grid .grid-cat ", data);
			$('#cats-grid .row').append(post);
		});
		$('.load-more').load(link+' .load-more a');
	});

})(jQuery); 