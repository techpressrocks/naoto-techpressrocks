<div class="post-container">

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php if ( has_post_thumbnail() ) : ?>
		
			<a class="featured-media" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">	
				
				<?php the_post_thumbnail('post-thumb'); ?>
				
			</a> <!-- /featured-media -->
				
		<?php endif; ?>
		<?php if ( get_post_meta( get_the_ID(), 'cf_uploadername', true ) ) { 
			$uploader_name = get_post_meta( get_the_ID(), 'cf_uploadername', true );
			settype($uploader_name, 'string');
			?>
			<div class="fukasawa-techpress-uploadername">
			<?php printf( __( 'Uploaded by: %s', 'fukasawa' ), $uploader_name);
			?>
			</div>
		<?php }
		?>
			<div class="fukasawa-techpress-category">
			<?php
			$categories_list = get_the_category_list( __( ', ', 'fukasawa' ) );
			printf( __( '%1$s', 'gridster' ), $categories_list ); ?>
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
<ul class="ugc-project-frontpage-sharing">
	<li><a class="ugc-project-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo $image;?>&description=<?php the_title();?>" target="_blank" title="Pin it"></a></li>
	<li><a class="ugc-project-facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank" title="Share on Facebook!"></a></li>	
	<li><a class="ugc-project-twitter" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Tweet this page on Twitter"></a></li>
	<li><a class="ugc-project-tumblr" href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" target="_blank" title="Share this page on Tumblr"></a></li>
	<li><a class="ugc-project-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false; "title="Auf Google+ teilen!"></a>
	</li>	
</ul>
	</div> <!-- /post -->
</div> <!-- /post-container -->