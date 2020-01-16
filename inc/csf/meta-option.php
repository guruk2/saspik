<?php 

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'saaspik_page_options';	

	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
		'title'     => esc_html__('Page Option', '_themename'),
		'context'     => 'normal',
		'post_type' => array( 'post', 'page' ),
		'theme' => 'dark',

	) );

	//
	// Header Menu
	CSF::createSection( $prefix, array(
		'title'  => esc_html__('Header', '_themename'),
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
				'id'        => 'meta_main_logo',
				'type'      => 'media',
				'title'     => esc_html__( 'Main Logo', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header', '_themename' ),
				'dependency' => array( 'header-layout', '==', 'style_one' ),
				
			),
	
			array(
				'id'        => 'meta_sticky_logo',
				'type'      => 'media',
				'title'     => esc_html__( 'Sticky Logo', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header Sticky and Inner Page.', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'dependency' => array( 'header-layout', '==', 'style_one' ),
			),
			array(
				'id'        => 'meta_main_logo_two',
				'type'      => 'media',
				'title'     => esc_html__( 'Main Logo', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header', '_themename' ),
				'dependency' => array( 'header-layout', 'any', 'style_two,style_three' ),
				
			),
	
			array(
				'id'        => 'meta_sticky_logo_two',
				'type'      => 'media',
				'title'     => esc_html__( 'Sticky Logo', '_themename' ),
				'desc'      => esc_html__( 'Upload logo for Header Sticky and Inner Page.', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'dependency' => array( 'header-layout', 'any', 'style_two,style_three' ),
			),

			array(
				'type'    => 'subheading',
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
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'output'	=> array( 
					'color' => '.site-header .site-main-menu li > a:hover, .menu-transperant .site-header .site-main-menu li > a:hover, .site-header .site-main-menu li > a:after',
					'background' => '.site-header .site-main-menu li > a:after, .site-header .site-main-menu li > a:hover:after, .site-header .site-main-menu li > a.current_page:after'
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
					'color' => '
					.site-header .site-main-menu li .sub-menu li a:hover,
					 .menu-transperant .site-header .site-main-menu li .sub-menu li a:hover,
					 .site-header .header-inner .site-nav.nav-two .site-main-menu li .sub-menu li a:hover,
					  .site-header .header-inner .site-nav.nav-two .site-main-menu li .sub-menu li a.current_page',					
				)
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
				'output_important'                  => true,
				'output'	=> '.site-header.pix-header-fixed .site-main-menu li a, .site-header.pix-header-fixed .site-main-menu li .sub-menu li a'
			),

			array(
				'id'        => 'sticky_menu_color_hover',
				'type'      => 'color',
				'output_important'                  => true,
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

	//
	// Page Header
	CSF::createSection( $prefix, array(
		'title'  => 'Page Header',
		'icon'      => 'fa fa-picture-o',
		'fields'    => array(

			array(
				'id'         => 'page_header',
				'type'       => 'button_set',
				'title'      => esc_html__('Page Header Option', '_themename'),
				'options'    => array(
				  'default'  => esc_html__('Default', '_themename'),
				  'enabled'  => esc_html__('Enabled', '_themename'),
				  'disabled' => esc_html__('Disabled', '_themename'),
				),				
				'default'    => 'default'
			  ),

			array(
				'id'         => 'page_header_style',
				'type'       => 'button_set',
				'title'      => esc_html__('Header Background Type', '_themename'),
				'options'    => array(
				  'partical'  => esc_html__('Partical Animation', '_themename'),
				  'background' => esc_html__('Background Image', '_themename'),
				),				
				'dependency' => array( 'page_header', '==', 'enabled' ),
			),

			array(
				'id'            => 'header_image',
				'type'          => 'background',
				'title'         => esc_html__( 'Header Image', '_themename' ),
				'desc'          => esc_html__( 'Default: Featured image, if fail will get image from global settings.', '_themename' ),
				'dependency' => array( 'page_header', '==', 'enabled' ),
				'output' 	=> '.header-bg',
				'output_important' => true,
				'dependency' => array( 'page_header|page_header_style', '==|==', 'enabled|background' ),
			),
			
			array(
				'id'            => 'custom_title',
				'type'          => 'text',
				'title'         => esc_html__( 'Custom Title', '_themename' ),
				'desc'          => esc_html__( 'Set custom title for the page header. Default: The post title.', '_themename' ),
				'dependency' => array( 'page_header', '==', 'enabled' ),
			),
			array(
				'id'    => 'custom_title_typography',
				'type'  => 'typography',
				'title' => esc_html__('Title Typography', '_themename'),
				'output'  => '.page-banner .page-title',
				'dependency' => array( 'page_header', '==', 'enabled' ),
			),
			array(
				'id'    => 'custom_title_color',
				'type'  => 'color',
				'title' => esc_html__('Title Color', '_themename'),
				'output'  => '.page-banner .page-title',
				'dependency' => array( 'page_header', '==', 'enabled' ),
			),
			array(
				'id'    => 'particle_animation',
				'type'  => 'switcher',
				'title' => esc_html__('Particle animation Show/Hide', '_themename'),
				'default' => true,				
				'dependency' => array( 'page_header|page_header_style', '==|==', 'enabled|partical' ),
			),


			array(
				'id'            => 'breadcrumbs',
				'type'          => 'switcher',
				'title'         => esc_html__( 'Header Breadcrumbs', '_themename' ),
				'desc'          => esc_html__( 'Display breadcrumbs on the page header', '_themename' ),
				'dependency' => array( 'page_header', '==', 'enabled' ),
				'default'       => true,
			),

		),
	) );

	//
	//Footer
	CSF::createSection( $prefix, array(
		'title'  => esc_html__('Footer', '_themename'),
		'icon'      => 'fa fa-support',
		'fields' => array(

			array(
				'id'         => 'footer_style',
				'type'       => 'button_set',
				'title'      => esc_html__('Footer Style', '_themename'),
				'options'    => array(
				  'default'  => esc_html__('Default', '_themename'),
				  'select_style'  	=> esc_html__( 'Select Style', '_themename'),
				),				
				'default'    => 'default'
			  ),

			array(
				'id'    => 'meta_saaspik_footer_style',
				'type'  => 'image_select',
				'title' => esc_html__( 'Footer Style', '_themename' ),
				'options' => array(
					'style_one' => SAASPIK_THEME_URI . '/assets/images/layout/footer_light.jpg',
					'style_two' => SAASPIK_THEME_URI . '/assets/images/layout/footer_dark.jpg'
				),		
				'desc'       => esc_html__( 'You can choose the footer style of light or dark.', '_themename'),
				'dependency' => array( 'footer_style', '==', 'select_style' ),
				
			),
	

			array(
				'id'         => 'copyright_text',
				'type'       => 'textarea',
				'title'      => esc_html__('Copyright Text', '_themename' ),
				'dependency' => array( 'footer_style', '==', 'select_style' ),
			),

			array(
				'type'    => 'subheading',
				'content' => esc_html__(' Footer Style', '_themename' ),
				'dependency' => array( 'footer_style', '==', 'style' ),
				'dependency' => array( 'footer_style', '==', 'select_style' ),
			),

			array(
				'id'    => 'footer_bg_color',
				'type'  => 'color',
				'title' => esc_html__('Footer Background Color', '_themename'),
				'output'      => '.site-footer',
				'output_mode' => 'background-color',
				'dependency' => array( 'footer_style', '==', 'style' ),
				'dependency' => array( 'footer_style', '==', 'select_style' ),
				'output_important' => true
			),

			array(
				'id'        => 'footer_bg',
				'type'      => 'media',
				'title'     => esc_html__( 'Overlay Background', '_themename' ),
				'add_title' => esc_html__( 'Upload', '_themename' ),
				'desc'      => esc_html__( 'Upload overlay background image.', '_themename' ),
				'dependency' => array( 'footer_style', '==', 'select_style' ),	
				'output_important' => true
			),
		

			array(
				'id'          => 'footer-widget',
				'type'        => 'color',
				'title'       => esc_html__('Widget Title Color', '_themename'),
				'output'      => '.site-footer .widget-title',
				'dependency' => array( 'footer_style', '==', 'select_style' ),	
				'output_important' => true
			),

			array(
				'id'          => 'footer-link',
				'type'        => 'color',
				'title'       => esc_html__('Footer Text Color', '_themename'),
				'output'      => '.site-footer .widget_nav_menu .menu li a, .site-footer p',	
				'dependency' => array( 'footer_style', '==', 'select_style' ),
				'output_important' => true
			),
			array(
				'id'          => 'footer-link-hover',
				'type'        => 'color',
				'title'       => esc_html__('Link Color Hover', '_themename'),
				'output' => array( 
					'background' => '.site-footer .widget_nav_menu .menu li a:after, 
									.site-footer .widget .footer-social-link li a:hover', 
					'color' => '.site-footer .widget_nav_menu .menu li a:hover, .site-info p a, .site-info p a:hover',
					'border-color' => '.site-footer .widget .footer-social-link li a:hover',
				),
				'dependency' => array( 'footer_style', '==', 'select_style' ),
				'output_important' => true			
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
				'id'      => 'heading-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Heading Color', '_themename' ),
				'output' => 'h1,h2,h3,h4,h5,h6',
				
			),

			array(
				'id'      => 'primary-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Primary Color', '_themename' ),
				'desc'    => esc_html__( 'Main Color Scheme', '_themename' ),
				'output' => array(
					'color'  => '
						.section-title .sub-title, .pix-btn.btn-light, 
						.site-header.header-five .header-inner .site-nav .nav-right .nav-btn:hover,
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn,
						.site-header .site-main-menu li.current-menu-parent .current_page_item > a,
						.site-footer .widget_nav_menu .menu li a:hover, .pix-btn.btn-outline,						
						.saaspik-icon-box-wrapper.style-two .saaspik-icon-box-content .saaspik-icon-box-title span:hover,
						.site-info p a, .site-info p a:hover, 
						.testimonial-wrapper .slider-nav .swiper-button-next:hover, 
						.testimonial-wrapper .slider-nav .swiper-button-prev:hover,
						.advanced-pricing-table .pricing-table.color-one .pricing-header .price,
						.fun-fact .count, 
						.fun-fact span,	
						.gp-tabs-navigation li .more-btn:hover,
						.fun-fact-two .counter h4,
						.fun-fact-two .icon-container i,
						.saaspik-icon-box-wrapper.style-seven .saaspik-icon-box-content .saaspik-icon-box-title a:hover,
						.blog-post-two .blog-content .read-more,					
						.site-header .header-inner .site-nav .nav-right .nav-btn,
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
						.team-member .member-avater .member-social li a:hover,
						.pricing-table .pricing-header .price,
						 .saaspik-icon-box-wrapper.style-four .saaspik-icon-box-content .more-btn:hover, 
						.section-title .title-two span, 
						.pricing-tab .monthly_tab_title, 
						a:hover, a:focus, a:active,	
						.blog-content .entry-title a:hover,
						.blog-content .post-meta li a:hover,
						.saaspik-icon-box-wrapper.style-five .saaspik-icon-box-content .more-btn:hover i,
						.saaspik-icon-box-wrapper.style-five .saaspik-icon-box-content .saaspik-icon-box-title a:hover,
						.app-btn,.app-btn i, .app-btn.btn-active:hover, .app-btn.btn-active:hover i,
						.saaspik-icon-box-wrapper .saaspik-icon-box-content .saaspik-icon-box-title:hover,
						.saaspik-icon-box-wrapper .saaspik-icon-box-content .saaspik-icon-box-title a:hover,
						.saaspik-icon-box-wrapper.style-five .saaspik-icon-box-content .more-btn:hover,
						.saaspik-icon-box-wrapper.style-five .saaspik-icon-box-icon a, 
						.saaspik-icon-box-wrapper.style-five .saaspik-icon-box-icon span,
						.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn,		
						.pricing-tab.seleceted .annual_tab_title',
					'background' => '
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn:hover,
						.site-footer .widget_nav_menu .menu li a:after, 
						.site-footer .widget .footer-social-link li a:hover,
						.pix-btn.btn-outline:hover,
						.share-link li a:hover,
						.border-wrap .ball,.app-btn:hover, .app-btn.btn-active,
						.site-header .header-inner .site-nav .nav-right .nav-btn:hover,
						.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn:hover,
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
						.blog-post-two .blog-content .read-more:hover,
						.testimonial-wrapper-two .slider-nav #slide-prev:hover, .testimonial-wrapper-two .slider-nav #slide-next:hover,
						.saaspik-icon-box-wrapper.style-five:hover .saaspik-icon-box-icon,
						.newsletter-form-two.widget-newsletter .newsletter-inner .newsletter-submit, 
						.newsletter-form-two.widget-newsletter .newsletter-inner .newsletter-submit:hover',
					'border-color' => '
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn,
						.site-footer .widget .footer-social-link li a:hover,
						.blog-post-two .blog-content .read-more,
						.app-btn,
						.site-header.pix-header-fixed .header-inner .site-nav.nav-two .nav-right .nav-btn:hover,
						.gp-tabs-navigation li,
						.pricing-table .pix-btn, .pix-btn.btn-outline,
						.saaspik-icon-box-wrapper.style-five .saaspik-icon-box-icon,
						.site-header.pix-header-fixed .header-inner .site-nav .nav-right .nav-btn',
						
					'border-right-color' => '.pricing-table.featured .trend:before, .advanced-pricing-table .pricing-table.featured .trend:before',
					'stroke' => '#animate-border .st17'
				),
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
				  'output'                            => '.call-to-action, .section-bg, .bg-angle, .banner.banner-one, .newsletter, .banner.banner-two',
				  'output_important'                  => true,
				  'dependency' => array( 'gradient_on_off', '==', 'on' ),
			),

			array(
				'id'      => 'section-bg-color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background Color', '_themename' ),
				'output' => array (
					'background' => '.call-to-action, .section-bg, .bg-angle, .banner.banner-one, .newsletter'
				),
				'output_important'    => true,
			),
	
		)
	) );
}