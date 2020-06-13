<?php
/**
 * Babysitter Lite Theme Customizer
 *
 * @package Babysitter Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function babysitter_lite_customize_register( $wp_customize ) {
	
function babysitter_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->babysitter_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->babysitter_lite  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#90cd2c',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','babysitter-lite'),
			'description'	=> __('Select color from here.','babysitter-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('topbar-color', array(
		'default' => '#06384e',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'topbar-color',array(
			'description'	=> __('Select background color for topbar.','babysitter-lite'),
			'section' => 'colors',
			'settings' => 'topbar-color'
		))
	);
	
	$wp_customize->add_setting('headerbg-color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'headerbg-color',array(
			'description'	=> __('Select background color for header.','babysitter-lite'),
			'section' => 'colors',
			'settings' => 'headerbg-color'
		))
	);
	
	$wp_customize->add_setting('nav-color', array(
		'default' => '#06384e',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'nav-color',array(
			'description'	=> __('Select color for navigation.','babysitter-lite'),
			'section' => 'colors',
			'settings' => 'nav-color'
		))
	);
	
	$wp_customize->add_setting('footer-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer-color',array(
			'description'	=> __('Select background color for footer.','babysitter-lite'),
			'section' => 'colors',
			'settings' => 'footer-color'
		))
	);
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'babysitter-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will work only when you select the static front page.','babysitter-lite'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','babysitter-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','babysitter-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','babysitter-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('View More','babysitter-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','babysitter-lite'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'babysitter_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider.','babysitter-lite'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
	// Homepage Section Start		
	$wp_customize->add_section(
        'homepage_section',
        array(
            'title' => __('Homepage Boxes', 'babysitter-lite'),
            'priority' => null,
			'description'	=> __('Select pages for homepage boxes. This section will be displayed only when you select the static front page.','babysitter-lite'),	
        )
    );	
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for Homepage section','babysitter-lite'),
			'section'	=> 'homepage_section'
	));	

	
	$wp_customize->add_setting('hide_section',array(
			'default' => true,
			'sanitize_callback' => 'babysitter_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_section', array(
		   'settings' => 'hide_section',
    	   'section'   => 'homepage_section',
    	   'label'     => __('Check this to hide section.','babysitter-lite'),
    	   'type'      => 'checkbox'
     ));
	 
// Contact Section

	$wp_customize->add_section(
        'contact_section',
        array(
            'title' => __('Topbar Info', 'babysitter-lite'),
            'priority' => null,
			'description'	=> __('Add your topbar info here.','babysitter-lite'),	
        )
    );	
	
	$wp_customize->add_setting('phone-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add phone here.','babysitter-lite'),
			'section'	=> 'contact_section'
	));
	
	$wp_customize->add_setting('email-txt',array(
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add email here.','babysitter-lite'),
			'section'	=> 'contact_section'
	));
	
	$wp_customize->add_setting('fb-link', array(
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('fb-link', array(
			'type'	=> 'text',
			'label'	=> __('Add facebook link here','babysitter-lite'),
			'section' => 'contact_section'
	));
	
	$wp_customize->add_setting('twitt-link', array(
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt-link', array(
			'type'	=> 'text',
			'label'	=> __('Add twitter link here','babysitter-lite'),
			'section' => 'contact_section'
	));
	
	$wp_customize->add_setting('gplus-link', array(
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('gplus-link', array(
			'type'	=> 'text',
			'label'	=> __('Add google plus link here','babysitter-lite'),
			'section' => 'contact_section'
	));
	
	$wp_customize->add_setting('linked-link', array(
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('linked-link', array(
			'type'	=> 'text',
			'label'	=> __('Add linkedin link here','babysitter-lite'),
			'section' => 'contact_section'
	));
	
	$wp_customize->add_setting('insta-link', array(
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('insta-link', array(
			'type'	=> 'text',
			'label'	=> __('Add instagram link here','babysitter-lite'),
			'section' => 'contact_section'
	));
	
}
add_action( 'customize_register', 'babysitter_lite_customize_register' );	

function babysitter_lite_css(){
		?>
        <style> 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				a.blog-more:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.section-box .sec-left a,
				.sitenav ul li a:hover{
					color:<?php echo esc_attr(get_theme_mod('color_scheme','#90cd2c')); ?>;
				}
				h3.widget-title,
				.nav-links .current,
				.nav-links a:hover,
				p.form-submit input[type="submit"],
				.home-content a{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#90cd2c')); ?>;
				}
				.top-header{
					background-color:<?php echo esc_attr(get_theme_mod('topbar-color','#06384e;')); ?>;
				}
				#header{
					background-color:<?php echo esc_attr(get_theme_mod('headerbg-color','#ffffff')); ?>;
				}
				.sitenav ul li a{
					color:<?php echo esc_attr(get_theme_mod('nav-color','#06384e')); ?>;
				}
				.copyright-wrapper{
					background-color:<?php echo esc_attr(get_theme_mod('footer-color','#000000')); ?>;
				}
				
		</style>
	<?php }
add_action('wp_head','babysitter_lite_css');

function babysitter_lite_customize_preview_js() {
	wp_enqueue_script( 'babysitter-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'babysitter_lite_customize_preview_js' );