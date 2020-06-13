<?php
/**
 * bring back functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bring_back
 */

if ( ! function_exists( 'bring_back_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bring_back_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bring back, use a find and replace
		 * to change 'bring-back' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bring-back', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'bring-back' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bring_back_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'bring_back_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bring_back_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bring_back_content_width', 640 );
}
add_action( 'after_setup_theme', 'bring_back_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bring_back_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bring-back' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bring-back' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title text-capitalize">',
		'after_title'   => '</h3>',
	) );

    $args_footer_widgets = array(
        'name'          => esc_html__( 'Footer %d', 'bring-back' ),
        'id'            => 'footer-widget',
        'description'   => esc_html__( 'Add widgets here.', 'bring-back' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title text-uppercase">',
        'after_title'   => '</h4>'
    );

    register_sidebars( 4, $args_footer_widgets );

    // Social Widget
    register_widget( 'bring_back_Social' );

}
add_action( 'widgets_init', 'bring_back_widgets_init' );

/**
 * Bring Back
 * Widget
 */
require get_template_directory() . '/plugin/social.php';

/**
 * Enqueue scripts and styles.
 */
function bring_back_scripts() {
    // Font Family
    if ( ! class_exists( 'Kirki' ) ) {

        wp_enqueue_style('bring-back-body-fonts', '//fonts.googleapis.com/css?family=Nunito:600,700,900');
        wp_enqueue_style('bring-back-heading-fonts', '//fonts.googleapis.com/css?family=Josefin+Sans:700');

    }
    // Plugin CSS
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.7.0' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), '1.8.0' );
    wp_enqueue_style( 'icofont', get_template_directory_uri() . '/css/icofont.min.css', array(), '4.7.0' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.3' );
    wp_enqueue_style( 'bring-back-plugin', get_template_directory_uri() . '/css/plugin.css', array(), wp_get_theme()->get( 'Version' ) );
    // Main Stylesheet
	wp_enqueue_style( 'bring-back-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' )  );
    // Responsive
    wp_enqueue_style( 'bring-back-responsive', get_template_directory_uri() . '/css/responsive.css', array(), wp_get_theme()->get( 'Version' ) );
    // Plugin JS
    wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.3.0', true );
    wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.8.0', true );
    wp_enqueue_script( 'jquery-popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.12.5', true );
    wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.1.3', true );
    // Main JS
    wp_enqueue_script( 'bring-back-elementor-slider', get_template_directory_uri() . '/js/elementor-slider.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'bring-back-main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

	wp_enqueue_script( 'bring-back-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bring_back_scripts' );

/**
 * Elementor widgets
 */
function bring_back_elementor_widgets() {

    if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {
        require get_template_directory() . '/plugin/post-type.php';
        require get_template_directory() . '/plugin/text-block.php';
        require get_template_directory() . '/plugin/text-with-image.php';
        require get_template_directory() . '/plugin/testimonial.php';
        require get_template_directory() . '/plugin/pricing-table.php';
        require get_template_directory() . '/plugin/tabs.php';
        require get_template_directory() . '/plugin/slideshow.php';
        require get_template_directory() . '/plugin/info-box.php';
        require get_template_directory() . '/plugin/team.php';

        if( class_exists('bring_back_Toolkit') ) {
            require get_template_directory() . '/plugin/services-post-type.php';
        }
    }
}
add_action( 'elementor/widgets/widgets_registered', 'bring_back_elementor_widgets' );

/**
 * Scripts and styles for the Page Builder plugin
 */
function bring_back_admin_script() {

    global  $pagenow;

    if( $pagenow == 'customize.php' ){
        wp_enqueue_style( 'bring-back-style-pro', get_template_directory_uri() . '/css/admin/bring-back-style.css', '1.0', false );
    }
}
add_action( 'admin_enqueue_scripts', 'bring_back_admin_script' );

/**
 * @param $elements_manager
 * elementor Category Name
 */
function bring_back_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'bring_back',
        array(
            'title' => __( 'Bring Back Widgets', 'bring-back' ),
            'icon' => 'fa fa-plug',
        )
    );

}
add_action( 'elementor/elements/categories_registered', 'bring_back_elementor_widget_categories' );

/**
 * Style Variable
 */
if ( !class_exists('Kirki') ) {
    require get_template_directory() . '/inc/style-variable.php';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * 5.02 version for add script tag
 */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Padding Top
 */
function bring_back_PaddingTop(){
    if ( ! is_front_page() ){
        echo esc_attr( ' pt-90' );
    }
}

/**
 * Load WP Bootstrap Nav Walker file.
 */
if ( ! class_exists( 'WP_Bootstrap_Navwalker' )) {
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

/**
 * Kirki Plugin Admin Notice Dismiss
 */
add_action( 'admin_notices', 'bring_back_plugin_dismiss_notice' );
function bring_back_plugin_dismiss_notice() {
    global  $pagenow;
    if( $pagenow == 'customize.php' ) :
        $user_id = get_current_user_id();
        if ( !get_user_meta( $user_id, 'bring_back_kirki_plugin_dismissed' ) )
            echo '<p class="dismiss-button"><a href="?bring_back_kirki_dismissed">'.esc_html( 'Dismiss' ).'</a></p>';
    endif;
}
add_action( 'admin_init', 'bring_back_kirki_plugin_dismissed' );

function bring_back_kirki_plugin_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['bring_back_kirki_dismissed'] ) )
        add_user_meta( $user_id, 'bring_back_kirki_plugin_dismissed', 'true', true );
}

/**
 *TGM Plugin activation.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'bring_back_active_plugins' );

function bring_back_active_plugins() {
    
    $plugins = array(
        array(
            'name'      => __( 'Contact Form 7', 'bring-back' ),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => __( 'Elementor Page Builder', 'bring-back' ),
            'slug'      => 'elementor',
            'required'  => false,
        ),
        array(
            'name'      => __( 'kirki Customizer', 'bring-back' ),
            'slug'      => 'kirki',
            'required'  => false,
        )
    );

    tgmpa( $plugins );
}