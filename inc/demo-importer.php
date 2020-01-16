<?php
/**
 * Demo Importer
 *
 * @package WordPress
 * @subpackage saaspik
 * @since 1.0
 */

if ( !class_exists( 'OCDI_Plugin' ) )
    return;

class CS_Import_OCDI {

    public $title;

    public function __construct($title = 'Codestart Framework data uploaded') {
        $this->title = $title;
        add_action('pt-ocdi/after_content_import_execution', array($this, 'cs_import_init'), 3, 99 );
    }
    public function cs_decode_string( $string ) {
        return unserialize( $string );
    }
    public function cs_import_init( $selected_import_files, $import_files, $selected_index ) {

        if ( !class_exists( 'CSFramework' ) ) {
            return;
        }

        $downloader = new OCDI\Downloader();

        if( ! empty( $import_files[$selected_index]['local_import_cs'] ) ) {

            foreach( $import_files[$selected_index]['local_import_cs'] as $index => $import ) {
               $file_path = $import['file_path'];
               $file_raw  = OCDI\Helpers::data_from_file( $file_path );
               update_option( $import['option_name'], cs_decode_string( $file_raw, true ) );
           }

       }
       $ocdi       = OCDI\OneClickDemoImport::get_instance();
       $log_path   = $ocdi->get_log_file_path();

       OCDI\Helpers::append_to_file( $this->title, $log_path );
   }
}

if ( ! function_exists( '_themename_after_content_import_execution' ) ) {
	function _themename_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

		$downloader = new OCDI\Downloader();

	if( ! empty( $import_files[$selected_index]['import_json'] ) ) {
			foreach( $import_files[$selected_index]['import_json'] as $index => $import ) {
			$file_path = $downloader->download_file( $import['file_url'], 'demo-json-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
			$file_raw  = OCDI\Helpers::data_from_file( $file_path );
			update_option( $import['option_name'], json_decode( $file_raw, true ) );
		}

		} else if( ! empty( $import_files[$selected_index]['local_import_json'] ) ) {
			foreach( $import_files[$selected_index]['local_import_json'] as $index => $import ) {
			$file_path = $import['file_path'];
			$file_raw  = OCDI\Helpers::data_from_file( $file_path );
			update_option( $import['option_name'], json_decode( $file_raw, true ) );
		}

	}

	$ocdi       = OCDI\OneClickDemoImport::get_instance();
	$log_path   = $ocdi->get_log_file_path();

	OCDI\Helpers::append_to_file( 'Custom Framework file loaded.', $log_path );

	}
	add_action('pt-ocdi/after_content_import_execution', '_themename_after_content_import_execution', 3, 99 );
}




function _themename_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'Saspik Importer', '_themename' );
    $default_settings['menu_title']  = esc_html__( 'Saspik Import Demo', '_themename' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'saaspik-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', '_themename_plugin_page_setup' );





/*Import content data*/
if ( ! function_exists( '_themename_import_files' ) ) :
    function _themename_import_files() {
        return array(
        	array(
	            'import_file_name'             => 'Home One',
	            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/demo-content.xml',
	            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/widgets.wie',
	            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/customizer.dat',
	            'local_import_json'           => array(
	                array(
	                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo/setting.json',
	                    'option_name' => 'saaspik_framework',
	                )
	            ),
	            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-data/demo/home-one.jpg',
	            'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', '_themename' ),
	            'preview_url'                  => 'http://saaspik-wp.pixelomatic.com//home-three/',
            ),

           array(
            'import_file_name'             => 'Home Two',           
            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/customizer.dat',
            'local_import_json'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo/setting.json',
                    'option_name' => 'saaspik_framework',
                )
            ),
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-data/demo/home-two.jpg',
            'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', '_themename' ),
            'preview_url'                  => 'http://saaspik-wp.pixelomatic.com//home-two/',
        ),

	    array(
	            'import_file_name'             => 'Home Three',
	            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/demo-content.xml',
	            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/widgets.wie',
	            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/customizer.dat',
	            'local_import_json'           => array(
	                array(
	                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo/setting.json',
	                    'option_name' => 'saaspik_framework',
	                )
	            ),
	            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-data/demo/home-three.jpg',
	            'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', '_themename' ),
	            'preview_url'                  => 'http://saaspik-wp.pixelomatic.com//home-three/',
            ),

        array(
	            'import_file_name'             => 'Home Four',
	            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/demo-content.xml',
	            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/widgets.wie',
	            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/customizer.dat',
	            'local_import_json'           => array(
	                array(
	                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo/setting.json',
	                    'option_name' => 'saaspik_framework',
	                )
	            ),
	            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-data/demo/home-four.jpg',
	            'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', '_themename' ),
	            'preview_url'                  => 'http://saaspik-wp.pixelomatic.com//home-four/',
            ),

        array(
            'import_file_name'             => 'Home Five',
            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-data/demo/customizer.dat',
            'local_import_json'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo/setting.json',
                    'option_name' => 'saaspik_framework',
                )
            ),
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demo-data/demo/home-five.jpg',
            'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', '_themename' ),
            'preview_url'                  => 'http://saaspik-wp.pixelomatic.com//home-five/',
        ),


       );
    }
    add_filter( 'pt-ocdi/import_files', '_themename_import_files' );
endif;


if ( ! function_exists( '_themename_after_import' ) ) :
    function _themename_after_import( $selected_import ) {

        if ( 'Home One' === $selected_import['import_file_name'] ) {
            //Delete Post 1
            wp_delete_post(1);
            flush_rewrite_rules();

            // Assign menus to their locations.
            $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

            set_theme_mod( 'nav_menu_locations', array(
                'main_menu' => $main_menu->term_id,
            ));

            //Set Front page
            $page = get_page_by_title( 'Home One');
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );             
                update_option( 'posts_per_page', '5' );          
                update_option( 'widget_recent-posts', false );
                update_option( 'widget_recent-comments', false );         

                 // Disable Elementor's Default Colors and Default Fonts
                update_option( 'elementor_disable_color_schemes', 'yes' );
                update_option( 'elementor_disable_typography_schemes', 'yes' );
                update_option( 'elementor_global_image_lightbox', '' );
            }

            $blog_page_id  = get_page_by_title( 'Blog' );
            update_option( 'page_for_posts', $blog_page_id->ID );
            

        } elseif ( 'Home Two' === $selected_import['import_file_name'] ) {
            //Delete Post 1
            wp_delete_post(1);
            

            // Assign menus to their locations.
            $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

            set_theme_mod( 'nav_menu_locations', array(
                'main_menu' => $main_menu->term_id,
            ));

            //Set Front page
            $page = get_page_by_title( 'Home Two');
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );

                // Disable Elementor's Default Colors and Default Fonts
                update_option( 'elementor_disable_color_schemes', 'yes' );
                update_option( 'elementor_disable_typography_schemes', 'yes' );
                update_option( 'elementor_global_image_lightbox', '' );
            }

            $blog_page_id  = get_page_by_title( 'Blog' );
            update_option( 'page_for_posts', $blog_page_id->ID );
        } elseif ( 'Home Three' === $selected_import['import_file_name'] ) {
            //Delete Post 1
            wp_delete_post(1);

            // Assign menus to their locations.
            $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

            set_theme_mod( 'nav_menu_locations', array(
                'main_menu' => $main_menu->term_id,
            ));

            //Set Front page
            $page = get_page_by_title( 'Home Three');
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );

                // Disable Elementor's Default Colors and Default Fonts
                update_option( 'elementor_disable_color_schemes', 'yes' );
                update_option( 'elementor_disable_typography_schemes', 'yes' );
                update_option( 'elementor_global_image_lightbox', '' );
            }

            $blog_page_id  = get_page_by_title( 'Blog' );
            update_option( 'page_for_posts', $blog_page_id->ID );

        } elseif ( 'Home Four' === $selected_import['import_file_name'] ) {
            //Delete Post 1
            wp_delete_post(1);

            // Assign menus to their locations.
            $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

            set_theme_mod( 'nav_menu_locations', array(
                'main_menu' => $main_menu->term_id,
            ));

            //Set Front page
            $page = get_page_by_title( 'Home Four');
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );

                // Disable Elementor's Default Colors and Default Fonts
                update_option( 'elementor_disable_color_schemes', 'yes' );
                update_option( 'elementor_disable_typography_schemes', 'yes' );
                update_option( 'elementor_global_image_lightbox', '' );
            }

            $blog_page_id  = get_page_by_title( 'Blog' );
            update_option( 'page_for_posts', $blog_page_id->ID );

        } elseif ( 'Home Five' === $selected_import['import_file_name'] ) {
            //Delete Post 1
            wp_delete_post(1);

            // Assign menus to their locations.
            $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

            set_theme_mod( 'nav_menu_locations', array(
                'main_menu' => $main_menu->term_id,
            ));

            //Set Front page
            $page = get_page_by_title( 'Home Five');
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );

                // Disable Elementor's Default Colors and Default Fonts
                update_option( 'elementor_disable_color_schemes', 'yes' );
                update_option( 'elementor_disable_typography_schemes', 'yes' );
                update_option( 'elementor_global_image_lightbox', '' );
            }

            $blog_page_id  = get_page_by_title( 'Blog' );
            update_option( 'page_for_posts', $blog_page_id->ID );

        }

    }

    add_action( 'pt-ocdi/after_import', '_themename_after_import' );
endif;