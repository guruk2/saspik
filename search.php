<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package saaspik
 */

$blogPageId = get_option( 'page_for_posts' ); // this will throw an error when this is empty or not set as static front page and blog page.


if (is_home() && ! is_front_page() && ! empty($blogPageId) ) {
	$meta = get_post_meta($blogPageId, 'saaspik_page_options', true );
}

$class = is_active_sidebar( 'blog_sidebar' ) ? 'col-lg-8' : 'full-width';
$layout = saaspik_option('blog-layout');


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


// Blog style
$class= $classes = $data = $sizer = '';

$style = saaspik_option( 'blog-style', 'list');
$sidebar = saaspik_option( 'blog-layout' );


if ( $style == 'grid' && $layout !== 'no-sidebar') {
	$class = 'saaspik-masonry';
} elseif ( $style == 'grid' && $layout == 'no-sidebar') {
	$class = 'saaspik-masonry column-4';
}


get_header();

?>

<div id="primary" class="page-content">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr( $content_class ); ?>">

					<div class="post-wrapper <?php echo esc_attr( $class ); ?>">
						<?php if ( have_posts() ) : ?>



						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();	?>
							<div class="search-page">
								<?php get_template_part( 'template-parts/content', 'search' ); ?>
							</div>
						<?php

						endwhile;

					    saaspik_post_pagination();

						else :
							get_template_part( 'template-parts/post/content', 'none' );
						endif;
					?>
					</div><!-- .posts -->


				</div><!-- /.col-lg-8 -->

                <?php if ( 'no-sidebar' != $layout ) { ?>
					<div class="<?php echo esc_attr( $sidebar_class ); ?>">
						<?php get_sidebar(); ?>
					</div><!-- .col-md-4 -->
				<?php } ?>

			</div><!-- /.row -->
		</div><!-- /.container -->

	</main><!-- #main -->
</div><!-- #primary -->
<?php


get_footer();
