$(function() {
	$(".client-carousel").owlCarousel({
		items: 6,
		dots: true,
		loop: true,
		mouseDrag: true,
		autoWidth:true,
		dotsContainer: '.client-dots-container'
	});

})

$(window).load(function() {
	$('.loader').fadeOut('slow');
})

$('.navbar a').click(function(e) {
	e.preventDefault();
	var where = ".section-" + $(this).attr('data-to');
	var offsetTop = $('.navbar').height()*.6;
	$('html, body').animate({scrollTop: $(where).position().top-offsetTop}, 800);
})

$(window).scroll(function() {
	var offsetTop = $('.navbar').height()+10;
	var scrollPos = $(document).scrollTop();
	$('.navbar-nav li a').removeClass("active");
	if (scrollPos < $('.section-about').position().top-offsetTop) {
		$('.navbar-nav li:first-child a').addClass("active");
	} else if (scrollPos < $('.section-service').position().top-offsetTop) {
		$('.navbar-nav li:nth-child(2) a').addClass("active");
	} else if (scrollPos < $('.section-port').position().top-offsetTop) {
		$('.navbar-nav li:nth-child(3) a').addClass("active");
	} else if (scrollPos < $('.section-client').position().top-offsetTop) {
		$('.navbar-nav li:nth-child(4) a').addClass("active");
	} else if (scrollPos < $(document).height() - $(window).height() - offsetTop) {
		$('.navbar-nav li:nth-child(5) a').addClass("active");
	} else {
		$('.navbar-nav li:nth-child(6) a').addClass("active");
	}
})