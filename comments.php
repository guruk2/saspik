<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage saaspik
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="saaspik-comment-area comments-area">
	<?php if (have_comments()): ?>
		<div class="comment-inner">
			<h3 class="reply-title"><?php saaspik_comment_count(get_the_ID(), '') ?></h3>
			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', '_themename'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', '_themename')); ?></div>
				<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', '_themename')); ?></div>
			</nav>
		<?php endif; // check for comment navigation ?>
		<ul class="comment-list">
			<?php
				wp_list_comments(
					array(
						'type' => 'comment',
						'callback' => 'saaspik_comment',
						'avatar_size'	 => 80,
					),
					get_comments(array(
						'post_id' => get_the_ID(),
					))
				);

				the_comments_navigation();
			?>
		</ul>
		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', '_themename'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', '_themename')); ?></div>
			<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', '_themename')); ?></div>
		</nav>
	<?php endif; // check for comment navigation ?>
</div>
<?php endif; // have_comments() ?>

<?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) && ! is_page() ) : ?>
<h5 class="no-comments"><?php esc_html_e('Comments are closed.', '_themename'); ?></h5>
<?php endif; 

function alter_comment_form_fields($fields){
	unset($fields['comment_notes_after']);
	return $fields;
}
add_filter('comment_form_default_fields','alter_comment_form_fields');


$saaspik_commenter     = wp_get_current_commenter();

$saaspik_args          = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit',
	'class_submit' => 'pix-btn',
	'title_reply' => esc_html__('Leave a comment', '_themename'),
	'title_reply_to' => esc_html__('Leave a Reply to %s', '_themename'),
	'cancel_reply_link' => esc_html__('Cancel Reply', '_themename'),
	'label_submit' => esc_html__('Submit', '_themename'),
	'comment_notes_before' => '',
	'comment_field' => '<p class="comment-form-comment"><textarea placeholder="'.esc_attr__('Comment', '_themename').'" id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>',
	'fields' => apply_filters('comment_form_default_fields', array(
		'cookies' => '',
		'author' => '<p class="comment-form-author"><input placeholder="'.esc_attr__('Name', '_themename').'" id="author" name="author" type="text" value="' . esc_attr($saaspik_commenter['comment_author']) . '" size="30" /></p>',
		'email' => '<p class="comment-form-email"><input placeholder="'.esc_attr__('Email', '_themename').'" id="email" name="email" type="text" value="' . esc_attr($saaspik_commenter['comment_author_email']) . '" size="30" /></p>',

	))
);

comment_form($saaspik_args, get_the_ID()); ?>

</div>