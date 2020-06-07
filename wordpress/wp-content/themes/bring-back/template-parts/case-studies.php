<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */

$class[] = 'col-lg-4 col-sm-6 col-12 case-studies-item mb-30';

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="case-studies-box">

        <?php
        if( has_post_thumbnail() ) :
            ?>
            <div class="thumbnail">
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                    <?php
                    the_post_thumbnail( 'post-thumbnail img-fluid', array(
                        'alt' => the_title_attribute( array(
                            'echo' => false,
                        ) ),
                    ) );
                    ?>
                </a>
            </div>

        <?php

        endif;

        the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

        the_excerpt(); ?>

        <a href="<?php echo esc_url( get_permalink() ); ?>" class="view-details text-capitalize mt-30"><?php esc_html_e( 'View Details', 'bring-back' ); ?></a>

    </div>

</div><!-- .blog-item-<?php the_ID(); ?> end -->