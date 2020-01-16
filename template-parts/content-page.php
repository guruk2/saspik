<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saaspik
 */


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	$options = get_option( '_themename_framework' );
	$header  = saaspik_option('saaspik_header');
	
	// $header = apply_filters( 'attome_header_layout', cs_get_option( 'saaspik_header' ) );
	$meta = get_post_meta( get_the_ID(), 'saaspik_page_options', true );
	$metaR  = isset( $meta['page_header']) ?  $meta['page_header'] : '';



	if ($metaR == 'disabled') { ?>
		<div class="page-header-title">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div><!-- .entry-header -->
	<?php }
	
	saaspik_post_thumbnail(); 
	
	
	?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_themename' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
