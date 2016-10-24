/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	wp.customize( 'body_back_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background', newval );
		} );
	} );
	wp.customize( 'body_link_color', function( value ) {
		value.bind( function( newval ) {
			$('.content a').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_back_color', function( value ) {
		value.bind( function( newval ) {
			$('.naoto-sidebar').css('background-color', newval );
		} );
	} );
	
	wp.customize( 'social_button_color', function( value ) {
		value.bind( function( newval ) {
			$('.naoto-frontpage-sharing a, .naoto-single-sharing a, .naoto-frontpage-follow a, .followsticky-icons a, .naoto-mobile-follow-icons a').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_title_color', function( value ) {
		value.bind( function( newval ) {
			$('.widget-title').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_link_color', function( value ) {
		value.bind( function( newval ) {
			$('.widget-content a, .widget-content li a, .main-menu a:hover, .main-menu .current-menu-item > a, .main-menu .current_page_item > a').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_menu_color', function( value ) {
		value.bind( function( newval ) {
			$('.main-menu a').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_menu_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('.main-menu a:hover').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_current_menu_indicator', function( value ) {
		value.bind( function( newval ) {
			$('.main-menu .current-menu-item:before, .main-menu .current_page_item:before').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_current_menu', function( value ) {
		value.bind( function( newval ) {
			$('.main-menu a:hover, .main-menu .current-menu-item > a, .main-menu .current_page_item > a').css('color', newval );
		} );
	} );
	wp.customize( 'sidebar_widget_separator', function( value ) {
		value.bind( function( newval ) {
			$('.main-menu:before, .widgets:before, .widget + .widget:before, .credits:before').css('background', newval );
		} );
	} );
	wp.customize( 'sidebar_searchfield_color', function( value ) {
		value.bind( function( newval ) {
			$('.search-field').css('color', newval );
		} );
	} );
	wp.customize( 'sticky_header_background', function( value ) {
		value.bind( function( newval ) {
			$('.sticky-navbar').css('background-color', newval );
		} );
	} );
	wp.customize( 'sticky_header_color', function( value ) {
		value.bind( function( newval ) {
			$('.main-menu.stickymenu a, .naoto-followsticky').css('color', newval );
		} );
	} );
	wp.customize( 'followsize_sticky_header', function( value ) {
		value.bind( function( newval ) {
			$('.followsticky-icons a').css('font-size', newval );
			//$('.followsticky-icons a').css('line-height', newval );
		} );
	} );
	wp.customize( 'followpadding_sticky_header', function( value ) {
		value.bind( function( newval ) {
			$('.followsticky-icons a').css('padding-left', newval + '%' );
			$('.followsticky-icons a').css('padding-right', newval + '%' );
		} );
	} );	
	wp.customize( 'mobile_toggle_background', function( value ) {
		value.bind( function( newval ) {
			$('.nav-toggle.active').css('background', newval );
		} );
	} );
	wp.customize( 'mobile_toggle_color', function( value ) {
		value.bind( function( newval ) {
			$('.nav-toggle.active p').css('color', newval );
		} );
	} );
	wp.customize( 'mobile_toggle_color', function( value ) {
		value.bind( function( newval ) {
			$('.nav-toggle.active p').css('color', newval );
		} );
	} );	
	wp.customize( 'frontpage_sharing_padding', function( value ) {
		value.bind( function( newval ) {
			$('.naoto-frontpage-sharing').css('padding-left', newval + '%' );
			$('.naoto-frontpage-sharing').css('padding-right', newval + '%' );
		} );
	} );
	wp.customize( 'frontpage_sharing_size', function( value ) {
		value.bind( function( newval ) {
			$('naoto-frontpage-sharing a').css('font-size', newval + 'px' );
		} );
	} );	
	wp.customize( 'frontpage_follow_padding', function( value ) {
		value.bind( function( newval ) {
			$('.naoto-frontpage-follow').css('padding-left', newval + '%' );
			$('.naoto-frontpage-follow').css('padding-right', newval + '%' );
		} );
	} );
	wp.customize( 'frontpage_follow_size', function( value ) {
		value.bind( function( newval ) {
			$('.naoto-frontpage-follow a').css('font-size', newval + 'px' );
		} );
	} );	
	//Sharing Buttons
	wp.customize( 'sharing_link_recommendthis', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing span' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing span' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing span' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing span' ).addClass( 'naoto-sharing-hidden' );
			}
		} );
	} );
	wp.customize( 'sharing_link_pinterest', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-pinterest' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-pinterest' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-pinterest' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-pinterest' ).addClass( 'naoto-sharing-hidden' );
			}

		} );
	} );	
	wp.customize( 'sharing_link_facebook', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-facebook' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-facebook' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-facebook' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-facebook' ).addClass( 'naoto-sharing-hidden' );
			}
		} );
	} );	
	wp.customize( 'sharing_link_twitter', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-twitter' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-twitter' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-twitter' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-twitter' ).addClass( 'naoto-sharing-hidden' );
			}
		} );		
	} );
	wp.customize( 'sharing_link_tumblr', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-tumblr' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-tumblr' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-tumblr' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-tumblr' ).addClass( 'naoto-sharing-hidden' );
			}

		} );		
	} );
	wp.customize( 'sharing_link_googleplus', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-google' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-google' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-google' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-google' ).addClass( 'naoto-sharing-hidden' );
			}
		} );		
	} );	
	wp.customize( 'sharing_link_reddit', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-reddit' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-reddit' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-reddit' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-reddit' ).addClass( 'naoto-sharing-hidden' );
			}
		} );		
	} );	
	wp.customize( 'sharing_link_stumbleupon', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-stumbleupon' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-stumbleupon' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-stumbleupon' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-stumbleupon' ).addClass( 'naoto-sharing-hidden' );
			}
		} );		
	} );
	wp.customize( 'sharing_link_linkedin', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-linkedin' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-linkedin' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-linkedin' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-linkedin' ).addClass( 'naoto-sharing-hidden' );
			}
		} );		
	} );	
	wp.customize( 'sharing_link_vk', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.naoto-frontpage-sharing a.naoto-vk' ).removeClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-vk' ).removeClass( 'naoto-sharing-hidden' );
			} else {
				$( '.naoto-frontpage-sharing a.naoto-vk' ).addClass( 'naoto-sharing-hidden' );
				$( '.naoto-single-sharing a.naoto-single-vk' ).addClass( 'naoto-sharing-hidden' );
			}
		} );		
	} );		
} )( jQuery );
