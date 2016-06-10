<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
																		
		<title><?php wp_title('|', true, 'right'); ?></title>
				
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		 
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
	<?php if ( get_theme_mod( 'show_sticky_header' ) == 1 ) { ?>
		<div class="sticky-navbar">
			<?php if ( get_option( 'fukasawa_logo' ) ) { ?>
			
		        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
		        	<img src='<?php echo esc_url( get_option( 'fukasawa_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
		        </a>
		
			<?php } elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) { ?>
		
				<h1 class="blog-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
				</h1>
			<?php } ?>	
			<ul class="main-menu stickymenu">					
				<?php if ( has_nav_menu( 'primary' ) ) {
				?>	

					<?php												
					wp_nav_menu( array( 
					
						'container' => '', 
						'items_wrap' => '%3$s',
						'theme_location' => 'primary'
													
					) ); } else {
				
					wp_list_pages( array(
					
						'container' => '',
						'title_li' => ''
					
					)); ?>
				
				<?php } ?>	
			</ul>	
			 <span class="naoto-followsticky"><?php _e( 'Follow Us', 'naoto' ); ?>
			 <div class="followsticky-icons">
				<?php echo naoto_follow_links(); ?>
			</div>
			</span>
		</div>
		<?php } ?>
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
		
			<?php if ( get_option( 'fukasawa_logo' ) ) : ?>
			
		        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
		        	<img src='<?php echo esc_url( get_option( 'fukasawa_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
		        </a>
		
			<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>
		
				<h1 class="blog-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
				</h1>
				
			<?php endif; ?>
			<div class="naoto-mobile-follow">
				<?php _e( 'Follow Us', 'naoto' ); ?>
				
				<div class="naoto-mobile-follow-icons">
					<?php echo naoto_follow_links(); ?>
				</div>
			</div>
			<a class="nav-toggle hidden" title="<?php _e('Click to view the navigation','naoto') ?>" href="#">
			
				<div class="bars">
				
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
					
					<div class="clear"></div>
				
				</div>
				
				<p>
					<span class="menu"><?php _e('Menu','naoto') ?></span>
					<span class="close"><?php _e('Close','naoto') ?></span>
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
				<h3 class="widget-title"><?php _e( 'Follow Us', 'naoto' ); ?></h3>
				<div class="naoto-frontpage-follow">
					<?php echo naoto_follow_links(); ?>
				</div>
			</div>	
	
			 </div>

			 
			 <div class="credits">
			 
			 	<p>&copy; <?php echo date("Y") ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>.</p>
			 	
			 </div>
			
			 <div class="clear"></div>
							
		</div> <!-- /sidebar -->
	
		<div class="wrapper" id="wrapper">