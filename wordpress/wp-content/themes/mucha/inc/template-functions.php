<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Mucha
 */

/**
 * Function to get Body Classes
 */
if ( ! function_exists( 'mucha_body_classes' ) ) :
    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     * @return array
     */
    function mucha_body_classes( $classes ) {
    	// Adds a class of hfeed to non-singular pages.
    	if ( ! is_singular() ) {
    		$classes[] = 'hfeed';
    	}

    	// Adds a class of no-sidebar when there is no sidebar present.
    	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    		$classes[] = 'no-sidebar';
    	}

        $show_mobile_logo = get_theme_mod( 'show_mobile_logo', false );
        if ( true == $show_mobile_logo ){
            $classes[] = 'mucha-mobile-logo';
        }

        $site_content_layout = get_theme_mod( 'site_content_layout', 'full-width' );

        $classes[] = 'mucha-' . esc_attr( $site_content_layout );    


        $header_layout           = get_theme_mod( 'header_layout', 'header-layout-1' );
        if ( 'header-layout-6' == $header_layout ){
            $classes[] = 'mucha-wrapper-' . esc_attr( $header_layout ); 
        }

        // Sidebar Layout
        global $post;
        $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right_sidebar' ); 
        $sidebar_layout = apply_filters( 'mucha_sidebar_global_layout', $sidebar_layout );
        if ( $post  && is_singular() ) {
            $sidebar_post_options = get_post_meta( $post->ID, 'sidebar_options', true );
            if ( isset( $sidebar_post_options ) && ! empty( $sidebar_post_options ) ) {
                if ( 'customizer_setting' == $sidebar_post_options ){
                    $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right_sidebar' );
                } else{
                    $sidebar_layout = $sidebar_post_options;
                }
                
            }
        }
        if ( ! is_404() ){
            $classes[] = 'global-layout-' . esc_attr( $sidebar_layout );  
        }
          

    	return $classes;
    }
endif;
add_filter( 'body_class', 'mucha_body_classes' );


/**
 * Function to get Header Classes
 */
if ( ! function_exists( 'mucha_header_classes' ) ) :

    /**
     * Function to get Header Classes
     *
     * @since 1.0.0
     */
    function mucha_header_classes() {
        $header_layout           = get_theme_mod( 'header_layout', 'header-layout-1' );
        $show_transparent_header = get_theme_mod( 'show_transparent_header', false );
        $show_breadcrumb = get_theme_mod( 'show_breadcrumb', true );
        $transparent_logo = get_theme_mod( 'transparent_logo' );
        $transparent_logo_url = wp_get_attachment_image_url( $transparent_logo, 'full', false);
        $classes = array( 'site-header' );       
        if ( true == $show_transparent_header ){
            if ( false == $show_breadcrumb && ! is_front_page() ){
                $classes[] = 'mucha-transparent-header-disable';
            }elseif( empty( $transparent_logo_url )) {
                $classes[] = 'mucha-transparent-header-without-logo';
            } else{
                $classes[] = 'mucha-transparent-header';
            }
            
        }

        $classes[] = 'mucha-' . $header_layout;

        $classes = array_unique( apply_filters( 'mucha_header_class', $classes ) );

        $classes = array_map( 'sanitize_html_class', $classes );

        echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
    }
endif;

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function mucha_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'mucha_pingback_header' );

if( ! function_exists( 'mucha_primary_navigation_fallback' ) ) :

    /**
     * Fallback for primary navigation.
     */
    function mucha_primary_navigation_fallback() {
        echo '<div class="menu-top-menu-container"><ul>';
        echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'mucha' ). '</a></li>';
        wp_list_pages( array(
            'title_li' => '',
            'depth'    => 1,
            'number'   => 5,
        ) );
        echo '</ul></div>';

    }

endif;
