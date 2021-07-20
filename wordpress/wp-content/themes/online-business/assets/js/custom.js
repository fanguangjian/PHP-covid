jQuery(document).ready(function($) {

    // Navigation Menu
    $('.menu-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().toggleClass('navigation-active');
        $(this).parent().find('.nav-menu').slideToggle();
    });

    $('.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    // Packery
    $('.grid').imagesLoaded( function() {
        $('.grid').packery({
            itemSelector: '.grid-item'
        });
    });

    // Swiper Slider
    var swiper = new Swiper('.swiper-container', {
        autoHeight: true,
        effect: 'fade',
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});