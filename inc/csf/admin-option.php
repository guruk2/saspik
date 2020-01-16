<?php 


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  	// Set a unique slug-like ID
	$prefix = 'saaspik_framework';


  	// Create options
	CSF::createOptions( $prefix, array(
		'menu_title'      => esc_html__('Theme Option', '_themename'),
		'menu_slug'       => 'saaspik-framework',
		'framework_title' => esc_html__('Saspik Theme Option', '_themename'),
		'theme'	          => 'light',
		'sticky_header'	  => 'true',
	) );

  	// General Setting
	CSF::createSection( $prefix, array(
		'title'  =>  esc_html__( 'General', '_themename' ),
		'icon'      => 'fa fa-building-o',
		'fields' => array(
			array(
				'id'    => 'preloader',
				'type'  => 'switcher',
				'title' => esc_html__( 'Enable Preloader', '_themename' ),
			),
			array(
				'id'      => 'preloader-type',
				'type'    => 'select',
				'title'   => esc_html__( 'Preloader type', '_themename' ),
				'options' => array(
					'css' 	 => esc_html__( 'CSS', '_themename' ),
					'images' => esc_html__( 'Media', '_themename' )
				),
				'dependency' => array( 'preloader', '==', true ),
			),
			array(
				'id'         => 'preloader-images',
				'type'       => 'media',
				'title'      => esc_html__( 'Preloader Image', '_themename' ),
				'add_title'  => esc_html__( 'Upload Your Image', '_themename' ),
				'dependency' => array( 'preloader|preloader-type', '==', 'true|images' ),
			),
			array(
				'id'            => 'saaspik_preloader',
				'type'          => 'select',
				'title'         => esc_html__( 'Preloader Style', '_themename' ),
				'class'         => 'chosen',
				'dependency'    => array( 'preloader|preloader-type', '==', 'true|css' ),
				'options'       => array(
					'ball-pulse-3'                  => esc_html__('Ball Pulse', '_themename' ),
					'ball-grid-pulse-9'             => esc_html__('Ball Grid Pulse', '_themename' ),
					'ball-clip-rotate-1'            => esc_html__('Ball Clip Rotate', '_themename' ),
					'ball-clip-rotate-pulse-2'      => esc_html__('Ball Clip Rotate Pulse', '_themename' ),
					'ball-clip-rotate-multiple-2'   => esc_html__('Ball Clip Rotate Multiple', '_themename' ),
					'ball-pulse-rise-6'             => esc_html__('Ball Pulse Rise', '_themename' ),
					'ball-pulse-sync-3'             => esc_html__('Ball Pulse Sync', '_themename' ),
					'ball-beat-3'                   => esc_html__('Ball Beat', '_themename' ),
					'ball-grid-beat-9'              => esc_html__('Ball Gird Beat', '_themename' ),
					'ball-rotate-1'                 => esc_html__('Ball Rotate', '_themename' ),
					'ball-zig-zag-2'                => esc_html__('Ball Zig-Zag', '_themename' ),
					'ball-zig-zag-deflect-2'        => esc_html__('Ball-Zig-Zag Deflect', '_themename' ),
					'ball-triangle-path-3'          => esc_html__('Ball Triangle Path', '_themename' ),
					'ball-scale-1'                  => esc_html__('Ball Scale', '_themename' ),
					'ball-scale-ripple-1'           => esc_html__('Ball Scale Ripple', '_themename' ),
					'ball-scale-multiple-3'         => esc_html__('Ball Scale Multiple', '_themename' ),
					'ball-scale-ripple-multiple-3'  => esc_html__('Ball Scale Ripple Multiple', '_themename' ),
					'ball-spin-fade-loader-8'       => esc_html__('Ball Spin Fade Loader', '_themename' ),
					'square-spin-1'                 => esc_html__('Square Spin', '_themename' ),
					'cube-transition-2'             => esc_html__('Cube Transition', '_themename' ),
					'line-scale-5'                  => esc_html__('Line Scale', '_themename' ),
					'line-scale-party-4'            => esc_html__('Line Scale Party', '_themename' ),
					'line-scale-pulse-out-5'        => esc_html__('Line Scale Pulse Out', '_themename' ),
					'line-scale-pulse-out-rapid-5'  => esc_html__('Line Scale Pulse Out Rapid', '_themename' ),
					'line-spin-fade-loader-8'       => esc_html__('Line Spin Fade Loader', '_themename' ),
					'triangle-skew-spin-1'          => esc_html__('Triangle Skew Spin', '_themename' ),
					'pacman-5'                      => esc_html__('Pacman', '_themename' ),
					'semi-circle-spin-5'            => esc_html__('Semi Circle Spin', '_themename' ),
				),
			),
			array(
				'id'        => 'saaspik_preloader_color',
				'title'     => esc_html__( 'Preloader background', '_themename' ),
				'type'      => 'color',
				'default'   => 'rgba(0,0,0,0.75)',
				'dependency'    => array( 'preloader', '==', 'true' ),
			),
			array(
				'id'        => 'saaspik_back_to_top',
				'type'      => 'switcher',
				'title'     => esc_html__( 'Display Back To Top Button', '_themename' ),
				'default'   => true
			),
			array(
				'id'        => 'smooth_scroll',
				'type'      => 'switcher',
				'title'     => esc_html__( 'Enable Enable/Disable Smooth Scroll', '_themename' ),
				'default'   => false
			),
			array(
				'id'       => 'custom-css',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Custom CSS Style', '_themename' ),
				'desc'     => esc_html__( 'Paste your CSS code here. Do not place any &lt;style&gt; tags in these areas as they are already added for your convenience', '_themename' ),
				'sanitize' => 'html'
			),
			array(
				'id'       => 'custom-js',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Custom JS Code', '_themename' ),
				'desc'     => esc_html__( 'Paste your Javscript code here. You can add your Google Analytics Code here. Do not place any &lt;script&gt; tags in these areas as they are already added for your convenience.', '_themename' ),
				'sanitize' => 'html'
			),
		)
	) );


  	// Header Setting
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Header', '_themename' ),
		'icon'  => 'fa fa-home',
		'fields' => array(

			array(
				'id'    => 'header-layout',
				'type'  => 'image_select',
				'title' => esc_html__( 'Header Style', '_themename' ),
				'options' => array(
					'style_one' => SAASPIK_THEME_URI . '/assets/images/layout/header-one.jpg',
					'style_two' => SAASPIK_THEME_URI . '/assets/images/layout/header-two.jpg',
					'style_three' => SAASPIK_THEME_URI . '/assets/images/layout/header-three.jpg'
				),
				'default' => 'style_one',
				'desc'       => esc_html__( 'You can choose the header style.', '_themename'),
			),

			array(
				'id'         => 'header-sticky',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Enable Header Sticky', '_themename' ),
				'default'    => true,
			),

			array(
				'id'         => 'nav-btn',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Nav Button', '_themename' ),
				'default'    => true,
			),
			array(
				'id' =>'btn-text' ,
				'type' =>'text' ,
				'title' => esc_html__('Nav Button Text', '_themename'),

			),
			array(
				'id' =>'btn-link' ,
				'type' =>'text' ,
				'title' => esc_html__('Nav Button link', '_themename'),

			),
			array(
				'id'         => 'search-icon',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Enable search icon', '_themename' ),
				'default'    => false,
			),
			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'Logo Settings', '_themename' ),
			),
			array(
				'id'        => 'main_logo',
				'type'      => 'media',
				'title'     => esc_html__( 'Main Logo', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header', '_themename' ),
				'dependency' => array( 'header-layout', '==', 'style_one' ),
			),
	
			array(
				'id'        => 'sticky_logo',
				'type'      => 'media',
				'title'     => esc_html__( 'Sticky and Inner Page Logo', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header Sticky and Inner Page.', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'dependency' => array( 'header-layout', '==', 'style_one' ),

			),
	
			array(
				'id'        => 'main_logo_two',
				'type'      => 'media',
				'title'     => esc_html__( 'Logo', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header', '_themename' ),
				'dependency' => array( 'header-layout', '==', 'style_two' ),
			),
			array(
				'id'        => 'sticky_logo_two',
				'type'      => 'media',
				'title'     => esc_html__( 'Sticky Logo', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header Sticky', '_themename' ),
				'dependency' => array( 'header-layout', '==', 'style_two' ),
			),

			array(
				'id'      => 'logo_width',
				'type'    => 'slider',
				'title'   => 'Logo Max Width',
				'min'     => 50,
				'max'     => 300,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 150,
			),

			array(
				'id'      => 'logo_width_mobile',
				'type'    => 'slider',
				'title'   => 'Logo Max Width(Mobile)',
				'min'     => 30,
				'max'     => 200,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 110,
			),  

			array(
				'type'    => 'heading',
				'content' => esc_html__( 'Header Menu Style', '_themename' ),
			),
			
			array(
				'id'        => 'menu_color',
				'type'      => 'color',
				'title'     => esc_html__( 'Menu Text Color', '_themename' ),
				'desc'      => esc_html__( 'You can change menu text color.', '_themename' ),
				'output'	=> '.site-header .site-main-menu li > a, .menu-transperant .site-header .site-main-menu li > a'
			),

			array(
				'id'        => 'menu_color_hover',
				'type'      => 'color',
				'title'     => esc_html__( 'Menu Text Hover Color', '_themename' ),
				'desc'      => esc_html__( 'You can change menu text hover color.', '_themename' ),				
				'output'	=> array( 
					'color' => '
					.site-header .site-main-menu li > a:hover, 
					.menu-transperant .site-header .site-main-menu li > a:hover, 
					.site-header .site-main-menu li > a:after,
					.site-header .site-main-menu li.current_page_item a,
					.site-header .header-inner .site-nav .nav-right .nav-btn,
					.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn,
					.site-header .header-inner .site-nav.nav-two .nav-right .nav-btn,
					.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn',

					'background' => '.site-header .site-main-menu li > a:after, 
					.site-header .site-main-menu li > a:hover:after, 
					.site-header .site-main-menu li > a.current_page:after,
					.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn:hover,
					.site-header .header-inner .site-nav.nav-two .nav-right .nav-btn:hover',

					'border-color' => '.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn,
					.site-header .header-inner .site-nav.nav-two .nav-right .nav-btn,
					.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn,
					.site-header .header-inner .site-nav.nav-two .nav-right .nav-btn:hover'
				)
			),
			array(
				'id'        => 'menu_color_dropdown',
				'type'      => 'color',
				'title'     => esc_html__( 'Menu Dropdown Text Color', '_themename' ),
				'desc'      => esc_html__( 'You can change menu text color.', '_themename' ),
				'output'	=> '.site-header .site-main-menu li .sub-menu li a, .menu-transperant .site-header .site-main-menu li .sub-menu li a'
			),

			array(
				'id'        => 'menu_color_hover_dropdown',
				'type'      => 'color',
				'title'     => esc_html__( 'Menu Dropdown Text Hover Color', '_themename' ),
				'desc'      => esc_html__( 'You can change menu text hover color.', '_themename' ),
				'output'	=> array( 
					'color' => '.site-header .site-main-menu li .sub-menu li a:hover, 
					.menu-transperant .site-header .site-main-menu li .sub-menu li a:hover,
					.site-header .site-main-menu li.current-menu-parent .current_page_item > a,
					.site-header.pix-header-fixed .header-inner .site-nav.nav-two .site-main-menu li a:hover,
					.site-header.pix-header-fixed .site-main-menu li.current_page_item a,
					.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn',

					'background' => '.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn:hover',
					'border-color' => '.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn, 
					.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn:hover'

				),
				'output_important' => true
			),

			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'Header Sticky Menu Style', '_themename' ),
			),
			
			array(
				'id'        => 'sticky_menu_color',
				'type'      => 'color',
				'title'     => esc_html__( 'Menu Text Color', '_themename' ),
				'desc'      => esc_html__( 'You can change menu text color.', '_themename' ),
				'output'	=> '.site-header.pix-header-fixed .site-main-menu li a, .site-header.pix-header-fixed .site-main-menu li .sub-menu li a'
			),

			array(
				'id'        => 'sticky_menu_color_hover',
				'type'      => 'color',
				'title'     => esc_html__( 'Menu Text Hover Color', '_themename' ),
				'desc'      => esc_html__( 'You can change menu text hover color.', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'output'	=> array( 
					'color' => '
					.site-header.pix-header-fixed .site-main-menu li a:hover, 
					.site-header.pix-header-fixed .site-main-menu li a.current_page,
					.site-header.pix-header-fixed .site-main-menu li .sub-menu li a:hover, 
					.site-header.pix-header-fixed .site-main-menu li .sub-menu li a.current_page',
					
				)
			),	
		)
	) );

	//Footer Setting
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Footer', '_themename' ),
		'icon'      => 'fa fa-support',
		'fields' => array(

			array(
				'id'            => 'saaspik_footer_style',
				'type'          => 'image_select',
				'title'         => esc_html__( 'Footer Style', '_themename' ),
				'options'       => array(
					'style_one' => SAASPIK_THEME_URI . '/assets/images/layout/footer_light.jpg',
					'style_two' => SAASPIK_THEME_URI . '/assets/images/layout/footer_dark.jpg'
				),
				'default'       => 'style_one',
				'desc'          => esc_html__( 'You can choose the footer style of light or dark.', '_themename'),
			),
			array(
				'id'         => 'saaspik_footer_logo',
				'type'       => 'upload',
				'title'      => esc_html__('Site Footer Logo', '_themename' ),
				'desc'       => esc_html__( 'You can choose the footer style of light or dark.', '_themename'),
				'dependency' => array( 'saaspik_footer_light', '==', 'light' ),
			),

			array(
				'id'         => 'copyright_text',
				'type'       => 'textarea',
				'title'      => esc_html__('Copyright Text', '_themename' ),
			),

			array(
				'type'    => 'subheading',
				'content' => esc_html__(' Footer Style', '_themename' ),
			),

			array(
				'id'    	  => 'footer_bg_color',
				'type'  	  => 'color',
				'title' 	  => esc_html__('Footer Background Color', '_themename'),		
				'output'      => '.site-footer',
				'output_mode' => 'background-color',
			),

			array(
				'id'        => 'footer_bg',
				'type'      => 'background',
				'title'     => esc_html__( 'Overlay Background', '_themename' ),
				'desc'      => esc_html__( 'Upload overlay background image.', '_themename' ),
				'output' 		=> '.site-footer .overlay-bg',

			),

			array(
				'id'          => 'footer-widget',
				'type'        => 'color',
				'title'       => esc_html__('Widget Title Color', '_themename'),			
				'output'      => '.site-footer .widget-title',				
			),

			array(
				'id'          => 'footer-link',
				'type'        => 'color',
				'title'       => esc_html__('Link Color', '_themename'),			
				'output'      => '.site-footer .widget_nav_menu .menu li a',				
			),
			array(
				'id'          => 'footer-link-hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Link Color Hover', '_themename'),			
				'output' => array( 
					'background' => '.site-footer .widget_nav_menu .menu li a:after', 
					'color' => '.site-footer .widget_nav_menu .menu li a:hover',
				)					
			),

			array(
				'type'    => 'subheading',
				'content' => esc_html__(' Social Link', '_themename' ),
			),

			array(
				'id'          => 'footer-social-link',
				'type'        => 'color',
				'title'       => esc_html__('Icon Color', '_themename'),				
				'output'      => '.site-footer .widget .footer-social-link li a',				
			),
			array(
				'id'          => 'footer-social-link-border',
				'type'        => 'color',
				'title'       => esc_html__('Border Color', '_themename'),				
				'output'      => array(
					'border-color' => '.site-footer .widget .footer-social-link li a'
				 )			
			),
			array(
				'id'          => 'footer-link-hover-bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover Background Color', '_themename'),			
				'output'      => array(
					'background' => '.site-footer .widget .footer-social-link li a:hover',
					'border-color' => '.site-footer .widget .footer-social-link li a:hover'
				 )					
			),

			array(
				'id'          => 'footer-link-hover-icon',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover Icon Color', '_themename'),			
				'output' => '.site-footer .widget .footer-social-link li a:hover',
				'output_important' => true					
			),

		)
	) );

	//Page Header
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Page Header', '_themename' ),
		'icon'      => 'fa fa-picture-o',
		'fields' => array(

			array(
				'type'    => 'subheading',
				'content' => esc_html__(' Page Header Settings', '_themename' ),
			),
			array(
				'id'        => 'saaspik_header',
				'type'          => 'switcher',
				'title'     => esc_html__( 'Page Header Enable', '_themename' ),
				'default'    => true,
			),
			array(
				'id'         => 'page_header_style_main',
				'type'       => 'button_set',
				'title'      => esc_html__('Header Background Type', '_themename'),
				'options'    => array(
				  'partical_main'  => esc_html__('Partical Animation', '_themename'),
				  'background_main' => esc_html__('Background Image', '_themename'),
				),
				'default'    => 'partical_main'
			),


			array(
				'id'    => 'particle_animation',
				'type'  => 'switcher',
				'title' => esc_html__('Particle animation Show/Hide', '_themename'),
				'default' => true,
				'dependency' => array( 'page_header_style_main', '==', 'partical' ),
			),

			array(
				'id'    => 'header-background',
				'type'  => 'color',
				'title' => 'Background Color',
				'dependency' => array( 'page_header_style_main', '==', 'partical_main' ),
				'output' 		=> [
					'background' => '.page-banner.header-particle',
				]
			  ),

			array(
				'id'        => 'saaspik_bubble_color',
				'title'     => esc_html__( 'Perticale Color', '_themename' ),
				'type'      => 'color',		
				'output'  	=> array(
					'stroke' => '.circle path',
					'background' => '.animate-ball .ball'
				),
				'dependency'    => array( 'page_header_style_main', '==', 'partical_main' ),
			),


		
			array(
				'id'            => 'saaspik_header_default_title',
				'type'          => 'text',
				'title'         => esc_html__( 'Default Title', '_themename' ),
				'desc'          => esc_html__( 'Set the default title for the page header', '_themename' ),
			),
			array(
				'id'    => 'custom_title_typography',
				'type'  => 'typography',
				'title' => esc_html__('Title Typography', '_themename'),
				'output'  => array( 
					'color' => '.page-banner .page-title-wrapper .page-title, .page-banner .saaspik_breadcrumbs li a',
				),
			),
			array(
				'id'            => 'saaspik_header_image',
				'type'          => 'background',
				'title'         => esc_html__( 'Header Background', '_themename' ),
				'desc'          => esc_html__( 'Default: Featured image, if fail will get image from global settings.', '_themename' ),
				'output' 		=> '.header-bg',
				'dependency' => array( 'page_header_style_main', '==', 'background_main' ),
			),			
		
		
		)
	) );

	//Blog Setting
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Blog', '_themename' ),
		'icon'  => 'fa fa-file-text-o',
		'fields' => array(

			array(
				'id'    => 'blog-style',
				'type'  => 'image_select',
				'title' => esc_html__( 'Style', '_themename' ),
				'radio' => true,
				'options' => array(
					'list'    => SAASPIK_THEME_URI . '/assets/images/layout/list.png',
					'grid' => SAASPIK_THEME_URI . '/assets/images/layout/grid.jpg',
				),
				'default' => 'list'
			),
			array(
				'id'    => 'blog-masonry-column',
				'type'  =>'image_select',
				'title' => esc_html__( 'Columns', '_themename' ),
				'desc'  => esc_html__( 'Display number of post per row', '_themename' ),
				'radio' => true,
				'options' => array(
					'6' => SAASPIK_THEME_URI . '/assets/images/layout/2cols.png',
					'4' => SAASPIK_THEME_URI . '/assets/images/layout/3cols.png',
				),
				'default'    => '6',
				'dependency' => array( 'blog-style_masonry', '==', true ),
			),
			array(
				'id'    => 'blog-layout',
				'type'  => 'image_select',
				'title' => esc_html__( 'Layout', '_themename' ),
				'radio' => true,
				'options' => array(
					'left-sidebar'  => SAASPIK_THEME_URI . '/assets/images/layout/left-sidebar.png',
					'no-sidebar'    => SAASPIK_THEME_URI . '/assets/images/layout/no-sidebar.png',
					'right-sidebar' => SAASPIK_THEME_URI . '/assets/images/layout/right-sidebar.png',
				),
				'default'    => 'right-sidebar',
			),
			array(
				'id'        => 'saaspik_single_author_bio',
				'type'      => 'switcher',
				'title'     => esc_html__( 'Display Author Bio Box', '_themename' ),
				'default'   => false
			),

			array(
				'id'        => 'saaspik_share_post',
				'type'      => 'switcher',
				'title'     => esc_html__( 'Share On Post', '_themename' ),
				'default'   => false
			),

			array(
				'id'       => 'saaspik_single_display_meta',
				'type'     => 'button_set',
				'title'    => 'Post Meta Show/Hide',
				'multiple' => true,
				'options'  => array(
					'author'      => esc_html__( 'Author', '_themename' ),
					'date'      => esc_html__( 'Date', '_themename' ),
					'tag'      => esc_html__( 'Tag', '_themename' ),
					'category'  => esc_html__( 'Category', '_themename' ),
					'comment'   => esc_html__( 'Comments', '_themename' ),
				),
				'default'  => array( 'date', 'tag', 'category', 'comment')
			),
		)
	) );

	//Portfolio
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Portfolio', '_themename' ),
		'icon'      => 'fa fa-picture-o',
		'fields' => array(

			array(
				'type'    => 'subheading',
				'content' => esc_html__('Portfolio Page Title', '_themename' ),
			),	

			array(
				'id'        => 'saaspik_header_portfolio',
				'type'          => 'switcher',
				'title'     => esc_html__( 'Page Header Enable', '_themename' ),
				'default'    => true,
			),
			array(
				'id'         => 'page_header_portfolio_style_main',
				'type'       => 'button_set',
				'title'      => esc_html__('Header Background Type', '_themename'),
				'options'    => array(
				  'partical_portfolio_main'  => esc_html__('Partical Animation', '_themename'),
				  'background_portfolio_main' => esc_html__('Background Image', '_themename'),
				),
				'default'    => 'partical_portfolio_main'
			),
			array(
				'id'            => 'page_portfolio_title',
				'type'          => 'text',
				'title'         => esc_html__( 'Portfolio Details Title', '_themename' ),
				'desc'          => esc_html__( 'Set the default title for the page header', '_themename' ),
			),
			array(
				'id'    => 'port_custom_title_typography',
				'type'  => 'typography',
				'title' => esc_html__('Title Typography', '_themename'),
				'output'  => '.single-saaspik_portfolio .page-banner .page-title, .page-banner .saaspik_breadcrumbs li a',
			),
			array(
				'id'            => 'saaspik_header_image_portfolio',
				'type'          => 'background',
				'title'         => esc_html__( 'Header Background', '_themename' ),
				'desc'          => esc_html__( 'Default: Featured image, if fail will get image from global settings.', '_themename' ),
				'output' 		=> '.header-bg-portfolio',
				'dependency' => array( 'page_header_portfolio_style_main', '==', 'background_portfolio_main' ),
			),
			
			array(
				'id'    => 'particle_animation_portfolio',
				'type'  => 'switcher',
				'title' => esc_html__('Particle animation Show/Hide', '_themename'),
				'default' => true,
				'dependency' => array( 'page_header_style_main', '==', 'partical' ),
			),

			array(
				'type'    => 'subheading',
				'content' => esc_html__(' Related Portfolio Details', '_themename' ),
			),

			array(
				'id'    => 'releted_portfolio',
				'type'  => 'switcher',
				'title' => esc_html__('Related Post Show/Hide', '_themename'),
				'default' => true
			  ),
			  
			array(
                "type" => "text",                
                'id' => 'port_sub_title',
				"title" => esc_html__('Sub Title', '_themename'),
				'default' => esc_html__('Portfolio', '_themename'),
                'desc'  => esc_html__('You can change the title','_themename' )
            ),   

			array(
				'type'      => 'text',
				'title'     => esc_html__( 'Title', '_themename' ),
				'id'        => 'port_title',
				'default'	=> esc_html__('Related Portfolio', '_themename'),
			),

            array(
				'type'      => 'text',
				'title'     => esc_html__( 'Load More Text', '_themename' ),
				'id'        => 'moretext',
				'default'	=> esc_html__('Load More', '_themename'),
			),
		)
	) );

    //Social Link
    CSF::createSection( $prefix, array(
        'title'  => esc_html__( 'Social Link', '_themename' ),
        'icon'      => 'fa fa-globe',
        'desc'	=> esc_html__( 'This social profiles will display in your whole site.', '_themename' ),
        'fields' => array(

            array(
                'id'           => 'saaspik_social_links',
                'type'         => 'group',
                'title'        => esc_html__('Saaspik Social links', '_themename' ),
                'desc'		   => esc_html__( 'This social profiles will display in your whole site.', '_themename' ),
                'button_title' => esc_html__('Add New', '_themename'),
                'fields'       => array(

                    array(
                        'id'            => 'name',
                        'type'          => 'text',
                        'title'         => esc_html__( 'Name', '_themename' ),
                    ),
                    array(
                        'id'     => 'url',
                        'type'   => 'text',
                        'title'  => esc_html__('Url', '_themename')
                    ),
                    array(
                        'id'     => 'icon',
                        'type'   => 'icon',
                        'title'  => esc_html__('Icon', '_themename')
                    )

                ),

                'default'    => array(
                    array(
                        'name'  => esc_html__('Facebook', '_themename'),
                        'url'   => esc_url('http://facebook.com'),
                        'icon'  => 'fa fa-facebook'
                    ),

                    array(
                        'name'  => esc_html__('Twitter', '_themename'),
                        'url'   => esc_url('http://twitter.com'),
                        'icon'  => 'fa fa-twitter'
                    ),

                    array(
                        'name'  => esc_html__('Google Plus', '_themename'),
                        'url'   => esc_url('http://plus.google.com'),
                        'icon'  => 'fa fa-google-plus'
                    )

                ),
                array(
                    'type'      => 'notice',
                    'class'     => 'info',
                    'content'   => esc_html__( 'This social profiles will display in your whole site.', '_themename' ),
                ),
            ),
        )
    ) );

	//Mise
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Mise', '_themename' ),
		'icon'      => 'fa fa-star',
		'fields' => array(
			array(
				'type'      => 'text',
				'title'     => esc_html__( 'Google Map API Key', '_themename' ),
				'id'        => 'saaspik-map-api',
				'desc'      => esc_html__( 'Enter the Google Map API Key. You can generate API here: https://youtu.be/JDgF3Z6dC_w', '_themename' ),
			),
			array(
				'type'      => 'text',
				'title'     => esc_html__( 'Google Map Region Code', '_themename' ),
				'id'        => 'saaspik-map-api-region',
				'desc'      => esc_html__( 'Get map region list here: https://goo.gl/XeoqPy', '_themename' ),
			),
		)
	) );

	//Error Page
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( '404 Page', '_themename' ),
		'icon'      => 'fa fa-exclamation',
		'fields' => array(

			array(
				'id'         => 'saaspik_error_img',
				'type'       => 'upload',
				'title'      => esc_html__('404 Image', '_themename' ),
				'desc'       => esc_html__( 'Upload any media using the WordPress Native Uploader.', '_themename'),
				'preview' 	 => true,
			),

			array(
				'type'      => 'text',
				'title'     => esc_html__( 'Error Title', '_themename' ),
				'id'        => 'error_title',
				'desc'      => esc_html__( 'Enter the Title.', '_themename' ),
				'default'   => esc_html__('Page Not Found', '_themename'),
			),

			array(
				'type'      => 'text',
				'title'     => esc_html__( 'Error Subtitle', '_themename' ),
				'id'        => 'error_subtitle',
				'desc'      => esc_html__( 'Enter the Error Subtitle.', '_themename' ),
				'default'   => esc_html__('We re unable to find the page you re looking for.', '_themename'),
			),
		)
	) );

	//Typography
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Typography', '_themename' ),
		'icon'  => 'fa fa-font',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'Body Font Settings', '_themename' ),
			),
			
			array(
				'id'      => 'body-font',
				'type'    => 'typography',
				'title'   => esc_html__('Body', '_themename'),
				'output'  => 'body',
				'default' => array(
				  'color'       => '#797687',	
				  'font-size'   => '16',
				  'line-height' => '28',
				  'unit'        => 'px',
				  'type'        => 'google',
				),
			  ),
			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'Heading Font Settings', '_themename' ),
			),
			array(
				'id'      => 'heading-h1',
				'type'    => 'typography',
				'title'   => esc_html__('Heading H1', '_themename'),
				'output'  => 'h1',
				'default' => array(				
					'font-size'   => '40',
					'unit'        => 'px',
					'type'        => 'google',
				),
			),	
			array(
				'id'      => 'heading-h2',
				'type'    => 'typography',
				'title'   => esc_html__('Heading H2', '_themename'),
				'output'  => 'h2',
				'default' => array(			
					'font-size'   => '32',
					'unit'        => 'px',
					'type'        => 'google',
				),
			),	
			array(
				'id'      => 'heading-h3',
				'type'    => 'typography',
				'title'   => esc_html__('Heading H3', '_themename'),
				'output'  => 'h3',
				'default' => array(				
					'font-size'   => '28',
					'unit'        => 'px',
					'type'        => 'google',
				),
			),
			array(
				'id'      => 'heading-h4',
				'type'    => 'typography',
				'title'   => esc_html__('Heading H4', '_themename'),
				'output'  => 'h4',
				'default' => array(				
					'font-size'   => '24',
					'unit'        => 'px',
					'type'        => 'google',
				),
			),
			array(
				'id'      => 'heading-h5',
				'type'    => 'typography',
				'title'   => esc_html__('Heading H5', '_themename'),
				'output'  => 'h5',
				'default' => array(					
					'font-size'   => '20',
					'unit'        => 'px',
					'type'        => 'google',
				),
			),
		
			array(
				'id'      => 'heading-h6',
				'type'    => 'typography',
				'title'   => esc_html__('Heading H6', '_themename'),
				'output'  => 'h6',
				'default' => array(				
					'font-size'   => '16',
					'unit'        => 'px',
					'type'        => 'google',
				),
			),
		
		)
	) );

	//Color Scheme
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Color Scheme', '_themename' ),
		'icon'      => 'fa fa-star',
		'icon'  => 'fa fa-paint-brush',
		'fields' => array(

			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'General Color', '_themename' ),
			),

			array(
				'id'      => 'body-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Body Color', '_themename' ),
				'output' => 'body'
			),

			array(
				'id'      => 'main_heading-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Heading Color', '_themename' ),
				'output' => '
				h1,h2,h3,h4,h5,h6, .blog-content .entry-title a',				
			),

			array(
				'id'      => 'main_primary-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Primary Color', '_themename' ),
				'desc'    => esc_html__( 'Main Color Scheme', '_themename' ),
				'output' => array(
					'color'  => '
						.section-title .sub-title, .pix-btn.btn-light, 
						.site-header .site-main-menu li.current-menu-parent .current_page_item > a,
						.site-footer .widget_nav_menu .menu li a:hover, .pix-btn.btn-outline, 
						.blog-content .entry-title a:hover, 
						.saaspik-icon-box-wrapper.style-two .saaspik-icon-box-content .saaspik-icon-box-title span:hover,
						.site-info p a, .site-info p a:hover, 
						.testimonial-wrapper .slider-nav .swiper-button-next:hover, 
						.testimonial-wrapper .slider-nav .swiper-button-prev:hover,
						.advanced-pricing-table .pricing-table.color-one .pricing-header .price,
						.fun-fact .count, 
						.fun-fact span,
						.site-header.header-five .header-inner .site-nav .nav-right .nav-btn:hover,
						.fun-fact-two .counter h4,
						.page-banner.blog-details-banner .post-meta li a:hover,						
						.page-banner.blog-details-banner .post-meta.color-theme li a,
						.saaspik-recent-posts .widget-post .media-body h4 a:hover,
						.contact-infos .contact-info .info.phone,
						.site-header .header-inner .site-nav .nav-right .nav-btn,
						.related-portfolio .portfolio-item .port-info h3 a:hover,
						.widget ul li a:hover,
						.post .blog-content .post-meta li a:hover, .product .blog-content .post-meta li a:hover,
						.saaspik-icon-box-wrapper.style-two .saaspik-icon-box-content .saaspik-icon-box-title a:hover,
						.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn,
						.post-author:hover,
						.portfolio-nav li a:hover,
						 #pix-tabs-nav li a:hover, 
						.saaspik-icon-box-wrapper.style-four .saaspik-icon-box-content .saaspik-icon-box-title span:hover,
						.site-header .site-main-menu li .sub-menu li a:hover, 
						.site-header .site-main-menu li .sub-menu li a.current_page, 
						.editor-content .section-title.style-two .subtitle, #pix-tabs-nav li.active a,
						.saaspik-icon-box-wrapper.style-one .saaspik-icon-box-content .saaspik-icon-box-title span:hover,
						.list-items li:before, 
						.section-title .title span,
						.newsletter-form-two .newsletter-inner .newsletter-submit,
						.pricing-table .pix-btn, 
						.popup-play-btn i,
						.comment-form .pix-btn:hover,
						.search-form button i,
						.pix-btn.submit-btn:hover,
						.pixsass-isotope-filter li.current a,
						.post.link-post .blog-content p a:hover, .product.link-post .blog-content p a:hover,
						.pixsass-isotope-filter li.current a,
						.team-member .member-avater .member-social li a:hover,
						.pricing-table .pricing-header .price,
						 .saaspik-icon-box-wrapper.style-four .saaspik-icon-box-content .more-btn:hover, 
						.section-title .title-two span, 
						.pricing-tab .monthly_tab_title, 
						a:hover, a:focus, a:active,
						.site-header.pix-header-fixed .site-main-menu li.current_page_item a,
						.gp-tabs-navigation li .more-btn:hover,
						.saaspik-icon-box-wrapper.style-seven .saaspik-icon-box-content .saaspik-icon-box-title a:hover,
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn,
						.blog-content .entry-title a:hover,
						.post .author a:hover, .product .author a:hover,
						.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn,
						.post .blog-content .read-more:hover, .product .blog-content .read-more:hover,
						.post .blog-content .read-more:hover i, .product .blog-content .read-more:hover i,
						.pixsass-portfolio-items.portfolio-one .pixsass-portfolio-item .portfolio-info h3 a:hover,						
						.pricing-tab.seleceted .annual_tab_title',
					'background' => '
						.site-footer .widget_nav_menu .menu li a:after, 
						.site-header .header-inner .site-nav .nav-right .nav-btn:hover,
						.comment-form .pix-btn,
						.site-footer .widget .footer-social-link li a:hover,
						.pix-btn.btn-outline:hover,
						.tagcloud a:hover,
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn:hover,
						.testimonial-wrapper-two .slider-nav #slide-prev:hover, .testimonial-wrapper-two .slider-nav #slide-next:hover,
						.site-footer.footer-two .newsletter-form-two.widget-newsletter .newsletter-inner .newsletter-submit,
						.share-link li a:hover,
						.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn:hover,
						#related-portfolio .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active:before,
						.post .blog-content .read-more:after, .product .blog-content .read-more:after,
						.menu-transperant .site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn:hover,
						.newsletter-form .newsletter-inner .newsletter-submit,
						#testimonial-wrapper-three .slider-nav .swiper-button-next:hover .arrow,
						#testimonial-wrapper-three .slider-nav .swiper-button-next:hover .arrow:before, 
						#testimonial-wrapper-three .slider-nav .swiper-button-next:hover .arrow:after,
						#testimonial-wrapper-three .slider-nav .swiper-button-prev:hover .arrow,
						#testimonial-wrapper-three .slider-nav .swiper-button-prev:hover .arrow:before, 
						#testimonial-wrapper-three .slider-nav .swiper-button-prev:hover .arrow:after,
						.pricing-tab .pricing-tab-switcher:before, 
						.testimonials-two #testimonial-wrapper .slider-nav .swiper-button-prev, 
						.testimonials-two #testimonial-wrapper .slider-nav .swiper-button-next,
						.pix-btn, .return-to-top:hover:after, 
						
						.newsletter-form-two.widget-newsletter .newsletter-inner .newsletter-submit, 
						.newsletter-form-two.widget-newsletter .newsletter-inner .newsletter-submit:hover',
					'border-color' => '
						.site-footer .widget .footer-social-link li a:hover,
						.gp-tabs-navigation li,	
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn,
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn:hover,					
						.pixsass-isotope-filter li.current a,
						.pix-btn.submit-btn:hover,
						.share-link li a:hover,
						.comment-form .pix-btn:hover,
						.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn,
						.site-footer .widget .footer-social-link li a:hover,
						 .pixsass-isotope-filter li.current a, 
						.pricing-table .pix-btn, .pix-btn.btn-outline,
						.menu-transperant .site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn:hover,						
						.pricing-table .pix-btn, .pix-btn.btn-outline',
					'border-right-color' => '.pricing-table.featured .trend:before, .advanced-pricing-table .pricing-table.featured .trend:before'
				),
			),

			array(
				'id'        => 'saspik-link-color',
				'type'      => 'link_color',
				'title'     => 'Link Color',
				'color'     => true,
				'hover'     => true,				
				'focus'     => true,	
				'output'	=> '.post .author a, .product .author a, 
				.post .blog-content .read-more, .post .blog-content .post-meta li a:hover,
				.product .blog-content .read-more'		
			  ),

			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'Section Background Color', '_themename' ),
			),

			array(
				'id'         => 'gradient_on_off',
				'type'       => 'button_set',
				'title'      => esc_html__('Use Theme Gradient?', '_themename'),
				'options'    => array(
				  'on'  => esc_html__('On', '_themename'),
				  'off' => esc_html__('Off', '_themename'),
				),
				'default'    => 'on'
			),

			array(
				  'id'                              => 'section_background',
				  'type'                            => 'background',
				  'title'                           => 'Background Gradient Color',
				  'background_color'                => true,
				  'background_gradient'             => true,
				  'background_image'                => false,
				  'background_position'             => false,
				  'background_repeat'               => false,
				  'background_attachment'           => false,
				  'background_size'                 => false,
				  'background_origin'               => false,
				  'background_clip'                 => false,
				  'background_blend-mode'           => false,
				  'default'                         => array(
				    'background-gradient-direction' => 'to left',
				  ),
				  'output'                            => '.call-to-action, .section-bg, .bg-angle, .banner.banner-one, .newsletter, .newsletter-two',
				  'output_important'                  => true,
				  'dependency' => array( 'gradient_on_off', '==', 'on' ),
			),

			array(
				'id'      => 'section-bg-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background Color', '_themename' ),
				'output' => array (
					'background' => '.call-to-action, .section-bg, .bg-angle, .newsletter, .newsletter-two'
				),
				'output_important'    => true,
			),
		)
	) );

	//Backup
	CSF::createSection( $prefix, array(
		'title'  => esc_html__( 'Backup', '_themename' ),
		'icon'      => 'fa fa-download',
		'fields' => array(
			array(
				'type' => 'backup',
			),
		)
	) );
}