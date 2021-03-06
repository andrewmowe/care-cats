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

	    	if(current_width < 992){

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

	$('.load-more-news a').live('click', function(e){
		e.preventDefault();

		var link = $(this).attr('href');
		$('.load-more-news').html('<span class="loader">Loading More News...</span>');
		$.get(link, function(data) {
			var post = $(".news-list .post", data);
			$('.news-list').append(post);
		});
		$('.load-more-news').load(link+' .load-more-news a');
	});

	// Back To Top
  var $toTop = $('#back-to-top');

  $(window).live('scroll', function() {
      if ( $(this).scrollTop() > 50 ) {
          $toTop.fadeIn();
      } else {
          $toTop.fadeOut();
      }
  });

  $toTop.live('click', function() {
      $('body, html').animate({
          scrollTop: 0
      }, 500);
      return false;
  });

})(jQuery);