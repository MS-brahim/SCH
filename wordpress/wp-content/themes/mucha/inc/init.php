<?php
/**
 * Load files
 *
 * @package Mucha
 */
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require trailingslashit( get_template_directory() ) . '/inc/extra-functions.php';

/**
 * Load kirki library in theme
 */
require trailingslashit( get_template_directory() ) . '/inc/libraries/kirki/kirki.php';

/**
 * Load Hooks.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/structure.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/hook.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/custom.php';


/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require trailingslashit( get_template_directory() ) . '/inc/jetpack.php';
}
/**
 * Metabox.
 */
require  trailingslashit( get_template_directory() ) . '/inc/metabox.php';

/**
 * Register Social Media Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/social-media.php';

/** 
 * Add the Header Footer Elementor compatibility file 
 */
require_once trailingslashit( get_template_directory() ) . '/inc/compatibility/elementor.php';

/** 
 * Add the Woocommerce compatibility file 
 */
require_once trailingslashit( get_template_directory() ) . '/inc/compatibility/woocommerce.php';


/**
 * Plugin Activation Section.
 */
require trailingslashit( get_template_directory() ) . '/inc/libraries/class-tgm-plugin-activation.php';