<?php
/**
 * Mucha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mucha
 */

if ( ! function_exists( 'mucha_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mucha_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mucha, use a find and replace
		 * to change 'mucha' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mucha', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mucha' ),
			'social-icon' => esc_html__( 'Social Media', 'mucha' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mucha_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );			
	}
endif;
add_action( 'after_setup_theme', 'mucha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mucha_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mucha_content_width', 640 );
}
add_action( 'after_setup_theme', 'mucha_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mucha_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mucha' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mucha' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$header_widget = get_theme_mod( 'beside_navigation', 'search' ); 
	if ( 'widget' == $header_widget ){
		register_sidebar( array(
			'name'          => esc_html__( 'Header Widget', 'mucha' ),
			'id'            => 'header-widget',
			'description'   => esc_html__( 'Add widgets here.', 'mucha' ),
			'before_widget' => '<section id="%1$s" class="%2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );	
	}
	$show_footer_widget = get_theme_mod( 'show_footer_widget', false ); 
	if ( true == $show_footer_widget ):
		for ( $i = 1; $i <= 4 ; $i++ ) {
			register_sidebar( array(
				'name'          => sprintf( __('Footer %d', 'mucha'), absint( $i ) ),
				'id'            => 'footer-' . absint( $i ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</h3></span>',
			) );
		}	
	endif;
	if ( mucha_is_woocommerce_active() ){
		register_sidebar( array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'mucha' ),
			'id'            => 'woo-sidebar',
			'description'   => esc_html__( 'Add Woocommerce widgets here.', 'mucha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );		
	}

}
add_action( 'widgets_init', 'mucha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mucha_scripts() {

	wp_enqueue_style( 'mucha-google-fonts', mucha_fonts_url(), array(), null );

	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/font-awesome.min.css');
	
	wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/assets/css/meanmenu.css');

	wp_enqueue_style( 'mucha-style', get_stylesheet_uri() );

	wp_enqueue_style( 'mucha-responsive', get_template_directory_uri().'/assets/css/responsive.css');

	wp_enqueue_script( 'jquery-meanenu-js', get_template_directory_uri() .'/assets/js/jquery.meanmenu.js', array( 'jquery'), 'v2.0.8', true );	

	wp_enqueue_script( 'ResizeSensor-js', get_template_directory_uri() .'/assets/js/ResizeSensor.js', array(), 'v2.0.8', true );

	wp_enqueue_script( 'theia-sticky-sidebar-js', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.js', array(), 'v1.7.0', true );	

	wp_enqueue_script( 'mucha-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mucha-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'mucha-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mucha_scripts' );

if ( ! function_exists( 'mucha_customize_enqueue' ) ) :
	/**
	 * Enqueue style for custom customize control.
	 */
	function mucha_customize_enqueue() {

		wp_enqueue_style( 'mucha-customize-css', get_template_directory_uri().'/assets/css/customizer.css');

	}
endif;
add_action( 'customize_controls_enqueue_scripts', 'mucha_customize_enqueue' );

/**
 * Load init.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';