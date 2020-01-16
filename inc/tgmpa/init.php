<?php
/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage saaspik
 * @version    2.6.1 for parent theme saaspik for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */

require get_parent_theme_file_path( '/inc/tgmpa/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'saaspik_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function saaspik_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Pixsass Addones Plugin
		array(
			'name'				=> esc_attr__( 'Saaspik Addons', '_themename' ),
			'slug'				=> 'saaspik-addons',
			// 'source'			=> (get_template_directory() . '/inc/tgmpa/plugins/saaspik-addons.zip'),
			'source'			=> ( 'http://saaspik-wp.pixelomatic.com/plugins/saaspik-addons.zip' ),
			'required'			=> true,
			'version'			=> '2.1.0',
		),	

		//Codestar Framework
		array(
			'name'				=> esc_attr__( 'Codestar Framework', '_themename' ),
			'slug'				=> 'codestar-framework',
			// 'source'			=> get_template_directory() . '/inc/tgmpa/plugins/codestar-framework.zip',
			'source'			=> ( 'http://saaspik-wp.pixelomatic.com/plugins/codestar-framework.zip' ),
			'required'			=> true,
			'version'			=> '1.0.0',
		),	

		// Elementor
		array(
			'name'			=> esc_attr__( 'Elementor', '_themename' ),
			'slug'			=> 'elementor',			
			'required'		=> true,			
		),

		// Contact Form 7
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),

		// One Click Demo Import
		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => true,
		),			

	);

	/*
	 * Config for TGMPA
	 */
	$config = array(
		'id'			=> '_themename',
		'default_path'	=> '',
		'menu'			=> '_themename-install-plugins',
		'has_notices'	=> true,
		'dismissable'	=> true,
		'dismiss_msg'	=> '',
		'is_automatic'	=> false,
		'message'		=> '',
	);

	tgmpa( $plugins, $config );
}
