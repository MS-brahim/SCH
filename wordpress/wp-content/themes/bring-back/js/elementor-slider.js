(function($) {
    "use strict";

    // Testimonial Slider
    var TestimonialSlider = function($scope, $) {
        var carousel = $scope.find('.testimonial-slider');


        console.log(carousel);

        carousel.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<div class="slick-arrow-fix slick-left"><i class="icofont-long-arrow-left"></i></div>',
            nextArrow: '<div class="slick-arrow-fix slick-right"><i class="icofont-long-arrow-right"></i></div>',
            asNavFor: '.testimonial-nav-slider',
        });
    };

    // Testimonial Nav Slider
    var TestimonialNavSlider = function($scope, $) {
        var carousel = $scope.find('.testimonial-nav-slider');
        carousel.slick({
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
    };

    // Pricing slider
    var PricingSlider = function($scope, $) {

        var pricingSlider = $scope.find( '.pricing-slider' );
        pricingSlider.slick({
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
    };


    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/bring-back-testimonial.default', TestimonialSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/bring-back-price-table.default', PricingSlider);
    });


})(jQuery);