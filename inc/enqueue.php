<?php 
/**
 * Enqueue scripts and styles.
 */

function _themename_scripts() {
	wp_enqueue_style('bootstrap',get_parent_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '4.3.1', 'all');
	wp_enqueue_style('font-awesome',get_parent_theme_file_uri('/assets/css/font-awesome.min.css'), array(), '4.0.0', 'all');
	wp_enqueue_style('animate',get_parent_theme_file_uri('/assets/css/animate.css'), array(), '4.0.0', 'all');
	wp_enqueue_style('elegant-icons', get_template_directory_uri() . '/assets/css/elegant-icons.min.css', false, '1.0.0' );
	wp_enqueue_style('themeify-icons', get_template_directory_uri() . '/assets/css/elegant-icons.min.css', false, '1.0.0' );	
	wp_enqueue_style('swiper',get_parent_theme_file_uri('/assets/css/swiper.min.css'), array(), '4.0.0', 'all');
	wp_enqueue_style('magnific-popup',get_parent_theme_file_uri('/assets/css/magnific-popup.css'), array(), '4.0.0', 'all');	
	wp_enqueue_style('loader',get_parent_theme_file_uri('/assets/css/loader.min.css'), array(), '4.0.0', 'all');	
	wp_enqueue_style('_themename-style',get_parent_theme_file_uri('/assets/css/app.css'), array(), '1.0.0', 'all');
	wp_enqueue_style( '_themename-fonts', _themename_enqueue_fonts_url(), array(), null );


	// Preloader CSS
	$preloader_opt = saaspik_option('preloader');
	$preloader_color_opt = saaspik_option('saaspik_preloader_color');
	$map_api = saaspik_option('saaspik-map-api');
	$map_api_region = saaspik_option('saaspik-map-api-region');

	if ( ! empty( $preloader_opt ) ) {
		$color = ( !empty( $preloader_color_opt ) ) ? $preloader_color_opt : 'rgba(0,0,0,0.97)';

		$preloader_css = '
			#preloader {
				position: fixed;
				top: 0;
				left: 0;
				bottom: 0;
				right: 0;
				background-color: ' . esc_attr( $color ) . ';
				z-index: 9999999;
			}

			#loader {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}';
		
		wp_add_inline_style( '_themename-style', $preloader_css );
	}

	$logo_width = saaspik_option('logo_width');
	$logo_width_mobile = saaspik_option('logo_width_mobile');



	if ( ! empty( $logo_width ) ) {

		$logo_width_css = '
			.site-header .header-inner .site-logo a {		
				max-width: ' . esc_attr( $logo_width ) . 'px;			
			}';
		
		wp_add_inline_style( '_themename-style', $logo_width_css );
	}

	if ( ! empty( $logo_width_mobile ) ) {

		$logo_mob_width_css = '
			@media (max-width: 991px) {
				.header-inner .site-mobile-logo .logo {		
					max-width: ' . esc_attr( $logo_width_mobile ) . 'px;			
				}
			}';
		
		wp_add_inline_style( '_themename-style', $logo_mob_width_css );
	}


	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true );	
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '5.7.0', true );
	wp_enqueue_script( 'header', get_template_directory_uri() . '/assets/js/header.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array(), '1.0.0', true );
	wp_enqueue_script( 'countup', get_template_directory_uri() . '/assets/js/countUp.min.js', array(), '1.0.0', true );
	wp_register_script( 'jquery-swiper', get_template_directory_uri() . '/assets/js/swiper.jquery.min.js', array('jquery'), '3.4.2', true );	
	wp_register_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'gmap3', get_template_directory_uri() . '/assets/js/gmap3.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-parallax-scroll', get_template_directory_uri() . '/assets/js/jquery.parallax-scroll.js', array(), '1.0.0', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), '1.0.0', true );


	if(saaspik_option('smooth_scroll')) {
		wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.min.js', false, '1.0.0', true );
	}


	$query_args = array(
		'key' => $map_api,
		'region' => $map_api_region,
	);

	$map_url = add_query_arg( $query_args, 'https://maps.googleapis.com/maps/api/js' );

	// Google Map API
	wp_register_script('gmap-api',esc_url( $map_url ), array(), null,true);

	wp_enqueue_script( '_themename-main', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', '_themename_scripts' );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function saaspik_admin_style() {
	wp_enqueue_style( 'ei-icon', get_template_directory_uri() . '/assets/css/elegant-icons.min.css', false, '1.0.0' );
}

add_action( 'admin_enqueue_scripts', 'saaspik_admin_style' );

add_action( 'enqueue_block_assets', function() {
    wp_enqueue_style( '_themename-fonts', _themename_enqueue_fonts_url(), array(), null );
});




