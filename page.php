<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saaspik
 */


// Get Page layout
$meta = get_post_meta( get_the_ID(), 'saaspik_page_options', true );

$content_class= 'col-lg-12';

// Render columns number
if ( isset( $meta['page-layout'] ) ) {
	switch ( $meta['page-layout'] ) {
		case 'left-sidebar' :
			$content_class = 'col-lg-8';
			$sidebar_class = 'col-lg-4 first-lg';
		break;

		case 'right-sidebar' :
			$content_class = 'col-lg-8';
			$sidebar_class = 'col-lg-4';
		break;

		case 'no-sidebar' :
			$content_class = 'col-lg-12';
			$sidebar_class = '';
		$class = '';
		default:
			$content_class = 'col-lg-12';
		break;
	}
}

get_header();

?>

<div id="primary" class="page-content">
	<main id="main" class="site-main">
		<div class="container">	
			<div class="row">
				<div class="<?php echo esc_attr( $content_class ); ?>">	
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div><!-- /.col-lg-9 -->



			<?php if ( isset( $meta['page-layout'] ) && $meta['page-layout'] != 'no-sidebar' ) { ?>
				<div class="<?php echo esc_attr( $sidebar_class ); ?>" role="main">
					
					<?php if ( is_active_sidebar('blog_sidebar') ) {
						get_sidebar();
					} ?>

				</div>
			<?php } ?>

		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();