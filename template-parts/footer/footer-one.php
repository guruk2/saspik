<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage saaspik
 * @since 1.0
 * @version 1.0
 */

?>


<footer id="site_footer" class="site-footer">

	<div class="container">
		<?php
		if ( is_active_sidebar( 'footer_widget_01' ) ||
			is_active_sidebar( 'footer_widget_02' ) ||
			is_active_sidebar( 'footer_widget_03' ) ||
			is_active_sidebar( 'footer_widget_04' ) ) :
			?>
		<div class="footer-wrapper">
		     <div class="overlay-bg"></div>
			<aside class="widget-area row">
				<?php
					$area_1_display = get_theme_mod( 'saaspik_widget_area_1_display',  true );
					$area_1_column = get_theme_mod( 'saaspik_widget_area_1_column', 'col-lg-3 col-md-6' );
					if ( is_active_sidebar( 'footer_widget_01' )  && $area_1_display == true ) {
				?>
					<div class="widget-column footer-widget-1 <?php echo esc_attr( $area_1_column ); ?>">
						<?php dynamic_sidebar( 'footer_widget_01' ); ?>
					</div>
				<?php }
					$area_2_display = get_theme_mod( 'saaspik_widget_area_2_display', true );
					$area_2_column = get_theme_mod( 'saaspik_widget_area_2_column', 'col-lg-3 col-md-6' );
					if ( is_active_sidebar( 'footer_widget_02' ) && $area_2_display == true ) {
				?>
					<div class="widget-column footer-widget-2 <?php echo esc_attr( $area_2_column ); ?>">
						<?php dynamic_sidebar( 'footer_widget_02' ); ?>
					</div>
				<?php }
					$area_3_display = get_theme_mod( 'saaspik_widget_area_3_display', true );
					$area_3_column = get_theme_mod( 'saaspik_widget_area_3_column', 'col-lg-3 col-md-6' );
					if ( is_active_sidebar( 'footer_widget_03' ) && $area_3_display == true ) {
				?>
					<div class="widget-column footer-widget-3 <?php echo esc_attr( $area_3_column ); ?>">
						<?php dynamic_sidebar( 'footer_widget_03' ); ?>
					</div>
				<?php } 
				$area_3_display = get_theme_mod( 'saaspik_widget_area_4_display', true );
					$area_3_column = get_theme_mod( 'saaspik_widget_area_4_column', 'col-lg-3 col-md-6' );
					if ( is_active_sidebar( 'footer_widget_04' ) && $area_3_display == true ) {
				?>
					<div class="widget-column footer-widget-3 <?php echo esc_attr( $area_3_column ); ?>">
						<?php dynamic_sidebar( 'footer_widget_04' ); ?>
					</div>
				<?php } ?>
			</aside><!-- .widget-area -->	
		
		</div><!-- /.footer-wrapper -->
		<?php endif; 

		get_template_part( 'template-parts/footer/site-info' ); 

	?>	
	</div><!-- .container -->	
</footer><!-- #site-footer -->


