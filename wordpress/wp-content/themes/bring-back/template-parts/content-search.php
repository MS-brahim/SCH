<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */
$class[] = 'col-lg-4 col-sm-6 col-12 blog-item mb-30';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="items-box">

        <?php bring_back_post_thumbnail(); ?>

        <div class="blog-content">
            <?php
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

            if ( 'post' === get_post_type() ) :
                ?>
                <div class="entry-meta d-none">
                    <?php
                    bring_back_posted_by();
                    bring_back_posted_on();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>

            <?php the_excerpt(); ?>

            <a href="<?php echo esc_url( get_permalink() ); ?>" class="view-details text-capitalize mt-30"><?php esc_html_e( 'View Details', 'bring-back' ); ?></a>
        </div>
    </div>
</div><!-- #post-<?php the_ID(); ?> -->
