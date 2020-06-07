<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bring_back
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}


if( ! is_singular('bb-services' ) && ! is_singular( 'bb-case-studies' ) ) { ?>
    <div id="secondary" class="widget-area col-lg-4 col-12 sidebar">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #secondary -->
<?php }