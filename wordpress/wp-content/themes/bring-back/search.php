<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bring_back
 */

get_header();
?>

    <main id="main" class="site-main main">
        <!-- .search-wrapper start -->
        <section class="search-wrapper<?php bring_back_PaddingTop(); ?>">
            <div class="container">
                <div class="row">
                    <?php if ( have_posts() ) :
                        if(  ! class_exists('bring_back_Toolkit') ) :
                            ?>

                            <div class="page-header col-12">
                                <h1 class="page-title">
                                    <?php
                                    /* translators: %s: search query. */
                                    printf( esc_html__( 'Search Results for: %s', 'bring-back' ), '<span>' . get_search_query() . '</span>' );
                                    ?>
                                </h1>
                            </div><!-- .page-header -->

                        <?php

                        endif;
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );

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
        <!-- .search-wrapper end -->
    </main><!-- #main -->

<?php
get_footer();