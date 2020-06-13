<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */

$class[] = 'col-lg-12 col-12';

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="case-details-content">
        <?php
            the_content();
            ?>
    </div>

</div><!-- .blog-item-<?php the_ID(); ?> end -->