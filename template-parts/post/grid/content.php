<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saaspik
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-post-grid grid-item'); ?>>
	<div class="features-image">
		<?php saaspik_post_thumbnail(); ?>
	</div><!-- /.features-image -->

	<div class="blog-content">
		<header class="entry-header">
			<?php	
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php saaspik_posted_on();	?>
				</div><!-- .entry-meta -->
			<?php 
			endif;

				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				
				echo posted_meta_on();

			 ?>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			
			<?php
		 	// Page Break		
				if(is_singular()) {
					wp_link_pages(); 
				}
			?>

		</div><!-- .entry-content -->
	</div><!-- /.entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
