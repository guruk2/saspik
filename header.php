<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saaspik
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( '_themename_after_body' ); ?>

	<?php
	$opt = saaspik_option('saaspik_back_to_top', false);

	if ( $opt == true ) : ?>
		<a href="#site-content" data-type="section-switch" class="return-to-top"><i class="fa fa-chevron-up"></i></a>
	<?php endif; ?>


<div id="site-content" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_themename' ); ?></a>
	
	<?php 
		get_template_part('template-parts/popup-search');
		saaspik_header();

		if (  !is_front_page()  && is_page() || is_archive() || is_home() || is_search() ) {
			get_template_part( 'template-parts/banner' );
		} elseif (is_singular('post')) {
			get_template_part( 'template-parts/banner', 'post' );
		} elseif (is_singular('saaspik_portfolio')) {
			get_template_part( 'template-parts/banner', 'portfolio' );
		}

	?>			

	<div id="content" class="site-content">


<?php 

