( function( $ ) {
	$(document).ready(function() {
		$('.owl-carousel').owlCarousel({
			loop:true,
			dots:true,
			autoplay:true,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:3
				}
			}
		});
	});
} )( jQuery );
