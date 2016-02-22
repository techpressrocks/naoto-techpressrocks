jQuery(document).ready(function() {
	var stickyNavTop = jQuery('.sticky-navbar').offset().top;
 
	var stickyNav = function(){
	var scrollTop = jQuery(window).scrollTop();
	
	if (stickheader_checkbox.show_sticky_header == 1 && scrollTop > stickyNavTop && window.matchMedia('(min-width: 800px)').matches) { 
		jQuery('.sticky-navbar .blog-logo img').show();
		jQuery('.sticky-navbar .blog-logo').show();
		jQuery('.sticky-navbar').slideDown();
		jQuery('.sticky-navbar').addClass('sticky');
	} else {
		jQuery('.sticky-navbar .blog-logo img').hide();
		jQuery('.sticky-navbar .blog-logo').hide();
		jQuery('.sticky-navbar').slideUp();
		jQuery('.sticky-navbar').removeClass('sticky'); 
	}
	};
	stickyNav();
	jQuery(window).scroll(function() {
		stickyNav();
	});
});