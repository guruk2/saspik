<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

/*
 * Recent Post Widget
 */

  CSF::createWidget( 'saaspik_recent_posts_widget', array(
    'title'       => __( 'Saspik Recent Posts', '_themename' ),
    'classname'   => 'saaspik-recent-posts',
    'description' => __( 'Display recent posts', '_themename' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => __( 'Title', '_themename' ),
        ),
        array(
            'id'      => 'postcount',
            'type'    => 'text',
            'title'   => __( 'Number of posts to show', '_themename' ),
        ),
        array(
            'id'      => 'is_post_date',
            'type'    => 'switcher',
            'title'   => __( 'Display post date?', '_themename' ),
            'default' => true
        ),
        array(
            'id'      => 'is_post_image',
            'type'    => 'switcher',
            'title'   => __( 'Display post image?', '_themename' ),
            'default' => true
        ),
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'saaspik_recent_posts_widget' ) ) {
    function saaspik_recent_posts_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );

        if ( ! empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }

        $recent_posts = new WP_Query( array(
            'posts_type'            => 'post',
            'posts_per_page'        => $instance['postcount'],
            'no_found_rows'         => true,
            'ignore_sticky_posts'   => true
        ) );
        
        
        if( $recent_posts->have_posts() ) :
            while( $recent_posts->have_posts() ) : $recent_posts->the_post();
        ?>
            <div class="widget-post media">

                <?php
                if( ! empty( $instance['is_post_image'] ) ) { 
                    the_post_thumbnail( 'saaspik-recent-post-thumb', array(
                        'alt'   => the_title_attribute( array(
                            'echo' => false
                        ) ),
                    ) );
                }
                ?>

                <div class="media-body">
                    <?php
                    the_title( '<h4><a href="' . get_permalink() . '">', '</a></h4>' );

                    if( ! empty( $instance['is_post_date'] ) ) {
                        saaspik_posted_on();
                    }
                    ?>
                </div>
            </div>

    <?php
            endwhile;
        wp_reset_postdata();
    endif;
      echo wp_kses_post( $args['after_widget'] );

    }
  }
}
