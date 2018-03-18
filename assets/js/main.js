jQuery(document).ready(function($) {
	$('.navbar a').click(function(e) {
		// e.preventDefault();
	});

	$('.navbar li').mouseover(function(e) {
		e.preventDefault();
	});

	$('#menu-tog').click(function(e) {
		$('#header-nav').slideToggle();
	});

	$('.submenu').closest('li').addClass('has-submenu');

	$('.has-submenu').find('a:first').addClass('mobile-icon-plus');

	$('li.has-submenu > a').click(function(e) {
		$(this).toggleClass('mobile-icon-plus mobile-icon-minus');
		$(this).closest('li').find('ul:first').fadeToggle(300);
	});

	$('#owl-slider').owlCarousel({
		navigation: true,
		responsiveClass:true,
	    navigationText: [
	      "<i class='fa fa-angle-left'></i>",
	      "<i class='fa fa-angle-right'></i>"
      	],
      	pagination: false,
      	dots: false,
        autoPlay: 6000,
        slideSpeed: 1000,
        singleItem: true,
        autoplayHoverPause:true,
        animateOut: 'slideOutUp',
  		animateIn: 'slideInUp',
  		autoWidth : true
	});

	$('#sidebar-slider').owlCarousel({
        slideSpeed: 1000,
        singleItem: true,
        autoPlay: 7000,
        autoplayHoverPause:true,
        dots:false,
        pagination: false,
        transitionStyle : "fade"
	});

	$('.sidebar-slider-next').click(function(event) {
		$('#sidebar-slider').trigger('owl.next');
	});
	$('.sidebar-slider-prev').click(function(event) {
		$('#sidebar-slider').trigger('owl.prev');
	});



	//
	// $('.flexslider').flexslider({
	//     animation: "slide"
	// });

});