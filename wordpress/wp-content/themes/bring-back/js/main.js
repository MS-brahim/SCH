(function ($) {
    "use strict";

    /**
     * Theme Name: Bring Back
     * File Name: Bring Back Main jQuery File
     * Description: All Custom Functionality of the theme and external plugins active for here.
     * Author: bringback
     */

// Document
$(document).ready( function ($) {

    // Testimonial Slider
    if ( $.fn.slick ) {

        $( '.testimonial-slider' ).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<div class="slick-arrow-fix slick-left"><i class="icofont-long-arrow-left"></i></div>',
            nextArrow: '<div class="slick-arrow-fix slick-right"><i class="icofont-long-arrow-right"></i></div>',
            asNavFor: '.testimonial-nav-slider',
        });

    }


    // Testimonial Nav Slider
    if ( $.fn.slick ) {

        $( '.testimonial-nav-slider' ).slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            infinite: true,
            asNavFor: '.testimonial-slider',
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: false,
            accessibility: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        arrows: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        arrows: false
                    }
                }
            ]
        });

    }

    // Pricing slider
    if ( $.fn.slick ) {

        $( '.pricing-slider' ).slick({
            slidesToShow: 1,
            autoplay: false,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            dots: false,
            centerMode: true,
            prevArrow: '<div class="slick-arrow-fix slick-left"><i class="icofont-long-arrow-left"></i></div>',
            nextArrow: '<div class="slick-arrow-fix slick-right"><i class="icofont-long-arrow-right"></i></div>',
            centerPadding: '150px',
            focusOnSelect: false,
            accessibility: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        centerPadding: '50px',
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        centerPadding: '30px',
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        centerPadding: '30px',
                    }
                }
            ]
        });

    }

    // Mobile Menu
    $( '.main-menu .dropdown a i' ).on( 'click', function ( e ) {

        e.preventDefault();
        $( this ).parents( 'li' ).find( '.dropdown-menu' ).slideToggle();

    });

    // Footer Menu SlideToggle for mobile
    $( 'body' ).on( 'click', '.footer h4 > span' , function () {

        $( this ).parent( 'h4' ).next().slideToggle();

    });

    // First
    $('.nav-tabs a:first').tab('show')

});

// Window
$(window).on('load', function () {

    // Init Wow JS
    new WOW().init();

    // Preloader
    $( '#preloader' ).fadeOut('slow', function () {

        $( this ).hide();

    });

});

}(jQuery));
