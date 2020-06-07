<?php
/**
 * Template Name: Right Sidebar
 *
 * @package bring_back
 * @subpackage bring_back
 */
get_header();
?>

    <main id="content" class="left-sidebar-page">
        <section class="<?php bring_back_PaddingTop(); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-12">
                        <?php
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php

get_footer();