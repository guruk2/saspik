<?php


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'portfolio_options';
  
	//
	// Create a metabox
	CSF::createMetabox( $prefix, array(
	  'title'     => esc_html__('Portfolio Options', '_themename'),
	  'post_type' => 'saaspik_portfolio',
	  'context'   => 'normal', // The context within the screen where the boxes should display. `normal`, `side`, `advanced`
	) );
  
	//
	// Create a section
	CSF::createSection( $prefix, array(
	  	'title'  => esc_html__('Portfolio Info', '_themename'),
	  	'fields' => array(
			array(
				'id'        => 'portfolio_info',
				'type'      => 'group',
				'title'     => esc_html__('Info', '_themename'),
				'button_title' => esc_html__('Add New Info', '_themename'),
				'fields'    => array(
					array(
						'id'    => 'opt-text',
						'type'  => 'text',
						'title' => esc_html__('Info Title', '_themename'),
					),
					array(
						'id'    => 'opt-des',
						'type'  => 'textarea',
						'title' => esc_html__('Info Description', '_themename'),
					),			 
				),

				'default'   => array(
					array(
						'opt-text'     => esc_html__( 'Date', '_themename' ),
						'opt-des'    => esc_html__('March 24, 2019', '_themename'),
					),
					array(
						'opt-text'     => esc_html__( 'Client Name', '_themename'),
						'opt-des'    => esc_html__('Jacklyn Fichter', '_themename'),
					),
					array(
						'opt-text'     => esc_html__( 'Project Type', '_themename'),
						'opt-des'    => esc_html__('Digital Design, Suke Agency', '_themename')
					),
				),
			),
  
	  	)
	));  
}
  