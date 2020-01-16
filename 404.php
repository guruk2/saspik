<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package saaspik
 * by PixelSigns
 */

$default      = get_template_directory_uri() . '/assets/images/error.png';
$error_img    = saaspik_option( 'saaspik_error_img', $default );
$error_title 	= saaspik_option( 'error_title');
$error_subtitle = saaspik_option( 'error_subtitle');
$error_content 	= saaspik_option( 'error_content' );

$image= !empty($error_img) ? $error_img : $default;


get_header();

?>


<section class="error-page">
	<div class="container">
		<div class="error-content-wrapper text-center">
			<div class="error-content">
				<img src="<?php echo esc_url($image); ?>" alt="error">

				<h2 class="error-title"><?php echo esc_html($error_title); ?></h2>

				<p><?php echo esc_html($error_subtitle); ?></p>

				<a href="<?php echo esc_url(get_site_url()); ?>" class="pix-btn"><?php echo esc_html__('Back to Homepage', '_themename') ?></a>
			</div>
			<!-- /.error-content -->
		</div>
		<!-- /.error-content-wrapper -->
	</div>
	<!-- /.container -->
</section>
<!-- /.error-page -->


<?php

get_footer();

