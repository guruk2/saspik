<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saaspik
 */

// Get blog layout

$layout = saaspik_option('blog-layout');	
$class = is_active_sidebar( 'blog_sidebar' ) ? 'col-lg-8' : 'full-width';

if ( $layout == 'left-sidebar' ) {
	$content_class = $class;
	$sidebar_class = 'col-lg-4 first-lg';
} elseif ( $layout == 'right-sidebar' ) {
	$content_class = $class;
	$sidebar_class = 'col-lg-4';
} elseif ( $layout == 'no-sidebar' ){
	$content_class = 'full-width';
	$sidebar_class = '';
	$class = '';
}else {
	$content_class = $class;
	$sidebar_class = 'col-lg-4';
}

get_header();

?>

<div id="primary" class="page-content">
	<main id="main" class="site-main">
		<div class="blog-container">
			<div class="container">				
				<div class="row">
					<div class="<?php echo esc_attr( $content_class ); ?>">						
						<div class="post-single post-wrapper"> 
							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/post/content', 'single' ); ?>		

							<?php endwhile; ?>
							
							
							<?php 
							get_template_part( 'template-parts/author-box' );	

							if ( comments_open() || get_comments_number() ) : 
								// If comments are open or we have at least one comment, load up the comment template.					
								comments_template();
							endif;

							?>
							
							</div>

						</div><!-- /.col-lg-9 -->

						<?php if ( 'no-sidebar' != $layout ) { ?>
							<div class="<?php echo esc_attr( $sidebar_class ); ?>">
								<?php get_sidebar(); ?>
							</div><!-- .jas-col-md-3 -->
						<?php } ?>

					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.blog-container -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
