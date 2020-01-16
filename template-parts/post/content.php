<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saaspik
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('entry-post'); ?>>

	<?php saaspik_post_thumbnail(); ?>

	<div class="blog-content">
		<header class="entry-header">
			<?php

			if ( 'post' === get_post_type() ) : ?>				
				<ul class="post-meta">
					<li><?php saaspik_posted_on(); ?></li>						
					<li><?php saaspik_comment_count(get_the_ID()); ?></li>
					<li><?php saaspik_entry_cat(); ?></li>
				</ul><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">			

			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<p>
				<?php echo saspik_substring( get_the_content(), 30, '...'); ?>
			</p>

			<footer class="blog-footer">
				<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read More', '_themename'); ?><i class="ei ei-arrow_right"></i></a>
				<?php echo posted_meta_on();?>
			</footer>
			
			<?php
			// Page Break

			if(is_singular()) {
				wp_link_pages(); 
			}
			?>


		</div>

	</div><!-- /.entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

