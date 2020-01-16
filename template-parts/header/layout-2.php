<?php
/**
 * The Header Layout 1.
 *
 * @since   2.0.0
 * @package saaspik
 */

$meta = get_post_meta( get_the_ID(), 'saaspik_page_options', true );
$logo_url = home_url( '/' );
$logo_title = get_bloginfo( 'name' );

$logo_main = saaspik_option('main_logo_two');
$logo_contrast = saaspik_option('sticky_logo_two' );

//Theme Option Logo
$main_logo = isset($logo_main['url']) ? $logo_main['url'] : '';
$sticky_logo = isset($logo_contrast['url']) ? $logo_contrast['url'] : $main_logo;

//Meta Logo
$logo = isset($meta['meta_main_logo_two']) ? $meta['meta_main_logo_two'] : '';
$meta_sticky_logo = isset($meta['meta_sticky_logo_two']) ? $meta['meta_sticky_logo_two'] : '';

// Logo Callback
$meta_logo = !empty($logo['url']) ? $logo['url'] : $main_logo;
$meta_sticky_logo = !empty($meta_sticky_logo['url']) ? $meta_sticky_logo['url'] : $sticky_logo;

$metapar  = isset( $meta['particle_animation']) ?  $meta['particle_animation'] : '';
$particle = saaspik_option('particle_animation');
$optport = saaspik_option('page_header_portfolio_style_main');

$metaR  = isset( $meta['page_header_style']) ?  $meta['page_header_style'] : '';
$opt = saaspik_option('page_header_style_main');
?>

<header id="masthead" class="site-header header-two <?php $is_sticky_header = saaspik_option('header-sticky'); if( !empty($sticky_logo) && $is_sticky_header == '1' ) : echo 'header_trans-fixed'; endif; ?>"
	data-top="992">

	<div class="container">
		<div class="header-inner">

			<div class="site-mobile-logo">
				<a href="<?php echo esc_url(home_url('/'));?>" class="logo">
					<?php if(!empty($meta_logo)): ?>						  
						<img src="<?php echo esc_url($meta_logo);  ?>" class="main-logo cc" alt="<?php echo esc_attr(bloginfo('name')); ?>">
						<?php if(!empty($meta_sticky_logo) && $is_sticky_header): ?>
							<img src="<?php echo esc_url($meta_sticky_logo);  ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>" class="logo-sticky">
						<?php endif ?>						
					<?php else: 
						echo '<h3 class="site-title">' . get_bloginfo('name') . '</h3>';
					endif ?>						
				</a>
			</div>

			<div class="toggle-menu">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</div>

			<nav id="site-navigation" class="site-nav nav-two">
				<div class="close-menu">
					<span>close</span>
					<i class="ei ei-icon_close"></i>
				</div>

				<div class="site-logo">
					<a href="<?php echo esc_url(home_url('/'));?>" class="logo">
						<?php if(!empty($meta_logo)): ?>						  
							<img src="<?php echo esc_url($meta_logo);  ?>" class="main-logo cc" alt="<?php echo esc_attr(bloginfo('name')); ?>">
							<?php if(!empty($meta_sticky_logo) && $is_sticky_header): ?>
								<img src="<?php echo esc_url($meta_sticky_logo);  ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>" class="logo-sticky">
							<?php endif ?>						
						<?php else: 
							echo '<h3 class="site-title">' . get_bloginfo('name') . '</h3>';
						endif ?>						
					</a>
				</div>

				<div class="menu-wrapper" data-top="992">
					<?php

						if ( has_nav_menu( 'main_menu' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'main_menu',
									'menu_id'        => 'site-menu',
									'menu_class'     => 'site-main-menu',
									'container'      => false,
									'walker'         => new Saaspik_Menu_Walker(),
									'fallback_cb'    => NULL
								)
							);
						} else {
							echo '<ul class="add-menu clearfix"><li><a target="_blank" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add Menu', '_themename' ) . '</a></li></ul>';
						}

						$search_btn = saaspik_option('search-icon');
						$nav_btn = saaspik_option('nav-btn');
						$btn_link = saaspik_option('btn-link');
						$default_text = esc_html__('Button Text', '_themename');
						$btn_text = saaspik_option('btn-text');

						if($search_btn == true || $nav_btn == true): ?>
						<div class="nav-right">
							<?php if($search_btn) : ?>
							<span class="search-btn" id="search-icon">
								<i class="ei ei-icon_search"></i>
							</span>
							<?php endif;

							if($nav_btn && $btn_text) :
								echo '<a href="'.$btn_link.'" class="nav-btn">'.$btn_text.'</a>';
							endif; 
							?>
						</div>
					<?php endif; ?>
				</div><!-- #menu-wrapper -->
			</nav><!-- #site-navigation -->
		</div><!-- /.header-inner -->
	</div><!-- /.container -->
</header><!-- #masthead -->

