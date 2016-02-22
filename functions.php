<?php
add_action( 'wp_enqueue_scripts', 'fukasawa_child_enqueue' );
function fukasawa_child_enqueue() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'fukasawa-child-stickyheader', get_stylesheet_directory_uri() . '/js/fukasawa-child-sticky-header.js', array( 'jquery' ), '1', true );
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css'); 
    $stickheader_checkbox = array(
        'show_sticky_header' => get_option( 'show_sticky_header' )
    );
    wp_localize_script( 'fukasawa-child-stickyheader', 'stickheader_checkbox', $stickheader_checkbox );
}
register_nav_menus( array(
	'footer_menu' => __( 'Footer Menu', 'fukasawa' ),
	'mobile' => __( 'Mobile Menu', 'fukasawa' )
) );
function fukasawa_child_customize_register( $wp_customize ) {
	$colors = array();
	$colors[] = array(
	'slug'=>'sidebar_back_color', 
	'default' => '#FFF',
	'label' => __('Sidebar - Background Color', 'fukasawa')
	);
	$colors[] = array(
	'slug'=>'social_button_color', 
	'default' => '#019EBD',
	'label' => __('Social Sharing/Follow Button Color', 'fukasawa')
	);		
	$colors[] = array(
	'slug'=>'sidebar_title_color', 
	'default' => '#333',
	'label' => __('Sidebar - Widget Titles Color', 'fukasawa')
	);
	$colors[] = array(
	'slug'=>'sidebar_link_color', 
	'default' => '#333',
	'label' => __('Sidebar - Widget Links Color', 'fukasawa')
	);
	$colors[] = array(
	'slug'=>'sidebar_menu_color', 
	'default' => '#999',
	'label' => __('Sidebar - Main Menu Color', 'fukasawa')
	);
	$colors[] = array(
	'slug'=>'sidebar_menu_color_hover', 
	'default' => '#333',
	'label' => __('Sidebar - Main Menu Hover Color', 'fukasawa')
	);
	$colors[] = array(
	'slug'=>'sidebar_current_menu', 
	'default' => '#333',
	'label' => __('Sidebar - Current Menu Color', 'fukasawa')
	);	
	$colors[] = array(
	'slug'=>'sidebar_current_menu_indicator', 
	'default' => '#019EBD',
	'label' => __('Sidebar - Current Menu Indicator Color', 'fukasawa')
	);	
	$colors[] = array(
	'slug'=>'sidebar_widget_separator', 
	'default' => '#e7e7e7',
	'label' => __('Sidebar - Widget Separator Color', 'fukasawa')
	);
	$colors[] = array(
	'slug'=>'sidebar_searchfield_back', 
	'default' => '#eee',
	'label' => __('Sidebar - Searchfield Backgroundcolor', 'fukasawa')
	);
	$colors[] = array(
	'slug'=>'sidebar_searchfield_color', 
	'default' => '#666',
	'label' => __('Sidebar - Searchfield Textcolor', 'fukasawa')
	);
	foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 
				'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
				'section' => 'colors',
				'settings' => $color['slug'])
			)
		);
	}
	$stickycolors = array();
	$stickycolors[] = array(
	'slug'=>'sticky_header_background', 
	'default' => '#648194',
	'label' => __('Sticky Header - Background Color', 'fukasawa')
	);
	$stickycolors[] = array(
	'slug'=>'sticky_header_color', 
	'default' => '#999',
	'label' => __('Sticky Header - Text/Link Color', 'fukasawa')
	);	
	foreach( $stickycolors as $stickycolor ) {
		// SETTINGS
		$wp_customize->add_setting(
			$stickycolor['slug'], array(
				'default' => $stickycolor['default'],
				'type' => 'option', 
				'capability' => 
				'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$stickycolor['slug'], 
				array('label' => $stickycolor['label'], 
				'section' => 'show_sticky_header_section',
				'settings' => $stickycolor['slug'])
			)
		);
	}
	// Section - Show Sticky Header
	$wp_customize->add_section('show_sticky_header_section' , array(
		'title'     => __('Show Sticky Header', 'fukasawa')
	));
	$wp_customize->add_setting('show_sticky_header', array(
		'default'    => '0',
		'type'       => 'option',
        'capability' => 'edit_theme_options'
	));	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_sticky_header',
			array(
				'label'     => __('Show Sticky Header - Only tick if you have a logo (75 px width)', 'fukasawa'),
				'section'   => 'show_sticky_header_section',
				'settings'  => 'show_sticky_header',
				'type'      => 'checkbox',
			)
		)
	);
	// Section - Show Sticky Header
	$wp_customize->add_section('mobile_toggle_section' , array(
		'title'     => __('Mobile Menu Toggle Colors', 'fukasawa')
	));	
	$mobilecolors = array();
	$mobilecolors[] = array(
	'slug'=> 'mobile_toggle_background', 
	'default' => '#019EBD',
	'label' => __('Mobile Menu Toggle - Background Color', 'fukasawa')
	);
	$mobilecolors[] = array(
	'slug'=> 'mobile_toggle_color', 
	'default' => '#FFF',
	'label' => __('Mobile Menu Toggle - Text Color', 'fukasawa')
	);	
	foreach( $mobilecolors as $mobilecolor ) {
		// SETTINGS
		$wp_customize->add_setting(
			$mobilecolor['slug'], array(
				'default' => $mobilecolor['default'],
				'type' => 'option', 
				'capability' => 
				'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$mobilecolor['slug'], 
				array('label' => $mobilecolor['label'], 
				'section' => 'mobile_toggle_section',
				'settings' => $mobilecolor['slug'])
			)
		);
	}	
	// Section - Social Follow Links
	$wp_customize->add_section('social_follow_links_section' , array(
		'title'     => __('Social Follow Links', 'fukasawa')
	));	
	$socialfollowlinks = array();
	$socialfollowlinks[] = array(
	'slug'=>'social_follow_instagram', 
	'default' => 'https://www.instagram.com/xxx/',
	'label' => __('Instagram', 'fukasawa')
	);	
	$socialfollowlinks[] = array(
	'slug'=>'social_follow_pinterest', 
	'default' => 'https://www.pinterest.com/xxx/',
	'label' => __('Pinterest', 'fukasawa')
	);		
	$socialfollowlinks[] = array(
	'slug'=>'social_follow_facebook', 
	'default' => 'https://www.facebook.com/xxx/',
	'label' => __('Facebook', 'fukasawa')
	);	
	$socialfollowlinks[] = array(
	'slug'=>'social_follow_twitter', 
	'default' => 'https://twitter.com/xxx',
	'label' => __('Twitter', 'fukasawa')
	);	
	$socialfollowlinks[] = array(
	'slug'=>'social_follow_tumblr', 
	'default' => 'http://xxxx.tumblr.com/',
	'label' => __('Tumblr', 'fukasawa')
	);		
	$socialfollowlinks[] = array(
	'slug'=>'social_follow_googleplus', 
	'default' => 'https://plus.google.com/xxxx',
	'label' => __('Google+', 'fukasawa')
	);
	foreach( $socialfollowlinks as $socialfollowlink ) {	
		$wp_customize->add_setting(
			$socialfollowlink['slug'], array(
				'default' => $socialfollowlink['default'],
				'type' => 'option', 
				'capability' => 
				'edit_theme_options'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$socialfollowlink['slug'], 
				array(
					'label'     => $socialfollowlink['label'],
					'section'   => 'social_follow_links_section',
					'settings'  => $socialfollowlink['slug']
				)
			)
		);
	}	
}
add_action( 'customize_register', 'fukasawa_child_customize_register' );