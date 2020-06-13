<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bring_back
 */

get_header();

?>

    <main id="main" class="site-main main">
        <!-- .blog-wrapper start -->
        <section class="our-services<?php bring_back_PaddingTop(); ?>">
            <div class="container">
                <div class="row">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/service-single', get_post_type() );

                        the_post_navigation();

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </section>
        <!-- .blog-wrapper end -->
    </main><!-- #main -->

<?php
get_footer();