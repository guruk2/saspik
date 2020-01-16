<?php
/**
 * Template for displaying single page header
 */


$meta_data = saaspik_option('saaspik_single_display_meta', ['author', 'comment', 'category']);

while(have_posts()) : the_post(); ?>
    <section class="page-banner blog-details-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <?php
                if ( in_array( 'date', (array) $meta_data ) ) { ?>
                    <ul class="post-meta color-theme">
                        <li><?php saaspik_posted_on(); ?></li>
                    </ul>
                <?php } ?>

                <h1 class="page-title"><?php the_title() ?></h1>          
           

                <ul class="post-meta">

                <?php if ( in_array( 'author', (array) $meta_data )) { ?>
                    <li> <?php esc_html_e('By', '_themename') ?>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                            <?php echo get_the_author(); ?>
                        </a>
                    </li>
				<?php } ?>
                   

                    <?php 
                    if ( in_array( 'comment', (array) $meta_data ) ){ ?>
                        <li> 
                            <?php saaspik_comment_count(get_the_ID());  ?> 
                        </li>
                    <?php } 

                    if ( in_array( 'category', (array) $meta_data ) ){ ?>
                        <li> <?php the_category(', ') ?> </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.page-title-wrapper -->
        </div>
        <!-- /.container -->
        
        <svg class="circle" data-parallax='{"x" : -200}' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="950px" height="950px">
            <path fill-rule="evenodd" stroke="rgb(250, 112, 112)" stroke-width="100px" stroke-linecap="butt" stroke-linejoin="miter" opacity="0.051" fill="none" d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z" />
        </svg>

        <ul class="animate-ball">
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </ul>
    </section>
    <!-- /.page-banner -->
<?php
endwhile;


