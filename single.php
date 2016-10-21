<?php
/**
 * @package		Naoto
 * @version		1.0.0
 * @desc		single.php - Template for single posts		
 * @author		Anders Norén, except annotated sections below by AFB
 * @link		https://github.com/techpressrocks/naoto-techpressrocks
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>
<?php get_header(); ?>

<div class="content thin">
											        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
		
			<?php $post_format = get_post_format(); ?>
			
			<?php if ( $post_format == 'video' ) : ?>
			
				<?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
		
					<div class="featured-media">
					
						<?php
								
							// Fetch post content
							$content = get_post_field( 'post_content', get_the_ID() );
							
							// Get content parts
							$content_parts = get_extended( $content );
							
							// oEmbed part before <!--more--> tag
							$embed_code = wp_oembed_get($content_parts['main']); 
							
							echo $embed_code;
						
						?>
					
					</div> <!-- /featured-media -->
				
				<?php endif; ?>
				
			<?php elseif ( $post_format == 'gallery' ) : ?>
			
				<div class="featured-media">	
	
					<?php fukasawa_flexslider('post-image'); ?>
					
					<div class="clear"></div>
					
				</div> <!-- /featured-media -->
							
			<?php elseif ( has_post_thumbnail() ) : ?>

			<div class="single-portfoliooverlay featured-media">
				<div class="naoto-single-sharing">
					<span><a class="naoto-single-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php the_title();?>" target="_blank" title="Pin it"></a></span>
					<span><a class="naoto-single-facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank" title="Share on Facebook!"></a></span>	
					<span><a class="naoto-single-twitter" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Tweet this page on Twitter"></a></span>
					<span><a class="naoto-single-tumblr" href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>&name=<?php the_title(); ?>&description=<?php the_title(); ?>" target="_blank" title="Share this page on Tumblr"></a></span>
					<span><a class="naoto-single-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"onclick="javascript:window.open(this.href,
					'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false; "title="Share this page on Google+!"></a>
					</span>
				</div>			
	<?php the_post_thumbnail('post-image'); ?>
</div> <!-- /featured-media -->
					
			<?php endif; ?>
			
			<div class="post-inner">
				<div class="post-meta-bottom">
				
					<?php 
				    	$args = array(
							'before'           => '<div class="clear"></div><p class="page-links"><span class="title">' . __( 'Pages:','naoto' ) . '</span>',
							'after'            => '</p>',
							'link_before'      => '<span>',
							'link_after'       => '</span>',
							'separator'        => '',
							'pagelink'         => '%',
							'echo'             => 1
						);
			    	
			    		wp_link_pages($args); 
					?>
					<?php
					/**
					* Add output of custom field "cf_uploadername" (see AFB User Image Upload)
					* @param $uploader_name
					* @author AFB
					*/
					?>				
					<ul>
						<li class="post-date"><a href="<?php the_permalink(); ?>"><?php the_date(get_option('date_format')); ?></a></li>
						<?php if (has_category()) : ?>
							<li class="post-categories"><?php _e('In','naoto'); ?> <?php the_category(', '); ?></li>
						<?php endif; ?>
						<?php if (has_tag()) : ?>
							<li class="post-tags"><?php the_tags('', ' '); ?></li>
						<?php endif; ?>
						<li>
							<?php if ( get_post_meta( get_the_ID(), 'cf_uploadername', true ) ) { 
							$uploader_name = get_post_meta( get_the_ID(), 'cf_uploadername', true );
							settype($uploader_name, 'string');
							printf( __( 'Uploaded by: %s', 'naoto' ), $uploader_name);
							}
						?>		
						</li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- /post-meta-bottom -->				
				<div class="post-header">
													
					<h1 class="post-title"><?php the_title(); ?></h1>
															
				</div> <!-- /post-header -->
				    
			    <div class="post-content">
			    
			    	<?php 
						if ($post_format == 'video') { 
							$content = $content_parts['extended'];
							$content = apply_filters('the_content', $content);
							echo $content;
						} else {
							the_content();
						}
					?>
			    
			    </div> <!-- /post-content -->
			    
			    <div class="clear"></div>
				
	
			</div> <!-- /post-inner -->
			
			<?php
				$prev_post = get_previous_post();
				$next_post = get_next_post();
			?>
			
			<div class="post-navigation">
			
				<?php
				if (!empty( $prev_post )): ?>
				
					<a class="post-nav-prev" title="<?php _e('Previous post', 'naoto'); echo ': ' . esc_attr( get_the_title($prev_post) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">
						<p>&larr; <?php _e('Previous post', 'naoto'); ?></p>
					</a>
				<?php endif; ?>
				
				<?php
				if (!empty( $next_post )): ?>
					
					<a class="post-nav-next" title="<?php _e('Next post', 'naoto'); echo ': ' . esc_attr( get_the_title($next_post) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">					
						<p><?php _e('Next post', 'naoto'); ?> &rarr;</p>
					</a>
			
				<?php endif; ?>
				
				<div class="clear"></div>
			
			</div> <!-- /post-navigation -->
								
			<?php comments_template( '', true ); ?>
		
		</div> <!-- /post -->
									                        
   	<?php endwhile; else: ?>

		<p><?php _e( 'We could not find any posts that matched your query. Please try again.', 'naoto'); ?></p>
	
	<?php endif; ?>    

</div> <!-- /content -->
		
<?php get_footer(); ?>