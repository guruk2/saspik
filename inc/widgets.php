<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _themename_widgets_init() {
	$defaults = array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	);

	register_sidebar( array_merge( $defaults, array(
		'id'          => 'blog_sidebar',
		'name'        => esc_html__( 'Blog Sidebar', '_themename'),
		'description' => esc_html__( 'Default Sidebar of blog.', '_themename'),
	) ) );	

	register_sidebar( array_merge( $defaults, array(
		'id'          => 'footer_widget_01',
		'name'        => esc_html__( 'Footer Widget 01', '_themename'),
		'description' => esc_html__( 'Widgetized footer area.', '_themename'),
	) ) );

	register_sidebar( array_merge( $defaults, array(
		'id'          => 'footer_widget_02',
		'name'        => esc_html__( 'Footer Widget 02', '_themename'),
		'description' => esc_html__( 'Widgetized footer area.', '_themename'),
	) ) );

	register_sidebar( array_merge( $defaults, array(
		'id'          => 'footer_widget_03',
		'name'        => esc_html__( 'Footer Widget 03', '_themename'),
		'description' => esc_html__( 'Widgetized footer area.', '_themename'),
	) ) );

	register_sidebar( array_merge( $defaults, array(
		'id'          => 'footer_widget_04',
		'name'        => esc_html__( 'Footer Widget 04', '_themename'),
		'description' => esc_html__( 'Widgetized footer area.', '_themename'),
	) ) );

	register_sidebar( array_merge( $defaults, array(
		'id'          => 'site_info_menu',
		'name'        => esc_html__( 'Footer Site Info Widget Menu', '_themename'),
		'description' => esc_html__( 'Sidebar of Practice Area.', '_themename'),
	) ) );


}
add_action( 'widgets_init', '_themename_widgets_init' );



