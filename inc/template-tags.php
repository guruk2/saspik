<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package saaspik
 */

if ( ! function_exists( 'saaspik_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function saaspik_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	}
endif;


if ( ! function_exists( 'posted_meta_on' ) ) :
function posted_meta_on(){
	global $post;
	

	printf(
		'<span class="author vcard">%1$s</span>',
		sprintf(
			'<a class="url fn n post-author" href="%1$s"> %2$s %3$s</a>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_avatar(get_the_author_meta( 'ID' ), 40 ),
			esc_html( get_the_author() )
		)
	);



	$allowed_html = array(
		'span' => array(
			'class' => true,
		),
		'br' => array(),
		'em' => array(),
		'strong' => array()
	);
}

endif;



if ( ! function_exists( 'saaspik_comment_count' ) ) :
	// Get comment count text
	function saaspik_comment_count($post_id, $no_comments = 'No Comments') {
		$comments_number = get_comments_number($post_id);
		if($comments_number == 0) {
			$comment_text = $no_comments;
		}elseif($comments_number == 1) {
			$comment_text = esc_html__('1 Comment', '_themename');
		}elseif($comments_number > 1) {
			$comment_text = $comments_number.esc_html__(' Comments', '_themename');
		}
		echo esc_html($comment_text);
	}
endif;


if ( ! function_exists( 'saaspik_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function saaspik_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', '_themename' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'saaspik_posted_tag' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function saaspik_posted_tag() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {		

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', '_themename' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tagcloud">' . esc_html__( 'Tags: %1$s', '_themename' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;


if ( ! function_exists( 'saaspik_posted_comments' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function saaspik_posted_comments() {
			// Hide category and tag text for pages.
		
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'No Comments<span class="screen-reader-text"> on %s</span>', '_themename' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);			
		}

	}
endif;


if ( ! function_exists( 'saaspik_entry_cat' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function saaspik_entry_cat() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', '_themename' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( esc_html__( ' %1$s', '_themename' ), $categories_list ); // WPCS: XSS OK.
			}
			
		}


		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', '_themename' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link ml_5">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'saaspik_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function saaspik_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('saaspik-blog-list'); ?>
			</div><!-- .post-thumbnail -->

			<?php else : ?>

				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php
					the_post_thumbnail( 'saaspik-blog-list', array(
						'alt' => the_title_attribute( array(
							'echo' => false,
						) ),
					) );
					?>
				</a>

				<?php
		endif; // End is_singular().
	}
endif;


/**
 * Comment List
 */

function saaspik_comment($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	?>
	<li <?php comment_class( $args['has_children'] ? 'post_comment has_children' :'post_comment') ?> id="comment-<?php comment_ID() ?>">
		<div class="post_author">
			<div class="avatar-container">
				<?php
				if(get_avatar($comment)) {
					echo get_avatar($comment, 70, null, null, array('class'=> 'avatar'));
				}
				?>
			</div>
			<div class="media-body">
				<div class="comment_info">
					<h3> <?php comment_author(); ?> </h3>
					<div class="comment-date"> <?php comment_date(get_option('date_format')); ?> </div>
				</div>                

				<?php if ($comment->comment_approved == '0') : ?>
					<em> <?php esc_html_e('Your comment is awaiting moderation.', '_themename') ?></em><br />
				<?php endif; ?>
				<?php comment_text(); ?>

				<?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="ei ei-arrow_back"></i>' .'Reply',  'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
		</div>
		<?php
	}



/**
 * Comment Field Order
 */

function saaspik_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'saaspik_move_comment_field_to_bottom' );



/**
 * [saaspik_get_embeded_things description]
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
function saaspik_get_embeded_things( $content ) {
	$videos = get_media_embedded_in_content( $content, array('video', 'object', 'embed', 'iframe') );

	return isset($videos[0]) ? $videos[0] : null;
}

