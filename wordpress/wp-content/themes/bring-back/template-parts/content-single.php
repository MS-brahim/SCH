<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */
if ( is_singular() ) :
    $class[] = 'col-12 blog-content-details mb-30';
endif;
?>
<!-- .blog-item start -->
<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <?php

    if(  ! class_exists('bring_back_Toolkit') ) :
    the_title( '<h1 class="entry-title h2">', '</h1>' );
    endif;

    if ( 'post' === get_post_type() ) :
        ?>
        <div class="entry-meta meta mb-30">
            <?php
            bring_back_posted_by();
            bring_back_posted_on();
            ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>

    <?php
    if( ! is_singular( 'bb-services' ) ) :
    bring_back_post_thumbnail();
    endif;
    ?>

    <div class="mt-30 text-justify">
        <?php the_content(); ?>
    </div>

    <div class="social-share-tags overflow-hidden align-items-lg-center d-lg-flex">
    <?php bring_back_entry_footer(); ?>
    </div>

</div><!-- .blog-item-<?php the_ID(); ?> end -->