<?php
/**
 * WooCommerce Compatibility.
 *
 * @package Mucha
 */

// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}
/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function mucha_woocommerce_setup() {

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}

add_action( 'after_setup_theme', 'mucha_woocommerce_setup' );

// Remove Breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// Remove Sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

if ( ! function_exists( 'mucha_woocommerce_get_sidebar' ) ) :

	/**
	 * Get WooCommerce Sidebar.
	 */
	function mucha_woocommerce_get_sidebar() {
        // Sidebar Layout
        global $post;
        $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right_sidebar' ); 
        $sidebar_layout = apply_filters( 'mucha_woo_sidebar_global_layout', $sidebar_layout ); 
        if ( $post  && is_singular( 'product' )  ) {
        	$sidebar_post_options = get_post_meta( $post->ID, 'sidebar_options', true );
            if ( isset( $sidebar_post_options ) && ! empty( $sidebar_post_options ) ) {
                if ( 'customizer_setting' == $sidebar_post_options ){
                    $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right_sidebar' );
                } else{
                    $sidebar_layout = $sidebar_post_options;
                }
                
            }        	
        }
		if ( 'no_sidebar' == $sidebar_layout ){
			return;
		}
		$sidebar = apply_filters( 'mucha_woo_get_sidebar', 'woo-sidebar' );
		if ( is_active_sidebar( $sidebar ) ) : ?>
			<aside id="secondary" class="widget-area">		

				<?php dynamic_sidebar( $sidebar ); ?>
					
			</aside><!-- #secondary -->
		<?php endif; 
	}
endif;
add_action( 'woocommerce_sidebar', 'mucha_woocommerce_get_sidebar', 10 );
