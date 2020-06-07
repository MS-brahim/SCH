<?php
/**
 * Mucha Theme Customizer
 *
 * @package Mucha
 */

/**
 * Configuration for Kirki Framework
 */
function mucha_kirki_configuration() {
    return array( 'url_path'     => esc_url( get_template_directory_uri() ) . '/inc/libraries/kirki/' );
}
add_filter( 'kirki/config', 'mucha_kirki_configuration' );

/**
 * Mucha Kirki Config
 */
Kirki::add_config( 'mucha_config', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );



/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function mucha_add_field( $args ) {
    Kirki::add_field( 'mucha_config', $args );
}

if ( ! function_exists( 'mucha_get_menu_options' ) ) :
    /**
     * Provides an array of Menu slug => name for dropdown.
     *
     * @return array
     */
    function mucha_get_menu_options() {

        $all_menus            = get_terms( array(
            'taxonomy'   => 'nav_menu',
            'hide_empty' => true,
        ) );
        $menu_options         = array();
        $menu_options['none'] = esc_html__( 'None', 'mucha' );

        foreach ( $all_menus as $menu_item ) {
            $menu_options[ $menu_item->slug ] = esc_html( $menu_item->name );
        }

        return $menu_options;

    }
endif;
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mucha_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section('title_tagline')->panel = 'mucha_header_options';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'mucha_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'mucha_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'mucha_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mucha_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mucha_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mucha_customize_preview_js() {
	wp_enqueue_script( 'mucha-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mucha_customize_preview_js' );

// Header Options
require get_template_directory() . '/inc/customizer/panel/header.php';

// Footer Options
require get_template_directory() . '/inc/customizer/panel/theme-options.php';

// Footer Options
require get_template_directory() . '/inc/customizer/panel/footer.php';

