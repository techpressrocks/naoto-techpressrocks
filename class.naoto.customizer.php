<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Naoto 1.0
 */
class Naoto_Customize {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since Naoto 1.0
    */
	public static function register ( $wp_customize ) {
		$wp_customize->add_section( 'naoto_logo_section' , array(
		    'title'       => __( 'Naoto - Logo Upload', 'naoto' ),
		    'description' => __('<h3>Upload a logo to replace the default site title in the sidebar/header. Suggested size: 125px</h3>', 'naoto'),
		) );
		$wp_customize->add_setting( 'naoto_logo', 
			array( 'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fukasawa_logo', array(
		    'label'    => __( 'Logo', 'naoto' ),
		    'section'  => 'naoto_logo_section',
		    'settings' => 'naoto_logo',
		) ) );		
		$colors = array();
		$colors[] = array(
		'slug'=> 'body_back_color', 
		'default' => '#f2f2f2',
		'label' => __('Body (content area, right of sidebar) - Background Color', 'naoto')
		);	
		$colors[] = array(
		'slug'=> 'body_link_color', 
		'default' => '#019EBD',
		'label' => __('Body (content area, right of sidebar) - Link Color', 'naoto')
		);	
		$colors[] = array(
		'slug'=> 'sidebar_back_color', 
		'default' => '#FFF',
		'label' => __('Sidebar - Background Color', 'naoto')
		);
		$colors[] = array(
		'slug'=> 'social_button_color', 
		'default' => '#8fb9d4',
		'label' => __('Social Sharing/Follow Button Color', 'naoto')
		);		
		$colors[] = array(
		'slug'=> 'sidebar_title_color', 
		'default' => '#333',
		'label' => __('Sidebar - Widget Titles Color', 'naoto')
		);
		$colors[] = array(
		'slug'=> 'sidebar_link_color', 
		'default' => '#333',
		'label' => __('Sidebar - Widget Links Color', 'naoto')
		);
		$colors[] = array(
		'slug'=> 'sidebar_menu_color', 
		'default' => '#999',
		'label' => __('Sidebar - Main Menu Color', 'naoto')
		);
		$colors[] = array(
		'slug'=> 'sidebar_menu_color_hover', 
		'default' => '#333',
		'label' => __('Sidebar - Main Menu Hover Color', 'naoto')
		);
		$colors[] = array(
		'slug'=> 'sidebar_current_menu', 
		'default' => '#333',
		'label' => __('Sidebar - Current Menu Color', 'naoto')
		);	
		$colors[] = array(
		'slug'=> 'sidebar_current_menu_indicator', 
		'default' => '#019EBD',
		'label' => __('Sidebar - Current Menu Indicator Color', 'naoto')
		);	
		$colors[] = array(
		'slug'=> 'sidebar_widget_separator', 
		'default' => '#e7e7e7',
		'label' => __('Sidebar - Widget Separator Color', 'naoto')
		);
		$colors[] = array(
		'slug'=> 'sidebar_searchfield_back', 
		'default' => '#eee',
		'label' => __('Sidebar - Searchfield Backgroundcolor', 'naoto')
		);
		$colors[] = array(
		'slug'=> 'sidebar_searchfield_color', 
		'default' => '#666',
		'label' => __('Sidebar - Searchfield Textcolor', 'naoto')
		);
		foreach( $colors as $color ) {
			// SETTINGS
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'capability' => 'edit_theme_options',
					/*'transport' => 'postMessage',*/
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$color['slug'], 
					array('label' => $color['label'], 
					'section' => 'naoto_colors_section',
					'settings' => $color['slug'])
				)
			);
		}
		$wp_customize->add_section('naoto_colors_section' , array(
			'title'     => __('Naoto - Color Options', 'naoto')
		));
		$stickycolors = array();
		$stickycolors[] = array(
		'slug'=> 'sticky_header_background', 
		'default' => '#648194',
		'label' => __('Sticky Header - Background Color', 'naoto')
		);
		$stickycolors[] = array(
		'slug'=> 'sticky_header_color', 
		'default' => '#999',
		'label' => __('Sticky Header - Text/Link Color', 'naoto')
		);	
		foreach( $stickycolors as $stickycolor ) {
			// SETTINGS
			$wp_customize->add_setting(
				$stickycolor['slug'], array(
					'default' => $stickycolor['default'],
					'capability' => 'edit_theme_options',
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color'
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
			'title'     => __('Naoto - Sticky Header', 'naoto'),
			'description'    =>  __('<h3>Enable the sticky header and adjust the padding and size of the Social Follow buttons</h3>', 'naoto'),
		));
		$wp_customize->add_setting('show_sticky_header', array(
			'default'    => 0,
			'capability' => 'edit_theme_options', /*cannot add transport post message here because of the js for the sticky header*/
			'sanitize_callback' => 'absint'
		));	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'show_sticky_header',
				array(
					'label' => __('Show Sticky Header', 'naoto'),
					'section' => 'show_sticky_header_section',
					'settings' => 'show_sticky_header',
					'type' => 'checkbox',
				)
			)
		);
		$wp_customize->add_setting('followsize_sticky_header', array(
			'default'    => '24',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'naoto_sanitize_text'
		));	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'followsize_sticky_header',
				array(
					'label' => __('Font Size - Social Follow buttons (default: 24 = 24px', 'naoto'),
					'section' => 'show_sticky_header_section',
					'settings' => 'followsize_sticky_header'
				)
			)
		);
		$wp_customize->add_setting('followpadding_sticky_header', array(
			'default'    => '0',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'naoto_sanitize_text'
		));	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'followpadding_sticky_header',
				array(
					'label' => __('Padding in % - Social Follow buttons (default: 0)', 'naoto'),
					'section' => 'show_sticky_header_section',
					'settings' => 'followpadding_sticky_header',
				)
			)
		);		
		// Section - Social Sharing Links
		$wp_customize->add_section('social_sharing_links_section' , array(
			'title'     => __('Naoto - Sharing Links', 'naoto'),
			'description' => __('<h3>Tick the checkboxes of the sharing buttons you want</h3>', 'naoto')
		));
		$sharinglinks = array();
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_recommendthis', 
		'default' => 1,
		'label' => __('Recommend This', 'naoto')
		);
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_pinterest', 
		'default' => 1,
		'label' => __('Pinterest', 'naoto')
		);	
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_facebook', 
		'default' => 1,
		'label' => __('Facebook', 'naoto')
		);	
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_twitter', 
		'default' => 1,
		'label' => __('Twitter', 'naoto')
		);	
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_tumblr', 
		'default' => 1,
		'label' => __('Tumblr', 'naoto')
		);	
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_googleplus', 
		'default' => 1,
		'label' => __('Google+', 'naoto')
		);
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_reddit', 
		'default' => '',
		'label' => __('Reddit', 'naoto')
		);	
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_stumbleupon', 
		'default' => '',
		'label' => __('Stumpleupon', 'naoto')
		);
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_linkedin', 
		'default' => '',
		'label' => __('LinkedIn', 'naoto')
		);			
		$sharinglinks[] = array(
		'slug'=> 'sharing_link_vk', 
		'default' => '',
		'label' => __('VKontakte', 'naoto')
		);
		foreach( $sharinglinks as $sharinglink ) {
			// SETTINGS
			$wp_customize->add_setting(
				$sharinglink['slug'], array(
					'default' => $sharinglink['default'],
					'capability' => 'edit_theme_options',
					'transport' => 'postMessage',
					'sanitize_callback' => 'absint'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$sharinglink['slug'],
					array(
						'label' => $sharinglink['label'],
						'section' => 'social_sharing_links_section',
						'settings' => $sharinglink['slug'],
						'type' => 'checkbox'
					)
				)
			);		
		}	
		$wp_customize->add_setting('frontpage_sharing_size', array(
			'default'    => '24px',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'frontpage_sharing_size',
				array(
					'label' => __('Font Size - Social Sharing buttons (default: 24px)', 'naoto'),
					'section' => 'social_sharing_links_section',
					'settings' => 'frontpage_sharing_size'
				)
			)
		);
		$wp_customize->add_setting('frontpage_sharing_padding', array(
			'default'    => '0',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'naoto_sanitize_text'
		));	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'frontpage_sharing_padding',
				array(
					'label' => __('Padding in % - Social Sharing buttons (default: 0)', 'naoto'),
					'section' => 'social_sharing_links_section',
					'settings' => 'frontpage_sharing_padding',
				)
			)
		);				
		// Section - Social Follow Links
		$wp_customize->add_section('social_follow_links_section' , array(
			'title'     => __('Naoto - Follow Links', 'naoto'),
			'description'    =>  __('<h3>To remove a Social Follow link delete the text field completely, and to add a new link fill in the field corresponding to the service.</h3>', 'naoto'),
		));	
		$socialfollowlinks = array();
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_instagram', 
		'default' => 'https://www.instagram.com/xxx/',
		'label' => __('Instagram', 'naoto')
		);	
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_pinterest', 
		'default' => 'https://www.pinterest.com/xxx/',
		'label' => __('Pinterest', 'naoto')
		);		
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_facebook', 
		'default' => 'https://www.facebook.com/xxx/',
		'label' => __('Facebook', 'naoto')
		);	
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_youtube', 
		'default' => '',
		'label' => __('YouTube', 'naoto')
		);		
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_twitter', 
		'default' => 'https://twitter.com/xxx',
		'label' => __('Twitter', 'naoto')
		);	
		$socialfollowlinks[] = array(
		'slug'=>'social_follow_tumblr', 
		'default' => 'http://xxxx.tumblr.com/',
		'label' => __('Tumblr', 'naoto')
		);		
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_googleplus', 
		'default' => 'https://plus.google.com/xxxx',
		'label' => __('Google+', 'naoto')
		);
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_linkedin', 
		'default' => '',
		'label' => __('LinkedIn', 'naoto')
		);
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_deviantart', 
		'default' => '',
		'label' => __('Deviant Art', 'naoto')
		);
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_dribble', 
		'default' => '',
		'label' => __('Dribble', 'naoto')
		);
		$rss_url = site_url() . '/feed/';
		$socialfollowlinks[] = array(
		'slug'=> 'social_follow_rss', 
		'default' => $rss_url,
		'label' => __('RSS', 'naoto')
		);	
		foreach( $socialfollowlinks as $socialfollowlink ) {	
			$wp_customize->add_setting(
				$socialfollowlink['slug'], array(
					'default' => $socialfollowlink['default'],
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw'
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
		$wp_customize->add_setting('frontpage_follow_size', array(
			'default'    => '24px',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'frontpage_follow_size',
				array(
					'label' => __('Font Size - Social Follow buttons (default: 24px)', 'naoto'),
					'section' => 'social_follow_links_section',
					'settings' => 'frontpage_follow_size'
				)
			)
		);
		$wp_customize->add_setting('frontpage_follow_padding', array(
			'default'    => '0',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'naoto_sanitize_text'
		));	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'frontpage_follow_padding',
				array(
					'label' => __('Padding in % - Social Follow buttons (default: 0)', 'naoto'),
					'section' => 'social_follow_links_section',
					'settings' => 'frontpage_follow_padding',
				)
			)
		);					
		// Section - Mobile Menu
		$wp_customize->add_section('mobile_menu_section' , array(
			'title'     => __('Naoto - Mobile Menu Colors', 'naoto'),
			'description' => __('<h2>Mobile Menu Toggle Colors</h2>If you start changing colors (see <b>Naoto - Color Options</b>), you might also have to change the colors of the <b>Mobile Menu Toggle</b>. You can do this here.', 'naoto')
		));	
		$mobilecolors = array();
		$mobilecolors[] = array(
		'slug'=> 'mobile_toggle_background', 
		'default' => '#019EBD',
		'label' => __('Mobile Menu Toggle - Background Color', 'naoto')
		);
		$mobilecolors[] = array(
		'slug'=> 'mobile_toggle_color', 
		'default' => '#FFF',
		'label' => __('Mobile Menu Toggle - Text Color', 'naoto')
		);	
		$mobilecolors[] = array(
		'slug'=> 'mobile_menu_color', 
		'default' => '#999',
		'label' => __('Mobile Menu - Text Color', 'naoto')
		);		
		foreach( $mobilecolors as $mobilecolor ) {
			// SETTINGS
			$wp_customize->add_setting(
				$mobilecolor['slug'], array(
					'default' => $mobilecolor['default'],
					'capability' => 'edit_theme_options',
					/*'transport' => 'postMessage',*/
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$mobilecolor['slug'], 
					array('label' => $mobilecolor['label'], 
					'section' => 'mobile_menu_section',
					'settings' => $mobilecolor['slug'])
				)
			);
		}	
	}
	/**
    * This will sanitize text and checkbox input.
    * @parm $input
    * @since Naoto 1.0
    */	
	public static function naoto_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
	public static function naoto_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
	/*public static function naoto_sanitize_checkbox( $input ) {
		return ( 1 === absint( $input ) ) ? 1 : 0;
	}*/
	/**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since Naoto 1.0
    */
	public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
           <?php self::generate_css('body', 'background', 'body_back_color'); ?> 
           <?php self::generate_css('body a', 'color', 'body_link_color'); ?>
		   <?php self::generate_css('.naoto-sidebar', 'background-color', 'sidebar_back_color'); ?>
		   <?php self::generate_css('.naoto-frontpage-sharing a, .naoto-single-sharing a, .naoto-frontpage-follow a, .followsticky-icons a, .naoto-mobile-follow-icons a', 'color', 'social_button_color'); ?>
		   <?php self::generate_css('.widget-title', 'color', 'sidebar_title_color'); ?>
		   <?php self::generate_css('.widget-content a, .widget-content li a, .main-menu a:hover, .main-menu .current-menu-item > a, .main-menu .current_page_item > a', 'color', 'sidebar_link_color'); ?>
		   <?php self::generate_css('.main-menu a', 'color', 'sidebar_menu_color'); ?>
		   <?php self::generate_css('.main-menu a:hover', 'color', 'sidebar_menu_color_hover'); ?>
           <?php self::generate_css('.main-menu .current-menu-item:before, .main-menu .current_page_item:before', 'color', 'sidebar_current_menu_indicator'); ?>
		   <?php self::generate_css('.main-menu a:hover, .main-menu .current-menu-item > a, .main-menu .current_page_item > a', 'color', 'sidebar_current_menu'); ?>
		   <?php self::generate_css('.main-menu:before, .widgets:before, .widget + .widget:before, .credits:before', 'background', 'sidebar_widget_separator'); ?>
		   <?php self::generate_css('.search-field', 'background', 'sidebar_searchfield_back'); ?>
		   <?php self::generate_css('.search-field', 'color', 'sidebar_searchfield_color'); ?>
		   <?php self::generate_css('.sticky-navbar', 'background-color', 'sticky_header_background'); ?>
		   <?php self::generate_css('.main-menu.stickymenu a, .naoto-followsticky', 'color', 'sticky_header_color'); ?>
		   
		   <?php self::generate_css('.followsticky-icons a', 'font-size', 'followsize_sticky_header'); ?>
		   <?php self::generate_css('.followsticky-icons', 'padding-left', 'followpadding_sticky_header'); ?>
		   <?php self::generate_css('.followsticky-icons', 'padding-right', 'followpadding_sticky_header'); ?>		
		   
		   <?php self::generate_css('.nav-toggle.active', 'background', 'mobile_toggle_background'); ?>
		   <?php self::generate_css('.nav-toggle.active p', 'color', 'mobile_toggle_color'); ?>
		   <?php self::generate_css('.nav-toggle.active .bar', 'background', 'mobile_toggle_color'); ?>
		   
			<?php self::generate_css('.nav-toggle p', 'color', 'mobile_menu_color'); ?>
			<?php self::generate_css('.nav-toggle .bar', 'background', 'mobile_menu_color'); ?>
			
			<?php self::generate_css('.naoto-mobile-follow', 'color', 'mobile_menu_color'); ?>
			
			<?php self::generate_css('.naoto-frontpage-sharing', 'padding-left', 'frontpage_sharing_padding'); ?>
			<?php self::generate_css('.naoto-frontpage-sharing', 'padding-right', 'frontpage_sharing_padding'); ?>
			<?php self::generate_css('.naoto-frontpage-sharing a', 'font-size', 'frontpage_sharing_size'); ?>
			
			<?php self::generate_css('.naoto-frontpage-follow', 'padding-left', 'frontpage_follow_padding'); ?>
			<?php self::generate_css('.naoto-frontpage-follow', 'padding-right', 'frontpage_follow_padding'); ?>
			<?php self::generate_css('.naoto-frontpage-follow a', 'font-size', 'frontpage_follow_size'); ?>
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since MyTheme 1.0
    */
	public static function live_preview() {
		wp_enqueue_script( 
			'naoto-themecustomizer', // Give the script a unique ID
			get_stylesheet_directory_uri() . '/js/naoto-customizer.js', // Define the path to the JS file
			array(  'jquery', 'customize-preview' ), // Define dependencies
			'', // Define a version (optional) 
			true // Specify whether to put in footer (leave this true)
		);
	}

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since Naoto 1.0
    */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Naoto_Customize' , 'register' ) );
remove_action( 'customize_register' , array( 'fukasawa_Customize' , 'fukasawa_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Naoto_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Naoto_Customize' , 'live_preview' ) );