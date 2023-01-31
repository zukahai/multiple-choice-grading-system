/**
*	Kaffen - Cafe & Restaurant Template (HTML)
*	Version: 1.0
*	Author: bslthemes
*	Author URL: http://themeforest.net/user/bslthemes
*	Copyright © Kaffen by bslthemes. All Rights Reserved.
**/

( function( $ ) {

	'use strict';

	$(window).on("load", function() {

		/**
			Preloader
		**/
		setTimeout(function(){
			var preload = $('.preloader');
			preload.addClass('loaded');
			preload.find('.centrize').fadeOut();
		}, 1000);

		/**
			init Scrolla
		**/
		$('.scroll-animate').scrolla({
			once: true,
			mobile: true
		});

	});

	/*
		Splitting
	*/
	Splitting();

	/*
		Skrollr
	*/
	if ($(window).width() > 1024 ) {
		var s = skrollr.init();
	}

	/*
		Header Sticky
	*/
	if($('.kf-header').length) {
		$(window).on('scroll', function(){
			if ( $(window).scrollTop() > 48 ) {
				$('.kf-header').addClass('fixed');
			} else {
				$('.kf-header').removeClass('fixed');
			}
		});
	}
	if(!$('.kf-started-inner .kf-parallax-bg').length && !$('.kf-started-slider').length) {
		$('.kf-navbar').addClass('inner-navbar');
	}

	/*
		Header Menu Button
	*/
	$('.kf-header').on('click', '.kf-menu-btn', function(){
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('.kf-header').removeClass('show');
			$('.kf-header').addClass('no-touch');
			setTimeout(function(){
				$('.kf-header').removeClass('animated');
			}, 500);
			setTimeout(function(){
				$('.kf-header').removeClass('opened');
				$('.kf-header').removeClass('no-touch');
			}, 1000);
		}
		else {
			$(this).addClass('active');
			$('.kf-header').addClass('animated');
			$('.kf-header').addClass('no-touch');
			setTimeout(function(){
				$('.kf-header').addClass('opened');
			}, 500);
			setTimeout(function(){
				$('.kf-header').addClass('show');
				$('.kf-header').removeClass('no-touch');
			}, 1000);
		}
		return false;
	});

	/*
		Header Menu Dropdown
	*/
	$('.kf-navbar-mobile .kf-main-menu').on('click', '.has-children > i', function(){
		if($(this).closest('li').hasClass('opened')) {
			$(this).closest('li').removeClass('opened');
			$(this).closest('li').find('> ul').slideUp();
		} else {
			$(this).closest('li').addClass('opened');
			$(this).closest('li').find('> ul').slideDown();
		}
		return false;
	});

	/*
		Parallax
	*/
	if ($(window).width() > 1024 ) {
		$(".js-parallax").paroller({
			factor: -0.3,
			factorXs: 0.1,
			factorSm: 0.2,
			factorMd: 0.2,
			factorLg: 0.3,
			type: 'foreground',
			direction: 'vertical',
			transition: 'transform 0.1s ease'
		});
	}

	/*
		Home Slider
	*/
	var interleaveOffset = 0.5;
	var mainSliderSelector = new Swiper('.kf-started-slider .swiper-container', {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		speed: 1000,
		parallax: true,
		autoplay:{
			delay: 9000
		},
		watchSlidesProgress: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		on: {
			progress: function() {
				var swiper = this;
				for (var i = 0; i < swiper.slides.length; i++) {
					var slideProgress = swiper.slides[i].progress,
						innerOffset = swiper.width * interleaveOffset,
						innerTranslate = slideProgress * innerOffset;
					swiper.slides[i].querySelector('.slide').style.transform = 'translateX(' + innerTranslate + 'px)';
				}
			},
			touchStart: function() {
				var swiper = this;
				for (var i = 0; i < swiper.slides.length; i++) {
					swiper.slides[i].style.transition = '';
				}
			},
			setTransition: function(swiper, speed) {
				for (var i = 0; i < swiper.slides.length; i++) {
					swiper.slides[i].style.transition = speed + 'ms';
					swiper.slides[i].querySelector('.slide').style.transition = speed + 'ms';

				}
			}
		}
	});

	/*
		Grid Carousel
	*/
  var swiperGrid = new Swiper('.kf-grid-carousel .swiper-container', {
    slidesPerView: 3,
	  spaceBetween: 30,
		loop: true,
		speed: 1000,
		watchSlidesProgress: true,
	  pagination: false,
		navigation: false,
		breakpoints: {
			0: {
				slidesPerView: 1
			},
			767: {
				slidesPerView: 2
			},
			1024: {
				slidesPerView: 2
			},
			1200: {
				slidesPerView: 3
			}
		}
	});

	/*
		Insta Carousel
	*/
  var swiperInsta = new Swiper('.kf-insta-carousel .swiper-container', {
    slidesPerView: 3,
	  spaceBetween: 0,
		loop: true,
		speed: 1000,
		watchSlidesProgress: true,
	  pagination: false,
		navigation: false,
		breakpoints: {
			0: {
				slidesPerView: 1
			},
			767: {
				slidesPerView: 2
			},
			1024: {
				slidesPerView: 3
			},
			1200: {
				slidesPerView: 3
			}
		}
	});

	/*
		Testimonials Slider
	*/
  var swiperTestimonials = new Swiper('.kf-testimonials-slider .swiper-container', {
    slidesPerView: 1,
	  spaceBetween: 60,
		loop: false,
		speed: 1000,
	  pagination: false,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}
	});

	/*
		Testimonials Carousel
	*/
  var swiperTestimonials_C = new Swiper('.kf-testimonials-carousel .swiper-container', {
    slidesPerView: 4,
	  spaceBetween: 30,
		loop: false,
		speed: 1000,
		watchSlidesProgress: true,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: 'true',
		},
		navigation: false,
		breakpoints: {
			0: {
				slidesPerView: 1
			},
			767: {
				slidesPerView: 2
			},
			1024: {
				slidesPerView: 3
			},
			1200: {
				slidesPerView: 4
			}
		}
	});

	/*
		History Carousel
	*/
  var swiperHistory = new Swiper('.kf-history-carousel .swiper-container', {
    slidesPerView: 1,
	  spaceBetween: 70,
		loop: false,
		speed: 1000,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: 'true',
		},
		scrollbar: {
			el: '.swiper-scrollbar',
			draggable: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}
	});
	$('.kf-history-carousel .swiper-pagination-bullet').each(function( index ) {
		if ($('.kf-history-carousel .swiper-slide:nth-child(1)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(1)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(2)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(2)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(3)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(3)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(4)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(4)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(5)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(5)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(6)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(6)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(7)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(7)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(8)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(8)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(9)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(9)').find('.date-value').text());
		}
		if ($('.kf-history-carousel .swiper-slide:nth-child(10)').index() === $(this).index()) {
			$(this).text(''+$('.kf-history-carousel .swiper-slide:nth-child(10)').find('.date-value').text());
		}
	});

	/*
		Gallery Masonry
	*/
	var $gal_container = $('.kf-gallery-items');
	$gal_container.imagesLoaded(function() {
		$gal_container.isotope({
			itemSelector: '.kf-gallery-col',
			percentPosition: true,
		});
	});
	$('.kf-filter-gal').on( 'click', 'a', function() {
		var filterValue = $(this).attr('data-href');
		$gal_container.isotope({ filter: filterValue });

		$('.kf-filter-gal a').removeClass('active');
		$(this).addClass('active');
		$(filterValue).find('.scroll-animate').removeClass('animate__active');
		$(filterValue).find('.scroll-animate').addClass('animate__active');

		return false;
	});

	/*
		Menu Masonry
	*/
	var $m_container = $('.kf-menu-tabs .kf-menu-items .row');
	$m_container.imagesLoaded(function() {
		$m_container.isotope({
			itemSelector: '.kf-menu-item-col',
			percentPosition: true,
		});
	});
	$('.kf-filter-menu').on( 'click', 'a', function() {
		var filterValue = $(this).attr('data-href');
		$m_container.isotope({ filter: filterValue });

		$('.kf-filter-menu a').removeClass('active');
		$(this).addClass('active');
		$(filterValue).find('.scroll-animate').removeClass('animate__active');
		$(filterValue).find('.scroll-animate').addClass('animate__active');

		return false;
	});

	/*
		Magnific Popups
	*/
	$('.has-popup-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-fade',
		image: {
			verticalFit: true
		}
	});
	$('.has-popup-video').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		iframe: {
            patterns: {
                youtube_short: {
                  index: 'youtu.be/',
                  id: 'youtu.be/',
                  src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                }
            }
        },
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
		mainClass: 'mfp-fade',
		callbacks: {
			markupParse: function(template, values, item) {
				template.find('iframe').attr('allow', 'autoplay');
			}
		}
	});
	$('.has-popup-gallery').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
		}
	});

	/*
		Tabs
	*/
	$('.tab-menu').on('click', '.tab-btn', function(){
		var tab_bl = $(this).attr('href');

		$(this).closest('.tab-menu').find('li').removeClass('active');
		$(this).closest('li').addClass('active');

		$(this).closest('.tabs').find('> .tab-item').hide();
		$(tab_bl).fadeIn();

		return false;
	});

	/*
		Collapse
	*/
	$('.collapse-item').on('click', '.collapse-btn', function(){
		if($(this).closest('.collapse-item').hasClass('active')) {
			$(this).closest('.collapse-item').find('.collapse-content').slideUp();
			$(this).closest('.collapse-item').removeClass('active');
			$(this).removeClass('active');
		}
		else {
			$(this).closest('.collapse-item').find('.collapse-content').slideDown();
			$(this).closest('.collapse-item').addClass('active');
			$(this).addClass('active');
		}
	});

	/*
		Video
	*/
	$('.kf-video-item').on('click', '.play, img', function(){
		$(this).closest('.kf-video-item').addClass('active');
		var iframe = $(this).closest('.kf-video-item').find('.js-video-iframe');
		largeVideoPlay(iframe);
		return false;
	});
	function largeVideoPlay( iframe ) {
		var src = iframe.data('src');
		iframe.attr('src', src);
	}

	/*
		Validate Contact Form
	*/
	if($('.kf-contacts-form').length) {
	$('#cform').validate({
		rules: {
			name: {
				required: true
			},
			tel: {
				required: true
			},
			subject: {
				required: true
			},
			message: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
		},
		success: 'valid',
		submitHandler: function() {
			$.ajax({
				url: 'mailer/feedback.php',
				type: 'post',
				dataType: 'json',
				data: 'name='+ $("#cform").find('input[name="name"]').val() + '&email='+ $("#cform").find('input[name="email"]').val() + '&tel='+ $("#cform").find('input[name="tel"]').val() + '&subject='+ $("#cform").find('input[name="subject"]').val() + '&message=' + $("#cform").find('textarea[name="message"]').val(),
				beforeSend: function() {

				},
				complete: function() {

				},
				success: function(data) {
					$('#cform').fadeOut();
					$('.alert-success').delay(1000).fadeIn();
				}
			});
		}
	});
	}

	/*
		Validate Reservation Form
	*/
	if($('.kf-reservation').length) {
	$('#rform').validate({
		rules: {
			name: {
				required: true
			},
			tel: {
				required: true
			},
			date: {
				required: true
			},
			time: {
				required: true
			},
			persons: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
		},
		success: 'valid',
		submitHandler: function() {
			$.ajax({
				url: 'mailer/feedback_r.php',
				type: 'post',
				dataType: 'json',
				data: 'name='+ $("#rform").find('input[name="name"]').val() + '&email='+ $("#rform").find('input[name="email"]').val() + '&tel='+ $("#rform").find('input[name="tel"]').val() + '&time='+ $("#rform").find('input[name="time"]').val() + '&date=' + $("#rform").find('textarea[name="date"]').val() + '&persons=' + $("#rform").find('textarea[name="persons"]').val(),
				beforeSend: function() {

				},
				complete: function() {

				},
				success: function(data) {
					$('#rform').fadeOut();
					$('.alert-success').delay(1000).fadeIn();
				}
			});
		}
	});
	}

} )( jQuery );
