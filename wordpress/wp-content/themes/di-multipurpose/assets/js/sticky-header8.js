( function( $ ) {
	$(document).ready(function() {
		
		if( $(window).width() > 992 ) {
			
			var h = $('.navbarouter').offset().top;
			
			var placeholder = document.createElement('div');
			placeholder.setAttribute("class", "menuplaceholder");
			placeholder.style.width = $('.navbarouter').width() + 'px';
			placeholder.style.height = $('.navbarouter').height() + 'px';
			
			$(window).scroll(function () {
				if( $(this).scrollTop() > h ) {
					$('.navbarouter').addClass('sticky_hedaer_top');
					$('.navbarouter').after(placeholder);
					$('.menuplaceholder').css('display','block');
				} else {
					$('.navbarouter').removeClass('sticky_hedaer_top');
					$('.menuplaceholder').css('display','none');
				}
				
			});
		}
	});
})( jQuery );
