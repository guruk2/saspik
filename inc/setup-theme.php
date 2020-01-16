<?php 	

/**
 * saaspik functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package saaspik
 */


if ( ! function_exists( '_themename_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _themename_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on saaspik, use a find and replace
		 * to change _themename to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_themename', get_template_directory() . '/languages' );

		/**
	     * Add support for post formats.
	     */
		add_theme_support('post-formats', array('standard', 'gallery', 'video', 'audio', 'quote', 'link'));
		

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );	

		//Image Size
		add_image_size( 'saaspik-recent-post-thumb', 100, 100, true );
		add_image_size( 'saaspik-portfolio-single', 1170, 600, true );
		add_image_size( 'saaspik-portfolio-column-2', 560, 500, true );
		add_image_size( 'saaspik-portfolio-colmn-3', 370, 450, true );
		add_image_size( 'saaspik-portfolio-colmn-4', 280, 400, true );
		add_image_size( 'saaspik_related_portfolio', 360, 400, true );
		add_image_size( 'saaspik-single-post', 1200, 600, true );
		add_image_size( 'saaspik-blog-list', 750, 450, true );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main_menu' => esc_html__( 'Primary Menu', '_themename' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'saaspik_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', '_themename_setup' );