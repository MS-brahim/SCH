<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */

get_header();
?>
    <!-- .main start -->
    <main id="main" class="site-main main">
        <!-- .blog-wrapper start -->
        <section class="blog-wrapper<?php bring_back_PaddingTop(); ?>">
            <div class="container">
                <div class="row">
                    <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) :
                            ?>
                            <h1 class="page-title screen-reader-text col-12"><?php single_post_title(); ?></h1>
                        <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_type() );

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
        <!-- .blog-wrapper end -->
    </main>
    <!-- .main end -->
<?php
get_footer();