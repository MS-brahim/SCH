<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */
if ( is_singular() ) :
    $class[] = 'col-12 mb-30';
endif;
?>

<!-- .blog-item start -->
<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="mt-30 text-justify">
        <?php the_content(); ?>
    </div>

</div><!-- .blog-item-<?php the_ID(); ?> end -->