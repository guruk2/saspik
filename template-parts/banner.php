<?php
/**
 * Template for displaying page header
 */


$page_header = saaspik_option('saaspik_header', true);
$page_header_img = saaspik_option('saaspik_header_image');
$page_header_title = saaspik_option('saaspik_header_default_title');
$page_header_crumb = saaspik_option('saaspik_breadcrumbs');
$page_portfolio = saaspik_option('page_portfolio_title');	


$banner_disp	= true;
$banner_image	= '';
$banner_title	= get_the_title();
$banner_crumb	= false;
$banner_des_enable	= true;


if ( isset($page_header) ) {
	$banner_disp	= $page_header;
} 

if ( is_404() ) {
	$banner_disp = false;
}

if ( $page_header_crumb == true ) {
	$banner_crumb	= true;
}

if ( ! empty( $page_header_title ) ) {
	$banner_title	= $page_header_title;
}


if ( is_singular() ) {
	if ( is_singular( 'saaspik_portfolio' ) ) {

		if(! empty($page_portfolio)) {
			$banner_title	= $page_portfolio;

		} else {
			$banner_title	= esc_html__('Portfolio', '_themename');
		}

		if ( ! empty( $page_header_img_portfolio ) ) {
			$banner_image	= wp_get_attachment_url( $page_header_img_portfolio );
		}

		if ( ! empty( $page_signle_img ) ) {
			$banner_image	= wp_get_attachment_url( $page_signle_img );
		}


	} elseif (is_singular( 'post' ))  {

		if(!empty ($page_signle_title)) {
			$banner_title = $page_signle_title;
		} else {
			$banner_title = esc_html__('Blog Details', '_themename');
		}

	} else {		

		global $post;

		$meta = get_post_meta( $post->ID, 'saaspik_page_options', true );

		if ( is_array( $meta ) ) {

			if ( ! empty( $meta['custom_title'] ) ) {
				$banner_title	= $meta['custom_title'];

			} elseif (get_post_type(get_the_ID()) == 'post') {
				$banner_title = esc_html__('Blog Post', '_themename');

			}  elseif ( is_page() ) {
				$banner_title	= get_the_title( $post->ID );
			} else {
				$post_type = get_post_type_object(get_post_type());
				$banner_title	= $post_type->labels->singular_name;
			}

			if ( 'disabled' == $meta['page_header'] ) {
				$banner_disp	= false;
			} elseif ('enabled' == $meta['page_header']) {
				$banner_disp	= true;
			}

			if ( ! empty( $meta['header_image'] ) ){
				$banner_image = wp_get_attachment_url( $meta['header_image'] );
			}

			if ( $meta['breadcrumbs'] == false ) {
				$banner_crumb	= false;
			}		

		}
	}
	
}  elseif ( is_search() ) {
	if ( have_posts() ) {
		$banner_title = sprintf( esc_html__( 'Search Results for: %s', '_themename' ), '<span>' . get_search_query() . '</span>' );
	} else {
		$banner_title = sprintf( esc_html__( 'Search Results for: %s', '_themename' ), '<span>' . get_search_query() . '</span>' );
	}

} elseif ( is_archive() ) {
	$banner_title	= get_the_archive_title();

} elseif(is_home() && ! is_front_page()) {
	$postId = get_option( 'page_for_posts');
	$banner_title = 'Our Blog';

	if ( ! empty($postId) ) {
		$meta = get_post_meta( $postId, 'saaspik_page_options', true );
		if ( ! empty( $meta['custom_title'] ) ) {
			$banner_title = $meta['custom_title'];
		} else {
			$banner_title = get_the_title($postId);
		}
	}	
} elseif (is_page()){
	$banner_title = get_the_title();
} else {
	$banner_title = esc_html__('Blog', '_themename');
}

if ( $banner_disp == false )
	return;

$meta = get_post_meta( get_the_ID(), 'saaspik_page_options', true );
$metaR  = isset( $meta['page_header_style']) ?  $meta['page_header_style'] : 'partical';
$opt = saaspik_option('page_header_style_main', 'partical');

$opt = saaspik_option('page_header_style_main', 'partical');



$metapar  = isset( $meta['particle_animation']) ?  $meta['particle_animation'] : '';
$particle = saaspik_option('particle_animation', true);




if( ($opt == 'background_main' || $metaR == 'background') && $metaR !== 'partical') { ?>
	<section class="page-banner header-bg">
		<div class="overlay-bg"></div>
		<div class="container">
			<div class="page-title-wrapper">
				<h1 class="page-title"><?php echo wp_kses_post( $banner_title ); ?></h1>

				<?php 
				if ( $banner_crumb == true ) {	?>
				<div class="breadcrumb-wrapper">
					<div class="container">
						<div class="breadcrumb-inner">
							<?php _themename_get_breadcrumbs(); ?>
						</div><!-- /.breadcrumb-wrapper -->
					</div><!-- /.container -->
				</div>
				<?php } ?>
			</div>
			<!-- /.page-title-wrapper -->
		</div>
		<!-- /.container -->
	</section>
<!-- /.page-banner -->
<?php } elseif ( ($opt == 'partical_main' || $metaR == 'partical') && $metaR !== 'background') { ?>
	<section class="page-banner header-particle">
		<div class="container">
			<div class="page-title-wrapper">
				<h1 class="page-title"><?php echo wp_kses_post( $banner_title ); ?></h1>


				<?php 
				if ( $banner_crumb == true ) {	?>
				<div class="breadcrumb-wrapper">
					<div class="container">
						<div class="breadcrumb-inner">
							<?php _themename_get_breadcrumbs(); ?>
						</div><!-- /.breadcrumb-wrapper -->
					</div><!-- /.container -->
				</div>
				<?php } ?>
			</div>
			<!-- /.page-title-wrapper -->
		</div>
		<!-- /.container -->

		<?php 
			if ($particle == true || $metapar == true) { ?>
				<svg class="circle" data-parallax='{"x" : -200}' xmlns="http://www.w3.org/2000/svg"
					xmlns:xlink="http://www.w3.org/1999/xlink" width="950px" height="950px">
					<path fill-rule="evenodd" stroke="rgba(250, 112, 112, 0.051)" stroke-width="100px" stroke-linecap="butt"
						stroke-linejoin="miter" fill="none"
						d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z" />
				</svg>

				<ul class="animate-ball">
					<li class="ball"></li>
					<li class="ball"></li>
					<li class="ball"></li>
					<li class="ball"></li>
					<li class="ball"></li>
				</ul>
		<?php } ?>
	</section>
<?php } ?>
