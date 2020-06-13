<?php

/**
 * bring_back
 * variable settings
 */

function bring_back_style_variable( $color ) {

    $color = '';

    /**
     * Header
     *
     * General Settings
     */

    $header_bg_img = get_theme_mod( 'header_bg_img', get_template_directory_uri() . '/images/header-shape.jpg' );
    $hero_shape = get_theme_mod( 'hero_shape', get_template_directory_uri() . '/images/dot-circle.png' );
    $header_background_color = get_theme_mod( 'header_background_color' );
    $header_padding_top = get_theme_mod( 'header_padding_top' );
    $enable_header_bg_img = get_theme_mod( 'enable_header_bg_img' );

    if ( $enable_header_bg_img ){
        $header_bg_img = esc_url( $header_bg_img );
        $color .= ".home .header{background-image: url( $header_bg_img );}";
    }

    if ( $hero_shape ){
        $hero_shape = esc_url( $hero_shape );
        $color .= ".hero-content:before{background-image: url( $hero_shape );}";
    }

    $color .= ".site-header, .home .site-header{ background-color:" . esc_attr($header_background_color) . "} ";
    $color .= ".header-wrapper{ padding:" . esc_attr($header_padding_top) .'px 0'. "} ";

    /**
     * Header
     *
     * Hero Area
     */
    $hero_padding_top = get_theme_mod( 'hero_padding_top' );
    $color .= ".hero-area{ padding:" . esc_attr($hero_padding_top) .'px 0'. "} ";

    /**
     * Inline CSS
     */
    wp_add_inline_style( 'bring-back-style', $color );
}
add_action( 'wp_enqueue_scripts', 'bring_back_style_variable' );