jQuery(function ($) {
    'use strict';
	
	// Header Sticky
	$(window).on('scroll',function() {
		if ($(this).scrollTop() > 120){  
			$('.navbar-area').addClass("is-sticky");
		}
		else{
			$('.navbar-area').removeClass("is-sticky");
		}
	});

	// Mean Menu
	jQuery('.mean-menu').meanmenu({
		meanScreenWidth: "991"
	});

	// Button Hover JS
	$(function() {
		$('.default-btn')
		.on('mouseenter', function(e) {
			var parentOffset = $(this).offset(),
			relX = e.pageX - parentOffset.left,
			relY = e.pageY - parentOffset.top;
			$(this).find('span').css({top:relY, left:relX})
		})
		.on('mouseout', function(e) {
			var parentOffset = $(this).offset(),
			relX = e.pageX - parentOffset.left,
			relY = e.pageY - parentOffset.top;
			$(this).find('span').css({top:relY, left:relX})
		});
	});

	// Search Popup JS
	$('.close-btn').on('click',function() {
		$('.search-overlay').fadeOut();
		$('.search-btn').show();
		$('.close-btn').removeClass('active');
	});
	$('.search-btn').on('click',function() {
		$(this).hide();
		$('.search-overlay').fadeIn();
		$('.close-btn').addClass('active');
	});

	// Projects Slider
	$('.projects-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		smartSpeed: 500,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		navText: [
			"<i class='flaticon-left-arrow'></i>",
			"<i class='flaticon-right-arrow'></i>"
		],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 2
			},
			1024: {
				items: 3
			},
			1200: {
				items: 4
			}
		}
	});

	// Partner Slider
	$('.partner-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: false,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 3
			},
			1024: {
				items: 4
			},
			1200: {
				items: 5
			}
		}
	});

	// Tabs List
	(function ($) {
		$('.tab ul.tabs-list').addClass('active').find('> li:eq(0)').addClass('current');
		$('.tab ul.tabs-list li').on('click', function (g) {
			var tab = $(this).closest('.tab'), 
			index = $(this).closest('li').index();
			tab.find('ul.tabs-list > li').removeClass('current');
			$(this).closest('li').addClass('current');
			tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
			tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
			g.preventDefault();
		});
	})(jQuery);


	// Clients Slider
	$('.clients-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		smartSpeed: 2000,
		margin: 30,
		autoplayHoverPause: true,
		autoplay: true,
		items: 1,
	});

	// Odometer JS
	$('.odometer').appear(function(e) {
		var odo = $(".odometer");
		odo.each(function() {
			var countNumber = $(this).attr("data-count");
			$(this).html(countNumber);
		});
	});

	// FAQ Accordion
	$(function() {
		$('.accordion').find('.accordion-title').on('click', function(){
			// Adds Active Class
			$(this).toggleClass('active');
			// Expand or Collapse This Panel
			$(this).next().slideToggle('fast');
			// Hide The Other Panels
			$('.accordion-content').not($(this).next()).slideUp('fast');
			// Removes Active Class From Other Titles
			$('.accordion-title').not($(this)).removeClass('active');		
		});
	});
	
	// Subscribe form
	$(".newsletter-form").validator().on("submit", function (event) {
		if (event.isDefaultPrevented()) {
		// handle the invalid form...
			formErrorSub();
			submitMSGSub(false, "Please enter your email correctly.");
		} else {
			// everything looks good!
			event.preventDefault();
		}
	});
	function callbackFunction (resp) {
		if (resp.result === "success") {
			formSuccessSub();
		}
		else {
			formErrorSub();
		}
	}
	function formSuccessSub(){
		$(".newsletter-form")[0].reset();
		submitMSGSub(true, "Thank you for subscribing!");
		setTimeout(function() {
			$("#validator-newsletter").addClass('hide');
		}, 4000)
	}
	function formErrorSub(){
		$(".newsletter-form").addClass("animated shake");
		setTimeout(function() {
			$(".newsletter-form").removeClass("animated shake");
		}, 1000)
	}
	function submitMSGSub(valid, msg){
		if(valid){
			var msgClasses = "validation-success";
		} else {
			var msgClasses = "validation-danger";
		}
		$("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
	}
	// AJAX MailChimp
	$(".newsletter-form").ajaxChimp({
		url: "https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9", // Your url MailChimp
		callback: callbackFunction
	});

	// Nice Select JS
	$('select').niceSelect();

	// Popup Video
	$('.popup-youtube').magnificPopup({
		disableOn: 320,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	// Best Services Slider JS
	$(document).ready(function() {
		var bigimage = $("#best-services");
		var thumbs = $("#thumbs");
		//var totalslides = 10;
		var syncedSecondary = true;
		
		bigimage
			.owlCarousel({
			items: 1,
			slideSpeed: 2000,
			nav: true,
			autoplay: true,
			dots: false,
			nav: false,
			loop: true,
			responsiveRefreshRate: 200,
			navText: [
			'<i class="flaticon-left-arrow"></i>',
			'<i class="flaticon-right-arrow"></i>'
			]
		})
			.on("changed.owl.carousel", syncPosition);
		
		thumbs
			.on("initialized.owl.carousel", function() {
			thumbs
			.find(".owl-item")
			.eq(0)
			.addClass("current");
		})
		.owlCarousel({
			loop: false,
			dots: false,
			nav: true,
			autoplay: false,
			active: true,
			navText: [
			'<i class="flaticon-left-arrow"></i>',
			'<i class="flaticon-right-arrow"></i>'
			],
			smartSpeed: 200,
			slideSpeed: 500,
			slideBy: 8,
			responsiveRefreshRate: 100,
			responsive: {
				0: {
					items: 2
				},
				1024: {
					items: 4
				},
				1200: {
					items: 6
				}
			}
		})
		.on("changed.owl.carousel", syncPosition2);
		
		function syncPosition(el) {
		//if loop is set to false, then you have to uncomment the next line
		//var current = el.item.index;
		
		//to disable loop, comment this block
			var count = el.item.count - 1;
			var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
		
			if (current < 0) {
			current = count;
			}
			if (current > count) {
			current = 0;
			}
			//to this
			thumbs
			.find(".owl-item")
			.removeClass("current")
			.eq(current)
			.addClass("current");
			var onscreen = thumbs.find(".owl-item.active").length - 1;
			var start = thumbs
			.find(".owl-item.active")
			.first()
			.index();
			var end = thumbs
			.find(".owl-item.active")
			.last()
			.index();
		
			if (current > end) {
			thumbs.data("owl.carousel").to(current, 100, true);
			}
			if (current < start) {
			thumbs.data("owl.carousel").to(current - onscreen, 100, true);
			}
		}
		
		function syncPosition2(el) {
			if (syncedSecondary) {
			var number = el.item.index;
			bigimage.data("owl.carousel").to(number, 100, true);
			}
		}
		
		thumbs.on("click", ".owl-item", function(e) {
			e.preventDefault();
			var number = $(this).index();
			bigimage.data("owl.carousel").to(number, 300, true);
		});
	});

	// Go to Top
	$(function(){
		// Scroll Event
		$(window).on('scroll', function(){
			var scrolled = $(window).scrollTop();
			if (scrolled > 600) $('.go-top').addClass('active');
			if (scrolled < 600) $('.go-top').removeClass('active');
		});  
		// Click Event
		$('.go-top').on('click', function() {
			$("html, body").animate({ scrollTop: "0" },  500);
		});
	});
	

}(jQuery));

