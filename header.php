<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
																		
		<title><?php wp_title('|', true, 'right'); ?></title>
				
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		 
		<?php wp_head(); ?>
<?php
	$sidebar_back_color = get_option('sidebar_back_color');
	$social_button_color = get_option('social_button_color');
	$sidebar_title_color = get_option('sidebar_title_color');
	$sidebar_link_color = get_option('sidebar_link_color');
	$sidebar_menu_color = get_option('sidebar_menu_color');
	$sidebar_menu_color_hover = get_option('sidebar_menu_color_hover');
	$sidebar_current_menu = get_option('sidebar_current_menu');
	$sidebar_current_menu_indicator = get_option('sidebar_current_menu_indicator');
	$sidebar_widget_separator = get_option('sidebar_widget_separator');
	$sidebar_searchfield_back = get_option('sidebar_searchfield_back');
	$sidebar_searchfield_color = get_option('sidebar_searchfield_color');
	$sticky_header_background = get_option('sticky_header_background');
	$sticky_header_color = get_option('sticky_header_color');
	$show_sticky_header = get_option('show_sticky_header');
	$mobile_toggle_background = get_option('mobile_toggle_background');
	$mobile_toggle_color = get_option('mobile_toggle_color');
	
	$social_follow_instagram = get_option('social_follow_instagram');
	$social_follow_pinterest = get_option('social_follow_pinterest');
	$social_follow_facebook = get_option('social_follow_facebook');
	$social_follow_twitter = get_option('social_follow_twitter');
	$social_follow_tumblr = get_option('social_follow_tumblr');
	$social_follow_googleplus = get_option('social_follow_googleplus');
?>
<style>
.sidebar:before { background: <?php echo $sidebar_back_color; ?>; }
.ugc-project-frontpage-sharing li a, .ugc-project-single-sharing a { color: <?php echo $social_button_color; ?>; }
.widget-title { color: <?php echo $sidebar_title_color; ?>; }
.widget-content a, .widget-content li a, .main-menu a:hover, .main-menu .current-menu-item > a, .main-menu .current_page_item > a { <?php echo $sidebar_link_color; ?>; }
.main-menu a { color: <?php echo $sidebar_menu_color; ?>; }
.main-menu a:hover { color: <?php echo $sidebar_menu_color_hover; ?>; }
.main-menu .current-menu-item:before, .main-menu .current_page_item:before { color: <?php echo $sidebar_current_menu_indicator; ?>; }
.main-menu a:hover, .main-menu .current-menu-item > a, .main-menu .current_page_item > a { color: <?php echo $sidebar_current_menu; ?>; }
.main-menu:before, .widgets:before, .widget + .widget:before, .credits:before { background: <?php echo $sidebar_widget_separator; ?>; }
.search-field { background: <?php echo $sidebar_searchfield_back; ?>; color: <?php echo $sidebar_searchfield_color; ?>; }
.sticky-navbar { background-color: <?php echo $sticky_header_background; ?>; }
.main-menu.stickymenu a, .ugc-project-sharingsticky { color: <?php echo $sticky_header_color; ?>; }
.nav-toggle.active { background: <?php echo $mobile_toggle_background; ?>; }
.nav-toggle.active p { color: <?php echo $mobile_toggle_color; ?>; }
</style>	
	</head>
	
	<body <?php body_class(); ?>>
	<?php if ( $show_sticky_header = 1 ) : ?>
		<div class="sticky-navbar">
        <?php if ( get_theme_mod( 'fukasawa_logo' ) ) : ?>
			
		        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
		        	<img src='<?php echo esc_url( get_theme_mod( 'fukasawa_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
		        </a>
		
			<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>
		
				<h1 class="blog-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
				</h1>
				
			<?php endif; ?>
						<ul class="main-menu stickymenu">
				
				<?php if ( has_nav_menu( 'primary' ) ) {
																	
					wp_nav_menu( array( 
					
						'container' => '', 
						'items_wrap' => '%3$s',
						'theme_location' => 'primary'
													
					) ); } else {
				
					wp_list_pages( array(
					
						'container' => '',
						'title_li' => ''
					
					));
					
				} ?>
				
			 </ul>
			 <span class="ugc-project-sharingsticky">Follow Us
			 <ul class="sharingsticky-icons">
				
				<li><a class="ugc-project-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo $image;?>&description=<?php the_title();?>" target="_blank" title="Pin it"></a></li>
				<li><a class="ugc-project-facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank" title="Share on Facebook!"></a></li>	
				<li><a class="ugc-project-twitter" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Tweet this page on Twitter"></a></li>
				<li><a class="ugc-project-tumblr" href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" target="_blank" title="Share this page on Tumblr"></a></li>
				<li><a class="ugc-project-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"onclick="javascript:window.open(this.href,
				'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false; "title="Auf Google+ teilen!"></a>
				</li>	
			</ul>
			</span>
		</div>
	<?php endif; ?>	
		<div class="sidebar">
		<div class="mobile-navigation">
	
			<ul class="mobile-menu">
						
				<?php if ( has_nav_menu( 'mobile' ) ) {
																	
					wp_nav_menu( array( 
					
						'container' => '', 
						'items_wrap' => '%3$s',
						'theme_location' => 'mobile'
													
					) ); } else {
				
					wp_list_pages( array(
					
						'container' => '',
						'title_li' => ''
					
					));
					
				} ?>
				
			 </ul>
		 
		</div> <!-- /mobile-navigation -->
		
			<?php if ( get_theme_mod( 'fukasawa_logo' ) ) : ?>
			
		        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
		        	<img src='<?php echo esc_url( get_theme_mod( 'fukasawa_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
		        </a>
		
			<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>
		
				<h1 class="blog-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
				</h1>
				
			<?php endif; ?>
			<div class="ugc-project-mobile-follow">
				Follow Us
				<ul>
					<li><a class="ugc-project-instagram" href="<?php echo $social_follow_instagram; ?>" target="_blank" title="Follow us on Instagram!"></a></li>
					<li><a class="ugc-project-pinterest" href="<?php echo $social_follow_pinterest; ?>" target="_blank" title="Follow us on Pinterest!"></a></li>
					<li><a class="ugc-project-facebook" href="<?php echo $social_follow_facebook; ?>" target="_blank" title="Follow us on Facebook!"></a></li>	
					<li><a class="ugc-project-twitter" href="<?php echo $social_follow_twitter; ?>" target="_blank" title="Follow us on Twitter"></a></li>
					<li><a class="ugc-project-tumblr" href="<?php echo $social_follow_tumblr; ?>" target="_blank" title="Follow us on Tumblr!"></a></li>
					<li><a class="ugc-project-google" href="<?php echo $social_follow_googleplus; ?>" title="Follow us on Google+!"></a>
					</li>	
				</ul>
			</div>
			<a class="nav-toggle hidden" title="<?php _e('Click to view the navigation','fukasawa') ?>" href="#">
			
				<div class="bars">
				
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
					
					<div class="clear"></div>
				
				</div>
				
				<p>
					<span class="menu"><?php _e('Menu','fukasawa') ?></span>
					<span class="close"><?php _e('Close','fukasawa') ?></span>
				</p>
			
			</a>
			
			<ul class="main-menu">
				
				<?php if ( has_nav_menu( 'primary' ) ) {
																	
					wp_nav_menu( array( 
					
						'container' => '', 
						'items_wrap' => '%3$s',
						'theme_location' => 'primary'
													
					) ); } else {
				
					wp_list_pages( array(
					
						'container' => '',
						'title_li' => ''
					
					));
					
				} ?>
				
			 </ul>
			 
			 <div class="widgets">
			 
			 	<?php dynamic_sidebar('sidebar'); ?>
				
						 <div class="widget">
				<h3 class="widget-title">Follow Us</h3>
				<ul class="ugc-project-frontpage-sharing">
					<?php
					if ( $social_follow_instagram ) {
						?>
						<li><a class="ugc-project-instagram" href="<?php echo $social_follow_instagram; ?>" target="_blank" title="Follow us on Instagram!"></a></li>
					<?php }
					if ( $social_follow_pinterest ) {
						?>
						<li><a class="ugc-project-pinterest" href="<?php echo $social_follow_pinterest; ?>" target="_blank" title="Follow us on Pinterest!"></a></li>
					<?php }
					if ( $social_follow_facebook ) {
						?>
						<li><a class="ugc-project-facebook" href="<?php echo $social_follow_facebook; ?>" target="_blank" title="Follow us on Facebook!"></a></li>	
					<?php }
					if ( $social_follow_twitter ) {
						?>
						<li><a class="ugc-project-twitter" href="<?php echo $social_follow_twitter; ?>" target="_blank" title="Follow us on Twitter"></a></li>
					<?php }					
					if ( $social_follow_tumblr ) {
						?>
						<li><a class="ugc-project-tumblr" href="<?php echo $social_follow_tumblr; ?>" target="_blank" title="Follow us on Tumblr!"></a></li>
					<?php }					
					if ( $social_follow_googleplus ) {
						?>
						<li><a class="ugc-project-google" href="<?php echo $social_follow_googleplus; ?>" title="Follow us on Google+!"></a>
					</li>
					<?php }					
				?>
				</ul>
			</div>	
			 
			 </div>

			 
			 <div class="credits">
			 
			 	<p>&copy; <?php echo date("Y") ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>.</p>
			 	
			 </div>
			
			 <div class="clear"></div>
							
		</div> <!-- /sidebar -->
	
		<div class="wrapper" id="wrapper">