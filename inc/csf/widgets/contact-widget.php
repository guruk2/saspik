<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	    /*Saaspik Contact Widget*/

		CSF::createWidget( 'saaspik_widget_contact', array(
			'title'       => __('Saspik Contact Widget', '_themename'),
			'classname'   => 'saaspik-contact-widget',   
			'fields'      => array(
				array(
					'id'      => 'title',
					'type'    => 'text',
					'title'   => __('Widget Title', '_themename'),
				),
				array(
					'id'      => 'address',
					'type'    => 'textarea',
					'title'   => 'Text',
					'default' => __('Lavaca Street, Suite 24, Road Apt New York, USA', '_themename'),
				),
				array(
					'id'      => 'opt-switcher',
					'type'    => 'switcher',
					'title'   => 'Switcher',
				),
			)
		) );
	
		//
		// Front-end display of widget example 1
		// Attention: This function named considering above widget base id.
		//
		if( ! function_exists( 'saaspik_widget_contact' ) ) {
			function saaspik_widget_contact( $args, $instance ) {
	
				echo wp_kses_post($args['before_widget']);
	
				if ( ! empty( $instance['title'] ) ) { 
					echo wp_kses_post($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post($args['after_title']);
				}
	
		
				if(! empty( wp_kses_post($instance['address']))) { ?>
					<p><?php echo wp_kses_post($instance['address']); ?></p> 
				<?php }

				if( ! empty( $instance['opt-switcher'] ) ) {

						$profail_link = saaspik_option( 'saaspik_social_links' );

						if ( ! empty( $profail_link ) ) :
								echo '<ul class="footer-social-link">';
								foreach ($profail_link as $item ) : ?>
									<li>
										<a href="<?php echo esc_url( $item['url'] ); ?>">
											<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
										</a>
									</li>
									<?php
								endforeach;
								echo '</ul>';
						endif;
				}
				echo wp_kses_post($args['after_widget']);
			}
		}
	}
	