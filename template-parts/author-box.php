<?php
/**
 * Template for displaying the author bio box
 */

$display = saaspik_option('saaspik_single_author_bio' );

$description = get_the_author_meta( 'description' );


if ( $display == false  || empty( $description ) )
	return;
?>
<div class="saaspik_post_author_box">
	
	<div class="profile_image">
		<?php echo get_avatar( get_the_author_meta( 'email' ), '120' ); ?>
	</div><!-- /.profile_image -->

	<div class="profile_content">
		<h4 class="profile_name"><?php echo get_the_author(); ?></h4>

		<?php
			if ( ! empty( $description ) ) {
				echo '<div class="profile_bio">';
				echo '<p>';
				echo wp_kses_post( $description );
				echo '</p>';
				echo '</div>';
			}
		?>
	</div><!-- /.profile_content -->
</div><!-- /.cafe24_post_author_box -->