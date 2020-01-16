<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saaspik
 */

if ( ! is_active_sidebar( 'blog_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar-widget-area">
	<?php dynamic_sidebar( 'blog_sidebar' ); ?>
</aside><!-- #secondary -->
