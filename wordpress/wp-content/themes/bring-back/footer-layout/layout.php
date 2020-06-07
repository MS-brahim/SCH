<?php

$footerCol = get_theme_mod( 'footer_columns', 'four' );

if ( esc_attr( $footerCol ) == 'four' ) { ?>

    <div class="col-lg-3 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".1s">
        <?php
        if ( is_active_sidebar( 'footer-widget' ) ) :
            dynamic_sidebar( 'footer-widget' );
        endif;
        ?>
    </div>

    <div class="col-lg-3 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".2s">
        <?php
        if ( is_active_sidebar( 'footer-widget-2' ) ) :
            dynamic_sidebar( 'footer-widget-2' );
        endif;
        ?>
    </div>

    <div class="col-lg-3 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".3s">
        <?php
        if ( is_active_sidebar( 'footer-widget-3' ) ) :
            dynamic_sidebar( 'footer-widget-3' );
        endif;
        ?>
    </div>

    <div class="col-lg-3 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".4s">
        <?php
        if ( is_active_sidebar( 'footer-widget-4' ) ) :
            dynamic_sidebar( 'footer-widget-4' );
        endif;
        ?>
    </div>

    <?php

} elseif ( esc_attr( $footerCol ) == 'three' ) { ?>

    <div class="col-lg-4 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".1s">
        <?php
        if ( is_active_sidebar( 'footer-widget' ) ) :
            dynamic_sidebar( 'footer-widget' );
        endif;
        ?>
    </div>

    <div class="col-lg-4 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".2s">
        <?php
        if ( is_active_sidebar( 'footer-widget-2' ) ) :
            dynamic_sidebar( 'footer-widget-2' );
        endif;
        ?>
    </div>

    <div class="col-lg-4 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".3s">
        <?php
        if ( is_active_sidebar( 'footer-widget-3' ) ) :
            dynamic_sidebar( 'footer-widget-3' );
        endif;
        ?>
    </div>
<?php } else { ?>
    <div class="col-lg-6 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".1s">
        <?php
        if ( is_active_sidebar( 'footer-widget' ) ) :
            dynamic_sidebar( 'footer-widget' );
        endif;
        ?>
    </div>
    <div class="col-lg-6 col-sm-6 col-12 mt-30 wow slideInUp" data-wow-delay=".2s">
        <?php
        if ( is_active_sidebar( 'footer-widget-2' ) ) :
            dynamic_sidebar( 'footer-widget-2' );
        endif;
        ?>
    </div>
<?php }