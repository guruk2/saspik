<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	    /*Saaspik Contact Widget*/

		CSF::createWidget( 'saaspik_widget_newsletter', array(
			'title'       => __('Saspik Newsletter Widget', '_themename'),
			'classname'   => 'saaspik-newsletter-widget',
			'fields'      => array(
				array(
					'id'      => 'title',
					'type'    => 'text',
					'title'   => __('Widget Title', '_themename'),
				),
				array(
					'id'      => 'description',
					'type'    => 'textarea',
					'title'   => 'Text',
					'default' => __('Lavaca Street, Suite 24, Road Apt New York, USA', '_themename'),
				),
			)
		) );
	
		//
		// Front-end display of widget example 1
		// Attention: This function named considering above widget base id.
		//
		if( ! function_exists( 'saaspik_widget_newsletter' ) ) {
			function saaspik_widget_newsletter( $args, $instance ) {
	
				echo wp_kses_post($args['before_widget']);
	
				if ( ! empty( $instance['title'] ) ) { 
					echo wp_kses_post($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post($args['after_title']);
				}
	
		
				if(! empty( wp_kses_post($instance['description']))) { ?>
					<p><?php echo wp_kses_post($instance['description']); ?></p>
				<?php } ?>

                <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post"  class="newsletter-form-two widget-newsletter wow pixFadeUp" data-saaspik-form="newsletter-subscribe">
                    <input type="hidden" name="action" value="saaspik_mailchimp_subscribe">

                    <div class="newsletter-inner">
                        <input type="email" name="email" class="form-control" id="newsletter-form-email" placeholder="<?php echo esc_attr__( 'Enter Your Email Address', '_themename'); ?>" required>
                        <button type="submit" name="submit" id="newsletter-submit" class="newsletter-submit">
                            <span class="fa fa-paper-plane-o"></span>
                            <i class="fa fa-circle-o-notch fa-spin"></i>
                        </button>
                    </div>

                    <div class="form-result alert">
                        <div class="content"></div>
                    </div><!-- /.form-result-->
                </form><!-- /.newsletter-form -->

				<?php echo wp_kses_post($args['after_widget']);
			}
		}
	}
	