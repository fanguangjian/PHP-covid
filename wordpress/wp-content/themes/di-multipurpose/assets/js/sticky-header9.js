( function( $ ) {
	$(document).ready(function() {
		
		if( $(window).width() > 992 ) {
			
			var h = $('.headermain').offset().top;
			
			var placeholder = document.createElement('div');
			placeholder.setAttribute("class", "menuplaceholder");
			placeholder.style.width = $('.headermain').width() + 'px';
			placeholder.style.height = $('.headermain').height() + 'px';
			
			$(window).scroll(function () {
				if( $(this).scrollTop() > h ) {
					$('.headermain').addClass('sticky_hedaer_top');
					$('.headermain').after(placeholder);
					$('.menuplaceholder').css('display','block');
				} else {
					$('.headermain').removeClass('sticky_hedaer_top');
					$('.menuplaceholder').css('display','none');
				}
				
			});
		}
	});
})( jQuery );
