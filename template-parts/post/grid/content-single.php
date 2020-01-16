<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saaspik
 */

 
$meta_data = saaspik_option('saaspik_single_display_meta');	

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post entry'); ?>>

	<?php saaspik_post_thumbnail(); ?>
	
	<div class="blog-content">

		<div class="entry-content">
			<?php
				the_content(); 

				// Page Break
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', '_themename' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				));
			?>
			
			<?php if ( in_array( 'tag', (array) $meta_data ) ) { ?>
				<div class="entry-footer clearfix">				
					<div class="tagcloud">
						<?php saaspik_posted_tag(); ?>
					</div>				
				</div>	
			<?php } ?>

		</div>

	</div><!-- /.entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( saaspik_option('saaspik_share_post') == 1 && function_exists('saaspik_social_share') ) {
	echo '<div class="blog-share">';
	echo '<div class="share-title">';
	echo '<p>'. esc_html__( 'Share:', '_themename' ) .'</p>';
	echo '</div>';
	echo saaspik_social_share();
	echo '</div>';
}
