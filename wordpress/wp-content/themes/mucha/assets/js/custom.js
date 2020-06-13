$ = jQuery
jQuery(document).ready(function () {

// main menu
  $(".header-menu-icon").click(function () {
    $("body").toggleClass("menu-open");
    $(".header-menu-icon").addClass("menu-close");
  });
  $(".bg-ovelay").click(function () {
    $("body").removeClass("menu-open");
  });


  if( $('.mucha-wrapper-header-layout-6 .menu-main-menu-container .menu-item, .mucha-header-layout-4 .menu-main-menu-container .menu-item, .mucha-header-layout-5 .menu-main-menu-container .menu-item').hasClass('menu-item-has-children') ) {
    $('.mucha-wrapper-header-layout-6 .menu-main-menu-container .menu-item.menu-item-has-children > a,.mucha-header-layout-4 .menu-main-menu-container .menu-item.menu-item-has-children > a, .mucha-header-layout-5 .menu-main-menu-container .menu-item.menu-item-has-children > a').append('<span class="close">+</span>');
  }

  var $lis = $('.mucha-wrapper-header-layout-6 .menu-main-menu-container ul > li,.mucha-header-layout-4 .menu-main-menu-container ul > li, .mucha-header-layout-5 .menu-main-menu-container ul > li');
  $.each($lis, function(i, v) {
    var el = $lis[i];

    if( $(el).hasClass('current-menu-item') ) {

      $(el).children('a').eq(0).find('span').toggleClass('submenu-toggled').text('-');
      $(el).children('.sub-menu').eq(0).slideToggle();
    }
  });

  $(document).on('click', '.close', function(e){
    e.preventDefault();
    var $this = $(this);
    $this.parent().next('ul').slideToggle(function(){
      if( $(this).is(':visible') ) {
        $this.text('-').addClass('submenu-toggled');
      } else {
        $this.text('+').removeClass('submenu-toggled');
      }
    });
  });


  /* search toggle */
  $('body').click(function (evt) {
    if (!($(evt.target).closest('.search-section').length || $(evt.target).hasClass('search-toggle'))) {
      if ($(".search-toggle").hasClass("search-active")) {
        $(".search-toggle").removeClass("search-active");
        $(".search-box").slideUp("slow");
      } 
    }
  });
	$(document).on('keyup', function(e){
		if ( e.keyCode === 27 && $('.search-toggle').hasClass('search-active') ) {
			$(".search-toggle").removeClass('search-active');
		}
		removeClass = true;
	}); 
  $(".search-toggle").click(function () {
    $(".search-box").toggle("slow");
    if (!$(".search-toggle").hasClass("search-active")) {
      $(".search-toggle").addClass("search-active");
		setTimeout(function(){
            $(".search-section").find('.search-field').focus();
            }, 700 );

    } else {
      $(".search-toggle").removeClass("search-active");
    }

  });


  jQuery('.menu-top-menu-container').meanmenu({
    meanMenuContainer: '.main-navigation',
    meanScreenWidth: "991",
    meanRevealPosition: "right",
  });


  /* back-to-top button*/

  $('.back-to-top').hide();
  $('.back-to-top').on("click", function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 'slow');
  });


  $(window).scroll(function () {
    var scrollheight = 400;
    if ($(window).scrollTop() > scrollheight) {
      $('.back-to-top').fadeIn();

    } else {
      $('.back-to-top').fadeOut();
    }
  });


  // custom tab
  jQuery('.tabs .tab-links a').on('click', function (e) {
    var currentAttrValue = jQuery(this).attr('href');

    // Show/Hide Tabs
    jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

    // Change/remove current tab to active
    jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

    e.preventDefault();
  });

  // sticky sidebar
  jQuery('#primary , #secondary').theiaStickySidebar({
    // Settings
    additionalMarginTop: 30

  });

		//keyboard navigation for mean menu
		var myEvents = {
		click: function(e) {
		  if ( jQuery(this).hasClass('menu-item-has-children') ) {
			jQuery(this).find('.mean-expand').addClass('mean-clicked');
		  }
		  jQuery(this).siblings('li').find('.mean-expand').removeClass('mean-clicked');
		  jQuery(this).children('.sub-menu').show().end().siblings('li').find('ul').hide();

		},

		keydown: function(e) {
		  e.stopPropagation();

		  if (e.keyCode == 9) {


			if (!e.shiftKey &&
			  ( jQuery('.mean-bar li').index( jQuery(this) ) == ( jQuery('.mean-bar li').length-1 ) ) ){
				jQuery('.meanclose').trigger('click');
			}  else if( jQuery('.mean-bar li').index( jQuery(this) ) == 0 ) {
			  $('.meanclose').removeClass('onfocus');
			}
			else if (e.shiftKey && jQuery('.mean-bar li').index(jQuery(this)) === 0)
			 jQuery('.mean-bar ul:first > li:last').focus().blur();
		  }
		},

		keyup: function(e) {
		  e.stopPropagation();
		  if (e.keyCode == 9) {
			if (myEvents.cancelKeyup) myEvents.cancelKeyup = false;
			else myEvents.click.apply(this, arguments);
		  }
		}
	  }

	  jQuery(document)
		.on('click', 'li', myEvents.click)
		.on('keydown', 'li', myEvents.keydown)
		.on('keyup', 'li', myEvents.keyup);

	  jQuery('.mean-bar li').each(function(i) { this.tabIndex = i; });

});