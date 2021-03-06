<?php
/**
 * @package		Naoto
 * @version		1.0.0
 * @desc		content.php - Template for front page content (posts gallery)		
 * @author		Anders Nor�n, except annotated sections below by AFB
 * @link		https://github.com/techpressrocks/naoto-techpressrocks
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>
<div class="post-container">

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php if ( has_post_thumbnail() ) : ?>
		
			<a class="featured-media" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">	
				
				<?php the_post_thumbnail('post-thumb'); ?>
				
			</a> <!-- /featured-media -->
				
		<?php endif; ?>
		<?php
		/**
		* Add output of custom field "cf_uploadername" (see AFB User Image Upload)
		* Add output of the_category
		* @param $uploader_name
		* @author AFB
		*/
		?>
		<?php if ( get_post_meta( get_the_ID(), 'cf_uploadername', true ) ) { 
			$uploader_name = get_post_meta( get_the_ID(), 'cf_uploadername', true );
			settype($uploader_name, 'string');
			?>
			<div class="naoto-techpress-uploadername">
			<?php printf( __( 'Uploaded by: %s', 'naoto' ), $uploader_name);
			?>
			</div>
		<?php }
		?>
			<div class="naoto-techpress-category">
				<?php the_category(', '); ?>
			</div>
		<?php 
			$post_title = get_the_title();
			if ( !empty( $post_title ) ) : 
		?>
					
			<div class="post-header">
				
			    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			    	    
			</div> <!-- /post-header -->
		
		<?php endif; ?>
		
		<div class="post-excerpt">
		
			<?php the_excerpt(); ?>
		
		</div>
		
		<?php if ( empty( $post_title ) ) : ?>
			    
		    <div class="posts-meta">
		    
		    	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_time(get_option('date_format')); ?></a>
		    	
	    	</div>
	    
	    <?php endif; ?>
		<?php
		/**
		* Add custom social sharing buttons (icons generated by Font Awesome)
		* To add more services, add a new <li> list item with the necessary information. Create corresponding CSS class in style.css
		* @author AFB
		*/
		echo naoto_sharing_links(); ?>
	</div> <!-- /post -->
</div> <!-- /post-container -->