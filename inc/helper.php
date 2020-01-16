<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function _themename_enqueue_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';

    /* Body font */
    if (  'off' !== 'on'  ) {
        $fonts[] = "Poppins:300,400,500,600,700,800,900";
    }

    $is_ssl = is_ssl() ? 'https' : 'http';

    if (  $fonts  ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts  ) ),
            'subset' => urlencode( $subsets ),
        ), "$is_ssl://fonts.googleapis.com/css" );
    }

    return $fonts_url;
}


/**
 * Render header layout.
 *
 * @return string
 */
if ( ! function_exists( 'saaspik_header' ) ) {
	function saaspik_header() {
		$layout = saaspik_option( 'header-layout', 'style_one') ;
		$meta  = get_post_meta( get_the_ID(), 'saaspik_page_options',  true );
		$layout = empty($meta['header-layout']) ? $layout : $meta['header-layout'];

		if ( $layout == 'style_one') {		
			get_template_part( 'template-parts/header/layout-1' );

		} else if ( $layout == 'style_two') {		
			get_template_part( 'template-parts/header/layout-2' );
		} else if ( $layout == 'style_three') {		
			get_template_part( 'template-parts/header/layout-3' );
		}

	}
}


/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return string
 */
if ( ! function_exists( 'saaspik_post_pagination' ) ) {
	function saaspik_post_pagination( $nav_query = false ) {

		global $wp_query, $wp_rewrite;

		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		// Prepare variables
		$query        = $nav_query ? $nav_query : $wp_query;
		$max          = $query->max_num_pages;
		$current_page = max( 1, get_query_var( 'paged' ) );
		$big          = 999999;
		?>
		<nav id="post-pagination">
			<?php
				echo '' . paginate_links(
					array(
						'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'    => '?paged=%#%',
						'current'   => $current_page,
						'total'     => $max,
						'type'      => 'list',
						'prev_text' => '<i class="fa fa-angle-left"></i>',
						'next_text' => '<i class="fa fa-angle-right"></i>'
					)
				) . ' ';
			?>
		</nav><!-- .page-nav -->
		<?php
	}
}

/**
* Frameborder Attribute Remove
*/

function _themename_remove_frameborder( $html, $url ) {
    // If the URL to be embedded is from YouTube.
    if ( strpos( $url, 'youtube.com' ) !== false ) {
        // Replace the frameborder attribute with an empty string.
        $html = str_replace( 'frameborder="0"', '', $html );
    }

    return $html;
}
add_filter( 'embed_oembed_html', '_themename_remove_frameborder', 10, 2 );