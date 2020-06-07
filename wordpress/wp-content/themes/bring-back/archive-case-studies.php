<?php
/**
 * The template for displaying case studies archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */

get_header();
?>
    <main id="main" class="site-main main">
        <!-- .blog-wrapper start -->
        <section class="<?php bring_back_PaddingTop(); ?> case-studies">
            <div class="container">
                <div class="row">
                    <?php if ( have_posts() ) :

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/case-studies', get_post_type() );

                        endwhile;

                        ?>
                        <div class="col-lg-12 col-sm-12 col-xs-12 pb-30 pt-30">
                            <div class="d-flex justify-content-center">
                                <?php
                                the_posts_pagination( array(
                                    'mid_size' => 2,
                                    'prev_text' => __( 'Prev', 'bring-back' ),
                                    'next_text' => __( 'Next', 'bring-back' ),
                                ) );
                                ?>
                            </div>
                        </div>
                    <?php

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </div>
            </div>
        </section>


    </main><!-- #main -->

<?php
get_footer();