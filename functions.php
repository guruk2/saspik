<?php
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saaspik_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'saaspik_content_width', 1170 );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css');
}

add_action( 'after_setup_theme', 'saaspik_content_width', 0 );

/**
 * Filter the categories archive widget to add a span around post count
 */
function _themename_cat_count_span( $links ) {
	$links = str_replace( '</a> ', ' <span class="count">', $links );
	$links = str_replace( ')', ')</span></a>', $links );
	return $links;
}
add_filter( 'wp_list_categories', '_themename_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
function _themename_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '<span class="post-count">(', $links );
	$links = str_replace( ')', ')</span></a>', $links );
	return $links;
}

add_filter( 'get_archives_link', '_themename_archive_count_span' );

// Codestar Framework Option Custom Function
if ( ! function_exists( 'saaspik_option' ) ) {
	function saaspik_option( $option = '', $default = null ) {
	  	$options = get_option( 'saaspik_framework' );
	  	return ( isset( $options[$option] ) ) ? $options[$option] : $default;
	}
}

/**
* Path Define
*
*/

define( 'SAASPIK_THEME_DIR', get_template_directory() );
define( 'SAASPIK_THEME_URI', get_template_directory_uri() );

remove_action('shutdown', 'wp_ob_end_flush_all', 1);
/**
* Theme Setup
*/
require_once SAASPIK_THEME_DIR . '/inc/setup-theme.php';

/**
 * Widgets Register
 */
require_once SAASPIK_THEME_DIR . '/inc/widgets.php';

/**
 * Css and JS Enqueue.
 */
require_once SAASPIK_THEME_DIR . '/inc/enqueue.php';

/**
 * Bootstrap4 Nav Walker.
 */
require_once SAASPIK_THEME_DIR . '/inc/bs4navwalker.php';

/**
 * Css and JS Enqueue.
 */
require_once SAASPIK_THEME_DIR . '/inc/helper.php';

/**
 * Custom template tags for this theme.
 */
require_once SAASPIK_THEME_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once SAASPIK_THEME_DIR . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require_once SAASPIK_THEME_DIR . '/inc/customizer.php';

/**
 * Demo Impoter.
 */
require_once SAASPIK_THEME_DIR . '/inc/demo-importer.php';


/**
 * Theme Options.
 */

require_once SAASPIK_THEME_DIR .'/inc/csf/option-init.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require_once SAASPIK_THEME_DIR . '/inc/jetpack.php';
}

/**
 * Customizer TGMPA.
 */
require get_parent_theme_file_path( '/inc/tgmpa/init.php' );


/**
 * Enqueue svg to the media.
 * @return void
 */
add_filter('upload_mimes', '_themename_svg_mime_types');

function _themename_svg_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}