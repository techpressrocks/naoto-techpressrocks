<?php
/**
 * @package    Naoto
 * @version    1.0.0
 * @author     AFB
 * @copyright  Copyright (c) 2016, Andrew F. Burton
 * @link       https://github.com/techpressrocks/naoto-techpressrocks
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'naoto_theme_setup' );

function naoto_theme_setup() {
	//Load Naoto Customize Class
	require_once( get_stylesheet_directory() . '/class.naoto.customizer.php' );
	//Make Naoto translation ready
	load_child_theme_textdomain( 'naoto', get_stylesheet_directory() . '/languages' );
	//Register additional menus - footer and mobile
	register_nav_menus( array(
		'footer_menu' => __( 'Footer Menu', 'naoto' ),
		'mobile' => __( 'Mobile Menu', 'naoto' )
	) );
	//Enqueue styles and scripts
	add_action( 'wp_enqueue_scripts', 'naoto_enqueue_scripts' );
	//Register special Customizer features for Naoto
	//add_action( 'customize_register', 'naoto_customize_register' );
}
function naoto_enqueue_scripts() {
	//Load stylesheet of parent theme - Fukasawa
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	//Load JS for sticky header bar
	wp_enqueue_script( 'naoto-stickyheader', get_stylesheet_directory_uri() . '/js/naoto-sticky-header.js', array( 'jquery' ), '1', true );
	//Add show_sticky_header option and localize it for use in naoto-sticky-header.js
	$stickheader_checkbox = array(
		'show_sticky_header' => get_theme_mod( 'show_sticky_header' )
	);
	wp_localize_script( 'naoto-stickyheader', 'stickheader_checkbox', $stickheader_checkbox );	
	//Enqueue Font Awesome style CSS
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
}
add_action('after_switch_theme', 'naoto_setup_options');
function naoto_setup_options() {
	set_theme_mod('sharing_link_recommendthis', true);
	set_theme_mod('sharing_link_pinterest', true);
	set_theme_mod('sharing_link_facebook', true);
	set_theme_mod('sharing_link_twitter', true);
	set_theme_mod('sharing_link_tumblr', true);
	set_theme_mod('sharing_link_googleplus', true);

	set_theme_mod('social_follow_instagram', 'https://www.instagram.com/xxx/');
	set_theme_mod('social_follow_pinterest', 'https://www.pinterest.com/xxx/');
	set_theme_mod('social_follow_facebook', 'https://www.facebook.com/xxx');
	set_theme_mod('social_follow_twitter', 'https://twitter.com/xxx');
	set_theme_mod('social_follow_googleplus', 'https://plus.google.com/xxxx');
	$rss_url = site_url() . '/feed/';
	set_theme_mod('social_follow_rss', $rss_url);	
}	
function naoto_sharing_links() {
	?>		
	<div class="naoto-frontpage-sharing">
	
	<?php if( function_exists('dot_irecommendthis') ) { ?>
		<?php $sharing_link_recommendthis = ( 1 == get_theme_mod( 'sharing_link_recommendthis' ) ) ? '' : 'naoto-sharing-hidden' ?>
		<span class="<?php echo $sharing_link_recommendthis; ?>"><?php dot_irecommendthis(); ?></span>
	<?php } ?>	

	<?php $sharing_link_pinterest = ( 1 == get_theme_mod( 'sharing_link_pinterest' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-pinterest <?php echo $sharing_link_pinterest; ?>" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo $image;?>&description=<?php the_title();?>" target="_blank" title="<?php _e( 'Pin it', 'naoto'); ?>"></a>
		
	<?php $sharing_link_facebook = ( 1 == get_theme_mod( 'sharing_link_facebook' ) ) ? '' : 'naoto-sharing-hidden' ?>
		<a class="naoto-facebook <?php echo $sharing_link_facebook; ?>" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank" title="<?php _e( 'Share on Facebook!', 'naoto'); ?>"></a>
		
	<?php $sharing_link_twitter = ( 1 == get_theme_mod( 'sharing_link_twitter' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-twitter <?php echo $sharing_link_twitter; ?>" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="<?php _e( 'Tweet this!', 'naoto'); ?>"></a>
	
	<?php $sharing_link_tumblr = ( 1 == get_theme_mod( 'sharing_link_tumblr' ) ) ? '' : 'naoto-sharing-hidden' ?>		
		<a class="naoto-tumblr <?php echo $sharing_link_tumblr; ?>" href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share this page on Tumblr!', 'naoto'); ?>"></a>

	<?php $sharing_link_googleplus = ( 1 == get_theme_mod( 'sharing_link_googleplus' ) ) ? '' : 'naoto-sharing-hidden' ?>		
		<a class="naoto-google <?php echo $sharing_link_googleplus; ?>" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"onclick="javascript:window.open(this.href,
		'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false; "title="<?php _e( 'Share on Google+!', 'naoto'); ?>"></a>

	<?php $sharing_link_reddit = ( 1 == get_theme_mod( 'sharing_link_reddit' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-reddit <?php echo $sharing_link_reddit; ?>" href="http://www.reddit.com/submit?url<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share this page on Reddid!', 'naoto'); ?>"></a>

	<?php $sharing_link_stumbleupon = ( 1 == get_theme_mod( 'sharing_link_stumbleupon' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-stumbleupon <?php echo $sharing_link_stumbleupon; ?>" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share this page on Stumbleupon!', 'naoto'); ?>"></a>

	<?php $sharing_link_linkedin = ( 1 == get_theme_mod( 'sharing_link_linkedin' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-linkedin <?php echo $sharing_link_stumbleupon; ?>" href="http://www.linkedin.com/shareArticle?mini=true&<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php site_url(); ?>" target="_blank" title="<?php _e( 'Share this page on LinkedIn!', 'naoto'); ?>"></a>
		
	<?php $sharing_link_vk = ( 1 == get_theme_mod( 'sharing_link_vk' ) ) ? '' : 'naoto-sharing-hidden' ?>		
		<a class="naoto-vk <?php echo $sharing_link_vk; ?>" href="http://vk.com/share.php?url=<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share on VK!', 'naoto'); ?>"></a>
	</div>
	<?php
}	

function naoto_follow_links() {
	if ( get_theme_mod( 'social_follow_instagram' ) ) { ?>
		<a class="naoto-instagram" href="<?php echo esc_url ( get_theme_mod( 'social_follow_instagram' ) ); ?>" target="_blank" title="Follow us on Instagram!"></a>
	<?php }
	if ( get_theme_mod( 'social_follow_pinterest' ) ) { ?>
		<a class="naoto-pinterest" href="<?php echo esc_url ( get_theme_mod( 'social_follow_pinterest' ) ); ?>" target="_blank" title="Follow us on Pinterest!"></a>
	<?php }
	if ( get_theme_mod( 'social_follow_facebook' ) ) { ?>
		<a class="naoto-facebook" href="<?php echo esc_url ( get_theme_mod( 'social_follow_facebook' ) ); ?>" target="_blank" title="Follow us on Facebook!"></a>	
	<?php }
	if ( get_theme_mod( 'social_follow_youtube' ) ) { ?>
		<a class="naoto-youtube" href="<?php echo esc_url ( get_theme_mod( 'social_follow_youtube' ) ); ?>" target="_blank" title="Follow us on Facebook!"></a>	
	<?php }					
	if ( get_theme_mod( 'social_follow_twitter' ) ) { ?>
		<a class="naoto-twitter" href="<?php echo esc_url ( get_theme_mod( 'social_follow_twitter' ) ); ?>" target="_blank" title="Follow us on Twitter"></a>
	<?php }					
	if ( get_theme_mod( 'social_follow_tumblr' ) ) { ?>
		<a class="naoto-tumblr" href="<?php echo esc_url ( get_theme_mod( 'social_follow_tumblr' ) ); ?>" target="_blank" title="Follow us on Tumblr!"></a>
	<?php }					
	if ( get_theme_mod( 'social_follow_googleplus' ) ) { ?>
		<a class="naoto-google" href="<?php echo esc_url ( get_theme_mod( 'social_follow_googleplus' ) ); ?>" title="Follow us on Google+!"></a>
	<?php }	
	if ( get_theme_mod( 'social_follow_wordpress' ) ) { ?>
		<a class="naoto-wordpress" href="<?php echo esc_url ( get_theme_mod( 'social_follow_wordpress' ) ); ?>" title="Follow us on WordPress.com!"></a>
	<?php }	
	if ( get_theme_mod( 'social_follow_linkedin' ) ) { ?>
		<a class="naoto-linkedin" href="<?php echo esc_url ( get_theme_mod( 'social_follow_linkedin' ) ); ?>" title="Follow us on LinkedIn!"></a>
	<?php }	
	if ( get_theme_mod( 'social_follow_deviantart' ) ) { ?>
		<a class="naoto-deviantart" href="<?php echo esc_url ( get_theme_mod( 'social_follow_deviantart' ) ); ?>" title="Follow us on Deviantart!"></a>
	<?php }	
	if ( get_theme_mod( 'social_follow_dribble' ) ) { ?>
		<a class="naoto-dribble" href="<?php echo esc_url ( get_theme_mod( 'social_follow_dribble' ) ); ?>" title="Follow us on Dribble"></a>
	<?php }						
	if ( get_theme_mod( 'social_follow_rss' ) ) { ?>
		<a class="naoto-rss" href="<?php echo esc_url ( get_theme_mod( 'social_follow_rss' ) ); ?>" title="Subscribe to our feed!"></a>
	<?php }		
}

function naoto_single_sharing_links() {
	?>		
	<div class="naoto-single-sharing">
	
	<?php if( function_exists('dot_irecommendthis') ) { ?>
		<?php $sharing_link_recommendthis = ( 1 == get_theme_mod( 'sharing_link_recommendthis' ) ) ? '' : 'naoto-sharing-hidden' ?>
		<span class="irecommendthis <?php echo $sharing_link_recommendthis; ?>"><?php dot_irecommendthis(); ?></span>
	<?php } ?>	

	<?php $sharing_link_pinterest = ( 1 == get_theme_mod( 'sharing_link_pinterest' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-single-pinterest <?php echo $sharing_link_pinterest; ?>" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo $image;?>&description=<?php the_title();?>" target="_blank" title="<?php _e( 'Pin it', 'naoto'); ?>"></a>
		
	<?php $sharing_link_facebook = ( 1 == get_theme_mod( 'sharing_link_facebook' ) ) ? '' : 'naoto-sharing-hidden' ?>
		<a class="naoto-single-facebook <?php echo $sharing_link_facebook; ?>" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank" title="<?php _e( 'Share on Facebook!', 'naoto'); ?>"></a>
		
	<?php $sharing_link_twitter = ( 1 == get_theme_mod( 'sharing_link_twitter' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-single-twitter <?php echo $sharing_link_twitter; ?>" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="<?php _e( 'Tweet this!', 'naoto'); ?>"></a>
	
	<?php $sharing_link_tumblr = ( 1 == get_theme_mod( 'sharing_link_tumblr' ) ) ? '' : 'naoto-sharing-hidden' ?>		
		<a class="naoto-single-tumblr <?php echo $sharing_link_tumblr; ?>" href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share this page on Tumblr!', 'naoto'); ?>"></a>

	<?php $sharing_link_googleplus = ( 1 == get_theme_mod( 'sharing_link_googleplus' ) ) ? '' : 'naoto-sharing-hidden' ?>		
		<a class="naoto-single-google <?php echo $sharing_link_googleplus; ?>" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"onclick="javascript:window.open(this.href,
		'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false; "title="<?php _e( 'Share on Google+!', 'naoto'); ?>"></a>

	<?php $sharing_link_reddit = ( 1 == get_theme_mod( 'sharing_link_reddit' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-single-reddit <?php echo $sharing_link_reddit; ?>" href="http://www.reddit.com/submit?url<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share this page on Reddid!', 'naoto'); ?>"></a>

	<?php $sharing_link_stumbleupon = ( 1 == get_theme_mod( 'sharing_link_stumbleupon' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-single-stumbleupon <?php echo $sharing_link_stumbleupon; ?>" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share this page on Stumbleupon!', 'naoto'); ?>"></a>

	<?php $sharing_link_linkedin = ( 1 == get_theme_mod( 'sharing_link_linkedin' ) ) ? '' : 'naoto-sharing-hidden' ?>	
		<a class="naoto-single-linkedin <?php echo $sharing_link_stumbleupon; ?>" href="http://www.linkedin.com/shareArticle?mini=true&<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php site_url(); ?>" target="_blank" title="<?php _e( 'Share this page on LinkedIn!', 'naoto'); ?>"></a>
		
	<?php $sharing_link_vk = ( 1 == get_theme_mod( 'sharing_link_vk' ) ) ? '' : 'naoto-sharing-hidden' ?>		
		<a class="naoto-single-vk <?php echo $sharing_link_vk; ?>" href="http://vk.com/share.php?url=<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" target="_blank" title="<?php _e( 'Share on VK!', 'naoto'); ?>"></a>
	</div>
	<?php
}					