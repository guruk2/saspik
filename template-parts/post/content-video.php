<?php 
$style = saaspik_option( 'blog-style' );
$content = apply_filters('the_content', get_the_content());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<?php if(get_the_post_thumbnail() !== '' && (empty(saaspik_get_embeded_things($content)) || is_single())) { ?>
		
		<div class="post-thumbnail">
			<?php the_post_thumbnail('large'); ?>
		</div>

	<?php } ?>

	<?php if(!is_single() && !empty(saaspik_get_embeded_things($content))) { ?>
		<div class="feature-video">			
			<?php echo saaspik_get_embeded_things($content); ?>
		</div>
	<?php 

} ?>
	
	<div class="blog-content">
		<header class="entry-header">
			<?php

			if ( 'post' === get_post_type() ) : ?>				
				<div class="post-meta">
					<?php
					if ( $style == 'list' ) {							
						if ( 'post' === get_post_type() ) : ?>				
						<ul class="post-meta">
							<li><?php saaspik_posted_on(); ?></li>						
							<li><?php saaspik_comment_count(get_the_ID()); ?></li>
							<li><?php saaspik_entry_cat(); ?></li>
						</ul><!-- .entry-meta -->
					<?php endif; 
					} else {
						saaspik_posted_on();
						saaspik_posted_comments();
					}
					?>
				</div><!-- .entry-meta -->

			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">			

			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<?php
			if ( $style == 'grid' ) { ?>
				<p>
					<?php echo saspik_substring( get_the_content(), 7, '...'); ?>
				</p>
			<?php } else { ?>
				<p>
					<?php echo saspik_substring( get_the_content(), 25, '...'); ?>
				</p>
			<?php } ?>
			<footer class="blog-footer">
				<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read More', '_themename'); ?><i class="ei ei-arrow_right"></i></a>
			</footer>

			<?php 
				// Page Break
			wp_link_pages(); 	
			?>

		</div>

	</div><!-- /.entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
