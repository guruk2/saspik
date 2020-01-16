<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saaspik
 */

?>

</div><!-- #content -->

	<?php

		$meta = get_post_meta( get_the_ID(), 'saaspik_page_options', true );
		$metaR  = isset( $meta['meta_saaspik_footer_style']) ?  $meta['meta_saaspik_footer_style'] : '';
		$opt = saaspik_option('saaspik_footer_style', 'style_one');

		$footer_style = $metaR ? $metaR : $opt;

		if ( $footer_style == 'style_one' )  {
			get_template_part( 'template-parts/footer/footer-one' );
		} elseif ( $footer_style == 'style_two') {
			get_template_part( 'template-parts/footer/footer-two' );
		} 
	?>

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>


