<?php
/**
 * bring back Theme Customizer
 *
 * @package bring_back
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bring_back_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'bring_back_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'bring_back_customize_partial_blogdescription',
		) );
	}

    if ( !class_exists('Kirki') ) {
        $wp_customize->get_section('title_tagline')->title = __('Header', 'bring-back');

        /*********************************************
         * Header
         *********************************************/
        $wp_customize->add_panel('header_panel', array(
            'title' => __('Header', 'bring-back'),
            'priority' => 20
        ));

        /********************* Sections ************************/

        $wp_customize->add_section('header_general_settings', array(
            'title' => __('General Settings', 'bring-back'),
            'panel' => 'header_panel',
            'priority' => 5
        ));
        $wp_customize->add_section('title_tagline', array(
            'title' => __('Logo & Favicon', 'bring-back'),
            'panel' => 'header_panel',
            'priority' => 10
        ));

        $wp_customize->add_section('header_image', array(
            'title' => __('Header Banner', 'bring-back'),
            'panel' => 'header_panel',
            'priority' => 15
        ));

        $wp_customize->add_section('header_hero_area', array(
            'title' => __('Hero Area', 'bring-back'),
            'panel' => 'header_panel',
            'priority' => 20
        ));


        /********************* Site Title and Tagline Color ************************/
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'header_textcolor',
                array(
                    'label' => __('Site Title and Tagline Color', 'bring-back'),
                    'section' => 'title_tagline'
                )
            )
        );

        /********************* Pre Loader ************************/
        $wp_customize->add_setting('enable_preloader', array(
            'default' => true,
            'sanitize_callback' => 'bring_back_sanitize_checkbox',
        ));
        $wp_customize->add_control('enable_preloader', array(
            'label' => __('Enable Pre Loader', 'bring-back'),
            'type' => 'checkbox',
            'section' => 'header_general_settings'
        ));

        /********************* General Settings ************************/
        $wp_customize->add_setting('enable_header_bg_img', array(
            'default' => false,
            'sanitize_callback' => 'bring_back_sanitize_checkbox',
        ));
        $wp_customize->add_control('enable_header_bg_img', array(
            'label' => __('Enable Shape Image', 'bring-back'),
            'type' => 'checkbox',
            'section' => 'header_general_settings'
        ));

        $wp_customize->add_setting('header_bg_img', array(
            'default' => get_template_directory_uri() . '/images/header-shape.jpg',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'header_bg_img',
                array(
                    'label' => __('Upload Background Image', 'bring-back'),
                    'type' => 'image',
                    'section' => 'header_general_settings',
                    'description' => 'This shape/image append Top and Right edge'
                )
            )
        );

        $wp_customize->add_setting(
            'header_background_color',
            array(
                'default' => '#ffffff',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'header_background_color',
                array(
                    'label' => __('Header Background Color', 'bring-back'),
                    'section' => 'header_general_settings'
                )
            )
        );

        $wp_customize->add_setting('header_padding_top', array(
            'default' => '30',
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control('header_padding_top', array(
            'label' => __('Padding Top/Bottom of Header', 'bring-back'),
            'type' => 'number',
            'section' => 'header_general_settings'
        ));

        $wp_customize->add_setting('enable_search', array(
            'default' => '',
            'sanitize_callback' => 'bring_back_sanitize_checkbox',
        ));
        $wp_customize->add_control('enable_search', array(
            'label' => __('Enable Search?', 'bring-back'),
            'type' => 'checkbox',
            'section' => 'header_general_settings',
            'description' => 'This display in Menu'

        ));

        $wp_customize->add_setting('custom_nav_title', array(
            'default' => 'Contact Us',
            'sanitize_callback' => 'bring_back_sanitize_text',
        ));
        $wp_customize->add_control('custom_nav_title', array(
            'label' => __('Button Text ( Append Last child of menu item )', 'bring-back'),
            'type' => 'text',
            'section' => 'header_general_settings',
            'description' => 'This display in Menu'
        ));

        $wp_customize->add_setting('custom_nav_link', array(
            'default' => '#',
            'sanitize_callback' => 'bring_back_sanitize_url',
        ));
        $wp_customize->add_control('custom_nav_link', array(
            'label' => __('Button URL', 'bring-back'),
            'type' => 'url',
            'section' => 'header_general_settings',
        ));

        /********************* Header Banner ************************/
        $wp_customize->add_setting('header_ads_show', array(
            'default' => '',
            'sanitize_callback' => 'bring_back_sanitize_checkbox',
        ));
        $wp_customize->add_control('header_ads_show', array(
            'label' => __('Enable Banner?', 'bring-back'),
            'type' => 'checkbox',
            'section' => 'header_image',
            'priority' => 5
        ));
        $wp_customize->add_setting('ads_url', array(
            'default' => '',
            'sanitize_callback' => 'bring_back_sanitize_url',
        ));
        $wp_customize->add_control('ads_url', array(
            'label' => __('URL', 'bring-back'),
            'type' => 'url',
            'section' => 'header_image',
        ));

        /********************* Hero Area ************************/
        $wp_customize->add_setting('enable_hero_area', array(
            'default' => false,
            'sanitize_callback' => 'bring_back_sanitize_checkbox',
        ));
        $wp_customize->add_control('enable_hero_area', array(
            'label' => __('Enable Hero Area?', 'bring-back'),
            'type' => 'checkbox',
            'section' => 'header_hero_area'
        ));

        $wp_customize->add_setting('hero_padding_top', array(
            'default' => '193',
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control('hero_padding_top', array(
            'label' => __('Padding Top/Bottom of Header', 'bring-back'),
            'type' => 'number',
            'section' => 'header_hero_area'
        ));

        $wp_customize->add_setting('enable_hero_banner_animation', array(
            'default' => false,
            'sanitize_callback' => 'bring_back_sanitize_checkbox',
        ));
        $wp_customize->add_control('enable_hero_banner_animation', array(
            'label' => __('Enable Banner Animation?', 'bring-back'),
            'type' => 'checkbox',
            'section' => 'header_hero_area'
        ));

        $wp_customize->add_setting('hero_banner', array(
            'default' => get_template_directory_uri() . '/images/hero-banner.png',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'hero_banner',
                array(
                    'label' => __('Upload Background Image', 'bring-back'),
                    'type' => 'image',
                    'section' => 'header_hero_area'
                )
            )
        );

        $wp_customize->add_setting('enable_hero_shape_animation', array(
            'default' => false,
            'sanitize_callback' => 'bring_back_sanitize_checkbox',
        ));
        $wp_customize->add_control('enable_hero_shape_animation', array(
            'label' => __('Enable Shape Animation?', 'bring-back'),
            'type' => 'checkbox',
            'section' => 'header_hero_area'
        ));

        $wp_customize->add_setting('hero_shape', array(
            'default' => get_template_directory_uri() . '/images/dot-circle.png',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'hero_shape',
                array(
                    'label' => __('Upload Shape Image', 'bring-back'),
                    'type' => 'image',
                    'section' => 'header_hero_area',
                    'description' => 'This shape/image append behind the title and play animation'
                )
            )
        );

        $wp_customize->add_setting('hero_title', array(
            'default' => '',
            'sanitize_callback' => 'bring_back_sanitize_text',
        ));
        $wp_customize->add_control('hero_title', array(
            'label' => __('Title', 'bring-back'),
            'type' => 'text',
            'section' => 'header_hero_area'
        ));

        $wp_customize->add_setting('hero_content', array(
            'default' => '',
            'sanitize_callback' => 'bring_back_sanitize_text',
        ));
        $wp_customize->add_control('hero_content', array(
            'label' => __('Content', 'bring-back'),
            'type' => 'textarea',
            'section' => 'header_hero_area'
        ));

        $wp_customize->add_setting('hero_btn_text', array(
            'default' => '',
            'sanitize_callback' => 'bring_back_sanitize_text',
        ));
        $wp_customize->add_control('hero_btn_text', array(
            'label' => __('Button Text', 'bring-back'),
            'type' => 'text',
            'section' => 'header_hero_area'
        ));

        $wp_customize->add_setting('hero_btn_url', array(
            'default' => '',
            'sanitize_callback' => 'bring_back_sanitize_url',
        ));
        $wp_customize->add_control('hero_btn_url', array(
            'label' => __('Button URL', 'bring-back'),
            'type' => 'url',
            'section' => 'header_hero_area'
        ));
    }
}
add_action( 'customize_register', 'bring_back_customize_register' );


/**
 * Checkbox
 * @param $input
 * @return int|string
 */
function bring_back_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Text
 * @param $input
 * @return string
 */

function bring_back_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * URL
 * @param $url
 * @return string
 */
function bring_back_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

/**
 * Adding Go to Pro Section in Customizer
 * https://github.com/justintadlock/trt-customizer-pro
 */
if( class_exists( 'WP_Customize_Section' ) ) :

    class bring_back_Kirki_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'pro-section';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();

            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );

            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand get-pro-theme" style="display: block !important;">
                <h3 class="accordion-section-title">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
endif;

add_action( 'customize_register', 'bring_back_sections_pro' );
function bring_back_sections_pro( $wp_customize ) {
    // Register custom section types.
    $wp_customize->register_section_type( 'bring_back_Kirki_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section(
        new bring_back_Kirki_Customize_Section_Pro(
            $wp_customize,
            'bring_back_get_pro',
            array(
                'title'    => esc_html__( 'Pro Available', 'bring-back' ),
                'priority' => 5,
                'pro_text' => esc_html__( 'Get Pro Theme', 'bring-back' ),
                'pro_url'  => esc_url( 'https://www.themetim.com/wordpress-themes/bring-back-pro/' )
            )
        )
    );
}

/**
 * Early exit if Kirki exists.
 */
$user_id = get_current_user_id();
if ( !get_user_meta( $user_id, 'bring_back_kirki_plugin_dismissed' ) ){
    require get_template_directory() . '/inc/kirki/include-kirki.php';
}
require get_template_directory() . '/inc/kirki/bring-back-kirki.php';

/**
 * Kirki Customizer settings
 */
bring_back_Kirki::add_config( 'bring_back', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );
require get_template_directory() . '/inc/kirki/kirki-customizer.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bring_back_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bring_back_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bring_back_customize_preview_js() {
	wp_enqueue_script( 'bring-back-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bring_back_customize_preview_js' );
