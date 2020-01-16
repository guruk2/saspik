<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saaspik
 */



$style = apply_filters( '_themename_blog_style', cs_get_option( 'blog-style' ) );

if ( $style == 'masonry' ) { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

		<?php saaspik_post_thumbnail(); ?>

		<div class="blog-content">
			<header class="entry-header">
				<?php

				if ( 'post' === get_post_type() ) : ?>				
					<div class="post-meta">
						<?php saaspik_posted_on();	?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">			

				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>


				<p>
					<?php echo saaspik_substring( get_the_content(), 10, '...'); ?>
				</p>

				<footer class="blog-footer">
					<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read More', '_themename'); ?><i class="ei ei-arrow_right"></i></a>
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
<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

		<?php saaspik_post_thumbnail(); ?>

		<div class="blog-content">
			<header class="entry-header">
				<?php

				if ( 'post' === get_post_type() ) : ?>				
					<div class="post-meta">
						<?php
						saaspik_posted_on();
						saaspik_posted_comments();
						?>
					</div><!-- .entry-meta -->

					<div class="categories">
						<?php saaspik_entry_cat(); ?>				
					</div>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

				<p>
					<?php echo saaspik_substring( get_the_content(), 40, '...'); ?>
				</p>

				<footer class="blog-footer">
					<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read More', '_themename'); ?><i class="ei ei-arrow_right"></i></a>

					<div class="author">				
						<?php saaspik_posted_by(); ?>				
					</div>
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
<?php }
