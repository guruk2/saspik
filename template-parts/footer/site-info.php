<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage saaspik
 * @since 1.0
 * @version 1.0
 */
$class = is_active_sidebar( 'site_info_menu' ) ? 'd-flex' : 'flex-none';
?>

<div class="site-info <?php echo esc_attr($class); ?>">
	<div class="copyright">
		<p>
			<?php
				$copy_text = saaspik_option('copyright_text');

				if ( ! empty( $copy_text ) ) {
					echo wp_kses_post( $copy_text );
				} else {
					
					echo sprintf(
						esc_html__( '&copy; %1$s %2$s - All Rights Reserved Design by %3$s', '_themename' ),
						date( 'Y' ),
						get_bloginfo( 'name' ),
						'<a href="' . esc_url( 'https://www.pixelsigns.art/' ) . '">' . esc_attr( 'PixelSigns' ) . '</a>'
					);
				}
				?>
			</p>
	</div>

	
	
	<?php if ( is_active_sidebar( 'site_info_menu' ) ): ?>
		<div class="site-info-menu">
			<?php dynamic_sidebar( 'site_info_menu' ); ?>
		</div>
	<?php 
		endif; 
	?>

</div>