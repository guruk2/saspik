<?php
/**
 * Template for displaying search forms
 *
 * @package  saaspik
 * @since    1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', '_themename' ); ?></span>
		<input type="search" class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', '_themename' ); ?>"
		value="<?php echo get_search_query() ?>" name="s"
		title="<?php echo esc_attr_x( 'Search for:', 'label', '_themename' ); ?>"/>
	</label>
	<button type="submit" class="search-submit">
		<i class="ei ei-icon_search"></i>
		<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', '_themename' ); ?></span>
	</button>
</form>


