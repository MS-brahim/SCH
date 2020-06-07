<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bring_back
 */

// Footer Top ( CTA )
$enable_footer_top =  get_theme_mod( 'enable_footer_top', false );
$footer_top_text = get_theme_mod( 'footer_top_text', '' );
$footer_top_btn_text = get_theme_mod( 'footer_top_btn_text', '' );
$footer_top_btn_url = get_theme_mod( 'footer_top_btn_url', '' );

// Footer Copy Right
$footer_copyright = get_theme_mod( 'footer_copyright', esc_html( 'Bring Back powered by themetim' ) );

// Footer Layout

$footer_columns = get_theme_mod( 'footer_columns', '4' );

?>

<!-- .footer start -->
<footer class="footer">
    <?php if ( true == esc_attr( $enable_footer_top ) ) : ?>
    <!-- .footer-top start -->
    <div class="container footer-top wow slideInUp" data-wow-delay=".1s">
        <div class="row">
            <div class="col-12">
                <div class="footer-top-wrapper d-lg-flex align-items-lg-center">

                    <?php if ( esc_html( $footer_top_text ) != '' ) : ?>
                    <h2 class="float-left"><?php echo esc_html( $footer_top_text ); ?></h2>
                    <?php endif;

                    if ( esc_html( $footer_top_btn_text ) != '' ) : ?>
                    <a href="<?php echo esc_url( $footer_top_btn_url ); ?>" class="btn ml-lg-auto"><?php echo esc_html( $footer_top_btn_text ); ?></a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- .footer-top end -->
    <?php endif; ?>

     <?php if ( is_active_sidebar( 'footer-widget' ) or is_active_sidebar( 'footer-widget-2' ) or is_active_sidebar( 'footer-widget-3' ) or is_active_sidebar( 'footer-widget-4' ) ) : ?>
    <!-- .footer-middle start -->
    <div class="container footer-middle">
        <div class="row">
            <?php get_template_part( 'footer-layout/layout' ); ?>
        </div>
    </div>
    <!-- .footer-middle end -->
    <?php endif; ?>

    <!-- .footer-bottom start -->
    <div class="container-fluid footer-bottom text-center copyright">
        <div class="row">
            <div class="col-12">
                <p class="m-0">
                    <a href="<?php echo esc_url( 'https://www.themetim.com/' ); ?>"><?php echo esc_html( $footer_copyright ); ?></a>
                </p>
            </div>
        </div>
    </div>
    <!-- .footer-bottom end -->
</footer>
<!-- .footer end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
