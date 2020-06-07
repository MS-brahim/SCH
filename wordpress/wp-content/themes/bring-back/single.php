<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bring_back
 */

get_header();
$col = '12';
if ( !is_singular('bb-services' ) && !is_singular('bb-case-studies' ) ) {
    $col = '8';
}
    ?>

    <main id="main" class="site-main main">
        <!-- .blog-wrapper start -->
        <section class="blog-wrapper<?php bring_back_PaddingTop(); ?>">
            <div class="container">
                <div class="row">
                    <?php
                    get_sidebar();
                    ?>
                    <div class="col-lg-<?php echo esc_attr( $col ); ?> col-12">
                        <div class="row">
                            <?php
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content-single', get_post_type() );

                                the_post_navigation();

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- .blog-wrapper end -->
    </main><!-- #main -->

<?php
get_footer();