(function($) {
    "use strict";
    /* ---------------------------------------------
     MENU HAMBURGER AND FULL SCREEN  OVERLAY.
    --------------------------------------------- */
    $('.hamburger').on('click', function() {
        $(this).toggleClass('is-active');
        $(this).next().toggleClass('nav-show')
    });
    /*--
    	Mobile Menu
    ------------------------*/
    $('.mobile-menu nav').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu",
        onePage: true,
    });

    /*-- Counter Up Active Js  --*/
    $('.counterup').counterUp({
        delay: 10,
        time: 1000
    });

    $('[data-toggle="tooltip"]').tooltip();
    /* custom settings */
    $('.venobox_custom').venobox({
        framewidth: '290px', // default: ''
        frameheight: '290px', // default: ''
        border: '2px', // default: '0'
        bgcolor: '#fff', // default: '#fff'
    });
    /*--------------------------
      Gallery Isotope
    ---------------------------- */

    $('.prot_image_load').imagesLoaded(function() {

        if ($.fn.isotope) {
            var $portfolio = $('.gallery_items');
            $portfolio.isotope({
                itemSelector: '.grid-item',
                filter: '*',
                resizesContainer: true,
                layoutMode: 'masonry',
            });
            $('.filter-menu li').on('click', function() {
                $('.filter-menu li').removeClass('current_menu_item');
                $(this).addClass('current_menu_item');
                var selector = $(this).attr('data-filter');
                $portfolio.isotope({
                    filter: selector,
                });
            });
        };

    });

    /*--------------------------
      wow js active
    ---------------------------- */
    new WOW().init();



    /*--------------------
	slider curosel active js
	--------------------------------*/
    $(".slider-carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 1,
        transitionStyle: "backSlide",
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
    });
	
	
	/*--------------------
	testimonial curosel active js
	--------------------------------*/
    $(".testi_cursole").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: true,
        navigation: false,
        items: 1,
        transitionStyle: "backSlide",
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
    });
	
    /*--------------------
    	Blog 
    -----------------------------------*/
    $(".blog_carousel").owlCarousel({
        autoPlay: false,
        slideSpeed: 1000,
        pagination: true,
        navigation: false,
        items: 3,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 2],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
    });
	

    /*-- Slider  Active Js--*/
    $(".slider_curosel").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        pagination: false,
        navigation: true,
        items: 1,
        navigationText: ['<i class="fa fa-angle-left "></i>', '<i class="fa fa-angle-right "></i>'],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],

    });
    var headers = $('.header_area');
    var headers2 = $('.header_area2');
    $(window).on('scroll', function() {

        if ($(window).scrollTop() > 200) {
            headers2.addClass('hbg2');
        } else {
            headers2.removeClass('hbg2');
        }

    });

    /*-- One Page Nav Active Js --*/
    var top_offset = $('.menu').height() - -40;
    $('.menu ul').onePageNav({
        currentClass: 'active',
        scrollOffset: top_offset,
    });


    /*---------------------
    ScrollUp Active Js
    --------------------- */
    $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        scrollDistance: 300, // Distance from top/bottom before showing element (px)
        scrollFrom: 'top', // 'top' or 'bottom'
        scrollSpeed: 2000, // Speed back to top (ms)
        easingType: 'linear',
        animation: 'fade', // Fade, slide, none
        animationSpeed: 300, // Animation speed (ms)
        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
        zIndex: 2147483647 // Z-Index for the overlay
    });


})(jQuery);