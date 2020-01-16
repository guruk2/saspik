<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package saaspik
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function _themename_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$meta = get_post_meta( get_the_ID(), 'saaspik_page_options', true );
	$metaopt  = isset( $meta['page_header_style']) ?  $meta['page_header_style'] : '';
	$opt = saaspik_option('page_header_style_main');

	$optport = saaspik_option('page_header_portfolio_style_main');



    if ( (is_front_page() && is_page() ) || $opt == 'background_main' || $metaopt == 'background')  {

           if( !is_singular('saaspik_portfolio') ) {
            $classes[] = 'menu-transperant';
        }
	}

    if ( $optport == 'background_portfolio_main')  {
        if( is_singular('saaspik_portfolio') ) {
            $classes[] = 'menu-transperant';
        }
	}

	return $classes; 
}


add_filter( 'body_class', '_themename_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function _themename_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', '_themename_pingback_header' );


/**
 * Preloader
 */
function _themename_preloader_markup() {

	$preloader = saaspik_option('preloader');
	$preloader_opt = saaspik_option('saaspik_preloader');
	$preloader_type = saaspik_option('preloader-type');
	$preloader_img = saaspik_option('preloader-images');


	if ( !empty( $preloader_opt ) ) :
		$style_name = substr( $preloader_opt, 0, -2 );
		$style_div = substr( $preloader_opt, -1 );
		if ( $preloader ) : ?>

		<div id="preloader">
			<?php if ( $preloader_type == 'css' ) : ?>
			<div id="loader">
				<div class="loader-inner <?php echo esc_attr( $style_name ); ?>">
					<?php for ( $div=0; $div < $style_div; $div++ ) : ?>
					<div></div>
					<?php endfor; ?>
				</div>
			</div><!-- /#loader -->
			<?php elseif ( $preloader_type == 'preloader-img' ) : ?>
			<?php $img = wp_get_attachment_image_src( $preloader_img, 'full', true ); ?>

			<img class="pr" src="<?php echo esc_url( $img[0] ); ?>" width="<?php echo esc_attr( $img[1] ); ?>"
				height="<?php echo esc_attr( $img[2] ); ?>" alt="<?php get_bloginfo( 'name' ); ?>" />
			<?php endif; ?>
		</div><!-- /#preloader -->
	<?php
			endif;
		endif;
	}


add_action( '_themename_after_body', '_themename_preloader_markup', 1 );

if ( !function_exists( '_themename_content_read_more' ) ) {

	function _themename_content_read_more( $num = 20, $button = true ) {

		$excerpt		 = get_the_excerpt();
		$trimmed_content = wp_trim_words( $excerpt, 
			$num_words = $num, 
			$more = null );
		echo '<div class="entry-content">';
		echo wp_kses_post( $trimmed_content );
		echo '</div>';
		if ( $button == true ) {
			echo '<div class="btn-wraper"><a href="' . get_the_permalink() . '" class="btn-read-more">' . esc_html__( 'Read More', '_themename' ) . '<i class="icon icon-arrow-right"></i></a></div>';
		}
	}

}

/**
 * Trim text
 */

if ( !function_exists('saspik_substring') ) {
	function saspik_substring($string, $limit, $afterlimit = '[...]') {
		if ( empty($string) ) {
			return $string;
		}
		$string = explode(' ', strip_tags( $string ), $limit);

		if (count($string) >= $limit) {
			array_pop($string);
			$string = implode(" ", $string) .' '. $afterlimit;
		} else {
			$string = implode(" ", $string);
		}
		$string = preg_replace('`[[^]]*]`','',$string);
		return strip_shortcodes( $string );
	}
}


if ( !function_exists( 'saaspik_content_read_more' ) ) {

	function saaspik_content_read_more( $num = 20, $button = true ) {

		$excerpt		 = get_the_excerpt();
		$trimmed_content = wp_trim_words( $excerpt,
		$num_words = $num,
		$more = null );
		echo '<div class="entry-content">';
		echo wp_kses_post( $trimmed_content );
		echo '</div>';
		if ( $button == true ) {
			echo '<div class="btn-wraper"><a href="' . get_the_permalink() . '" class="btn btn-primary icon-right">' . esc_html__( 'Continue Reading', '_themename' ) . '<i class="icon icon-arrow-right"></i></a></div>';
		}
	}

}


//Breadecrumbs Inint
if ( !function_exists( '_themename_get_breadcrumbs' ) ) {

	function _themename_get_breadcrumbs( $seperator = ' > ' ) {

		echo '<ul class="saaspik_breadcrumbs list-inline"><li>';
		if ( !is_home() ) {
			echo '<a href="';
			echo esc_url( get_home_url( '/' ) );
			echo '">';
			echo esc_html__( 'Home', '_themename' );
			echo "</a>";
			if ( is_category() || is_single() ) {
				$category	 = get_the_category();
				$post		 = get_queried_object();
				$postType	 = get_post_type_object( get_post_type( $post ) );
				if ( !empty( $category ) ) {
					echo esc_attr( $seperator );
					echo esc_html( $category[ 0 ]->cat_name );
				} else if ( $postType ) {
					echo esc_attr( $seperator );
					echo esc_html( $postType->labels->singular_name );
				}
				if ( is_single() ) {
					echo esc_attr( $seperator );
					echo wp_trim_words( get_the_title(), 3 );
				}
			} elseif ( is_page() ) {
				echo esc_attr( $seperator );
				echo wp_trim_words( get_the_title(), 3 );
			}
		}
		if ( is_tag() ) {
			echo esc_attr( $seperator );
			single_tag_title();
		} elseif ( is_day() ) {
			echo esc_attr( $seperator );
			echo esc_html__( 'Blogs for', '_themename' ) . " ";
			the_time( 'F jS, Y' );
		} elseif ( is_month() ) {
			echo esc_attr( $seperator );
			echo esc_html__( 'Blogs for', '_themename' ) . " ";
			the_time( 'F, Y' );
		} elseif ( is_year() ) {
			echo esc_attr( $seperator );
			echo esc_html__( 'Blogs for', '_themename' ) . " ";
			the_time( 'Y' );
		} elseif ( is_author() ) {
			echo esc_attr( $seperator );
			echo esc_html__( 'Author Blogs', '_themename' );
		} elseif ( isset( $_GET[ 'paged' ] ) && !empty( $_GET[ 'paged' ] ) ) {
			echo esc_html__( 'Blogs', '_themename' );
		} elseif ( is_search() ) {
			echo esc_attr( $seperator );
			echo esc_html__( 'Search Result', '_themename' );
		} elseif ( is_404() ) {
			echo esc_attr( $seperator );
			echo esc_html__( '404 Not Found', '_themename' );
		}
		echo '</li></ul>';
	}

}