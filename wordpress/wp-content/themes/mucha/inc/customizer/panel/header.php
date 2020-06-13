<?php
/**
 * Header Options
 *
 * @package Mucha
 */

/**
 * Header Options Panel
 */
Kirki::add_panel( 'mucha_header_options', array(
	'priority' => 10,
	'title'    => esc_html__( 'Header', 'mucha' ),
) );
// Header Options
Kirki::add_section( 'mucha_top_header_section', array(
	'title'    => esc_html__( 'Top Header', 'mucha' ),
	'panel'    => 'mucha_header_options',
	'priority' => 20,
) );
// Show Top header
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_top_header',
		'label'    => esc_html__( 'Show Top Header', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  =>  false,
	)
);
// Top header Left
mucha_add_field(
    array(
		'type'     => 'select',
		'settings' => 'top_left_header',
		'label'    => esc_html__( 'Top Left Header', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => 'none',
		'choices'	 => array(
			'none'		=> esc_html__( 'None', 'mucha' ),
	    	'search'	=> esc_html__( 'Search', 'mucha' ),
			'menu'		=> esc_html__( 'Menu', 'mucha' ),
			'text/html' => esc_html__( 'Text/Html', 'mucha' ),
			'icon' 	=> esc_html__( 'Social Icon', 'mucha' ),
		),	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),			
	)
);
// Top Left Header Text/Html
mucha_add_field(
    array(
		'type'     => 'editor',
		'settings' => 'top_header_left_textarea',
		'label'    => esc_html__( 'Text/Html', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => '',
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'top_left_header',
				'operator'	 => '==',
				'value'		 => 'text/html',
			),
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),	
	)
);
// Left Header Menu
mucha_add_field(
    array(
		'type'     => 'select',
		'settings' => 'top_left_header_menu',
		'label'    => esc_html__( 'Left Header Menu', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => 'search',
		'choices'	 => mucha_get_menu_options(),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'top_left_header',
				'operator'	 => '==',
				'value'		 => 'menu',
			),
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),			
	)
);
//Left heder icon
mucha_add_field(
    array(
		'type'     => 'repeater',
		'settings' => 'top_left_header_icon',
		'label'    => esc_html__( 'Left Header Icon', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => '',
		'row_label'=> array(
			'type'  => 'text',
			'value' => esc_html__( 'Social link', 'mucha' ),
		),
		'button_label' => esc_html__( 'Add Social Icon', 'mucha' ),
		'fields' => array(
			'link_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Link Text', 'mucha' ),
				'default'     => '',
			),
			'link_url'  => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Link URL', 'mucha' ),
				'default'     => '',
			),
		),		
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'top_left_header',
				'operator'	 => '==',
				'value'		 => 'icon',
			),
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),		
	)
);
// Top Header Right
mucha_add_field(
    array(
		'type'     => 'select',
		'settings' => 'top_right_header',
		'label'    => esc_html__( 'Top Right Header', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => 'none',
		'choices'	 => array(
			'none'		=> esc_html__( 'None', 'mucha' ),
	    	'search'	=> esc_html__( 'Search', 'mucha' ),
			'menu'		=> esc_html__( 'Menu', 'mucha' ),
			'text/html' => esc_html__( 'Text/Html', 'mucha' ),
			'icon' 	=> esc_html__( 'Social Icon', 'mucha' ),
		),	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),				
	)
);

// Top Header Right Text Area 
mucha_add_field(
    array(
		'type'     => 'editor',
		'settings' => 'top_header_right_textarea',
		'label'    => esc_html__( 'Text/Html', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => '',
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'top_right_header',
				'operator'	 => '==',
				'value'		 => 'text/html',
			),
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),	
	)
);
// Right Header Menu
mucha_add_field(
    array(
		'type'     => 'select',
		'settings' => 'top_right_header_menu',
		'label'    => esc_html__( 'Right Header Menu', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => 'search',
		'choices'	 => mucha_get_menu_options(),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'top_right_header',
				'operator'	 => '==',
				'value'		 => 'menu',
			),
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),			
	)
);
//Right heder icon
mucha_add_field(
    array(
		'type'     => 'repeater',
		'settings' => 'top_right_header_icon',
		'label'    => esc_html__( 'Right Header Icon', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'default'  => '',
		'row_label'=> array(
			'type'  => 'text',
			'value' => esc_html__( 'Social link', 'mucha' ),
		),
		'button_label' => esc_html__( 'Add Social Icon', 'mucha' ),
		'fields' => array(
			'link_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Link Text', 'mucha' ),
				'default'     => '',
			),
			'link_url'  => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Link URL', 'mucha' ),
				'default'     => '',
			),
		),		
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'top_right_header',
				'operator'	 => '==',
				'value'		 => 'icon',
			),
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),		
	)
);

// Top Header Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'top_header_color',
		'label'    => esc_html__( 'Top Header Color', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'choices'	 => array(
			'bg_color'  => esc_html__( 'Background Color', 'mucha' ),
	        'link'    	=> esc_html__( 'Color', 'mucha' ),
	        'hover'   	=> esc_html__( 'Hover', 'mucha' ),
		),
		'default'	 => array(
	        'link'    	=> '#FFFFFF',
	        'hover'   	=> '#6E3CAF',
	        'bg_color'  => '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'link',
				'element'	 => '.header-info, .header-info a, .top-header p',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'hover',
				'element'	 => '.top-header a:hover',
				'property'	 => 'color',
			),
	    array(
				'choice'	 => 'bg_color',
				'element'	 => '.top-header',
				'property'	 => 'background-color',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),				
	)
);
// Top Header Social Icon Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'top_header_social_color',
		'label'    => esc_html__( 'Top Header Social IconColor', 'mucha' ),
		'section'  => 'mucha_top_header_section',
		'choices'	 => array(
			'bg_color' 		=> esc_html__( 'Background Color', 'mucha' ),
	        'link'    		=> esc_html__( 'Color', 'mucha' ),
	        'hover'   		=> esc_html__( 'Hover', 'mucha' ),
	        'bg_hover'   	=> esc_html__( 'Background Hover', 'mucha' ),
	        'border'   		=> esc_html__( 'Border Color', 'mucha' ),
	        'hover_border'  => esc_html__( 'Hover Border Color', 'mucha' ),
		),
		'default'	 => array(
	        'link'    		=> '#FFFFFF',
	        'hover'   		=> '#FFFFFF',
	        'bg_color'  	=> '#4A2973',
	        'bg_hover'  	=> '#FF7506',
	        'border'  		=> '#4A2973',
	        'hover_border'  => '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'link',
				'element'	 => '.top-header .inline-social-icons.social-links ul li a::before',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'hover',
				'element'	 => '.top-header .inline-social-icons.social-links ul li a:hover::before',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'bg_color',
				'element'	 => '.top-header .inline-social-icons li a',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'bg_hover',
				'element'	 => '.top-header .inline-social-icons li a:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'border',
				'element'	 => '.top-header .inline-social-icons li a',
				'property'	 => 'border-color',
			),
	    	array(
				'choice'	 => 'hover_border',
				'element'	 => '.top-header .inline-social-icons li a:hover',
				'property'	 => 'border-color',
			),									
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_top_header',
				'operator'	 => '==',
				'value'		 => true,
			),					
		),				
	)
);



// Header Options
Kirki::add_section( 'mucha_header_section', array(
	'title'    => esc_html__( 'Primary Navigation', 'mucha' ),
	'panel'    => 'mucha_header_options',
	'priority' => 20,
) );
// Main Logo Width.
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'logo_Width',
		'label'    => esc_html__( 'Logo Width', 'mucha' ),
		'section'  => 'title_tagline',
		'default'  => '225',
		'choices'	 => array(
			'min'  => 0,
			'max'  => 700,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => '.custom-logo',
				'property'	 => 'width',
				'units'		 => 'px',
			),
		),				
	)
);
// Enable Mobile Logo.
mucha_add_field(
    array(
		'type'     => 'checkbox',
		'settings' => 'show_mobile_logo',
		'label'    => esc_html__( 'Different Logo For Mobile Devices?', 'mucha' ),
		'section'  => 'title_tagline',
		'default'  => false,				
	)
);
//Mobile Logo.
mucha_add_field(
    array(
		'type'     => 'image',
		'settings' => 'mobile_logo',
		'label'    => esc_html__( 'Mobile Logo', 'mucha' ),
		'section'  => 'title_tagline',
		'default'  => '',	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_mobile_logo',
				'operator'	 => '==',
				'value'		 => true,
			),
		),	
		'choices'	 => array(
			'save_as' => 'id',
		),		
	)
);
// Mobile Logo Width
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'mobile_logo_Width',
		'label'    => esc_html__( 'Mobile Logo Width', 'mucha' ),
		'section'  => 'title_tagline',
		'default'  => '225',
		'choices'	 => array(
			'min'  => 0,
			'max'  => 700,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => '.mobile-custom-logo',
				'property'	 => 'width',
				'units'		 => 'px',
			),
		),	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_mobile_logo',
				'operator'	 => '==',
				'value'		 => true,
			),
		),				
	)
);

// Enable/Disable Header Navigation.
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_nav',
		'label'    => esc_html__( 'Enable Navigation', 'mucha' ),
		'section'  => 'mucha_header_section',
		'default'  => '1',
	)
);
// Navigation Align
mucha_add_field(
    array(
		'type'     => 'radio-buttonset',
		'settings' => 'navigaion_align',
		'label'    => esc_html__( 'Navigation Align', 'mucha' ),
		'section'  => 'mucha_header_section',
		'default'  => 'right',
		'choices'	 => array(
			'left'		=> '<i class="dashicons dashicons-editor-alignleft"></i>',
	    	'center'	=> '<i class="dashicons dashicons-editor-aligncenter"></i>',
			'right'		=> '<i class="dashicons dashicons-editor-alignright"></i>',
		),
		'output'	 => array(
			array(				
				'element'	 => '.hgroup-right .navbar',
				'property'	 => 'text-align',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_nav',
				'operator'	 => '==',
				'value'		 => '1',
			),
		),				
	)
);
// Header 4 Nav Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'header_span_color',
		'label'    => esc_html__( 'Header Nav Color', 'mucha' ),
		'section'  => 'mucha_header_section',
		'default'  => '#6E3CAF',
		'choices'  => array(
			'alpha' => true,	
		),	
		'output'	 => array(
			array(				
				'element'	 => '.mucha-header-layout-4 .header-menu-icon::before,
								.mucha-header-layout-5 .header-menu-icon::before,
				 				.mucha-header-layout-4 .header-menu-icon span::before,
				 				.mucha-header-layout-5 .header-menu-icon span::before,
				 				.mucha-header-layout-4 .header-menu-icon span::after,
				 				.mucha-header-layout-5 .header-menu-icon span::after',
				'property'	 => 'background-color',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'header_layout',
				'operator'	 => 'contains',
				'value'		 => array('header-layout-5', 'header-layout-4'),
			),		
		),			
	)
);
// Navigation Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'navigaion_color',
		'label'    => esc_html__( 'Navigation Color', 'mucha' ),
		'section'  => 'mucha_header_section',
		'choices'	 => array(
	        'link'    => esc_html__( 'Color', 'mucha' ),
	        'hover'   => esc_html__( 'Hover', 'mucha' ),
	        'active'  => esc_html__( 'Active', 'mucha' ),
	        'sub_bg'  	=> esc_html__( 'Sub Menu Background Hover', 'mucha' ),
	        'sub_border'  => esc_html__( 'Sub Menu Border Color', 'mucha' ),
		),
		'default'	 => array(
	        'link'    => '#6E3CAF',
	        'hover'   => '#FF7506',
	        'active'  => '#6E3CAF',
	        'sub_bg'  => '#FF7506',
	        'sub_border'  => '#676767',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'link',
				'element'	 => '.main-navigation li a, .menu-item-has-children::before',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'hover',
				'element'	 => '.main-navigation li a:hover, .menu-item-has-children:hover::before, .main-navigation ul li a:hover',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'active',
				'element'	 => '.main-navigation li.current-menu-item a, .main-navigation li.current_page_item a',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'sub_bg',
				'element'	 => '.main-navigation ul li ul li a:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'sub_border',
				'element'	 => '.main-navigation ul li ul',
				'property'	 => 'border-top-color',
			),	
	    	array(
				'choice'	 => 'sub_border',
				'element'	 => '.main-navigation ul li ul li',
				'property'	 => 'border-bottom-color',
			),									
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_nav',
				'operator'	 => '==',
				'value'		 => '1',
			),
		),				
	)
);
// General Header Options
Kirki::add_section( 'mucha_header_general', array(
	'title'    => esc_html__( 'General Header', 'mucha' ),
	'panel'    => 'mucha_header_options',
	'priority' => 20,
) );
mucha_add_field(
    array(
		'type'     => 'radio-image',
		'settings' => 'header_layout',
		'label'    => esc_html__( 'Header layout', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => 'header-layout-1',
		'choices'	 => array(
			'header-layout-1'		=> get_template_directory_uri() . '/assets/img/logo-left.png',
	    	'header-layout-2'		=> get_template_directory_uri() . '/assets/img/logo-center.png',
			'header-layout-3'		=> get_template_directory_uri() . '/assets/img/logo-right.png',
			'header-layout-4'		=> get_template_directory_uri() . '/assets/img/left-canvas.png',
			'header-layout-5'		=> get_template_directory_uri() . '/assets/img/right-canvas.png',
			'header-layout-6'		=> get_template_directory_uri() . '/assets/img/vertical-header.png',
		),				
	)
);
// Header Bg Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'header_bg_color',
		'label'    => esc_html__( 'Header Background Color', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '#F8F5FB',
		'choices'  => array(
			'alpha' => true,	
		),	
		'output'	 => array(
			array(				
				'element'	 => '.hgroup-wrap',
				'property'	 => 'background-color',
			),
		),
	)
);
// Header Bg Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'header_text_color',
		'label'    => esc_html__( 'Header Text/Html Color', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '#F8F5FB',
		'choices'  => array(
			'alpha' => true,	
		),	
		'output'	 => array(
			array(				
				'element'	 => '#left-search.search-container p, .search-toggle, .site-cart-info',
				'property'	 => 'color',
			),
		),	
	)
);

if ( mucha_is_woocommerce_active() ):
	mucha_add_field(
	    array(
			'type'     => 'toggle',
			'settings' => 'show_woo_cart',
			'label'    => esc_html__( 'Show Woocommerce Cart', 'mucha' ),
			'section'  => 'mucha_header_general',
			'default'  => true,
		)
	);
endif;

mucha_add_field(
    array(
		'type'     => 'select',
		'settings' => 'beside_navigation',
		'label'    => esc_html__( 'Beside Navigation', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => 'search',
		'choices'	 => array(
			'none'		=> esc_html__( 'None', 'mucha' ),
	    	'search'	=> esc_html__( 'Search', 'mucha' ),
			'button'	=> esc_html__( 'Button', 'mucha' ),
			'icon' 		=> esc_html__( 'Social Icon', 'mucha' ),
			'text/html' => esc_html__( 'Text/Html', 'mucha' ),
			'widget' 	=> esc_html__( 'Widget', 'mucha' ),
		),		
	)
);
// Button Setting
mucha_add_field(
    array(
		'type'     => 'text',
		'settings' => 'header_button_text',
		'label'    => esc_html__( 'Button Text', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '',
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'button',
			),
		),	
	)
);
// Button Url
mucha_add_field(
    array(
		'type'     => 'link',
		'settings' => 'header_button_link',
		'label'    => esc_html__( 'Button Link', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '',
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'button',
			),
		),		
	)
);
// Open in New Tab
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'header_open_newtab',
		'label'    => esc_html__( 'Open link in a new tab', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  =>  false,
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'button',
			),
		),		
	)
);
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'header_border_radius',
		'label'    => esc_html__( 'Button Border Radius', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => 0,
		'choices'	 => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => 'a.header-btn',
				'property'	 => 'border-radius',
				'units'		 => 'px',
			),
		),	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'button',
			),
		),						
	)
);
// Button Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'button_color',
		'label'    => esc_html__( 'Button Color', 'mucha' ),
		'section'  => 'mucha_header_general',
		'choices'	 => array(
	        'button_link'    		=> esc_html__( 'Color', 'mucha' ),
	        'button_border'    		=> esc_html__( 'Border Color', 'mucha' ),
	        'button_hover_link'   	=> esc_html__( 'Hover Color', 'mucha' ),
	        'button_hover_border'   	=> esc_html__( 'Hover Border Color', 'mucha' ),
	        'button_bg_color'  		=> esc_html__( 'Background Color', 'mucha' ),
	        'button_bg_hover_color' => esc_html__( 'Hover Background Color', 'mucha' ),
		),
		'default'	 => array(
	        'button_link'    		=> '#ffffff',
	        'button_hover_link'   	=> '#ffffff',
	        'button_border'  		=> '#6E3CAF',
	        'button_bg_color'  		=> '#6E3CAF',
	        'button_bg_hover_color' => '#FF7506',
	        'button_hover_border' 	=> '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'button_link',
				'element'	 => 'a.header-btn',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'button_hover_link',
				'element'	 => 'a.header-btn:hover',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'button_bg_color',
				'element'	 => 'a.header-btn',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'button_bg_hover_color',
				'element'	 => 'a.header-btn:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'button_border',
				'element'	 => 'a.header-btn',
				'property'	 => 'border-color',
			),
	    	array(
				'choice'	 => 'button_hover_border',
				'element'	 => 'a.header-btn:hover',
				'property'	 => 'border-color',
			),									
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'button',
			),
		),				
	)
);
// Header Text/Html
mucha_add_field(
    array(
		'type'     => 'editor',
		'settings' => 'header_textarea',
		'label'    => esc_html__( 'Text/Html', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '',
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'text/html',
			),
		),	
	)
);
// Beside Nav Icon
mucha_add_field(
    array(
		'type'     => 'repeater',
		'settings' => 'beside_header_icon',
		'label'    => esc_html__( 'Social Icon', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '',
		'row_label'=> array(
			'type'  => 'text',
			'value' => esc_html__( 'Social link', 'mucha' ),
		),
		'button_label' => esc_html__( 'Add Social Icon', 'mucha' ),
		'fields' => array(
			'link_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Link Text', 'mucha' ),
				'default'     => '',
			),
			'link_url'  => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Link URL', 'mucha' ),
				'default'     => '',
			),
			'link_target'  => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open link in a new tab', 'mucha' ),
				'default'     => false,
			),			
		),		
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'icon',
			),

		),		
	)
);
// Social Icon Color Beside 
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'beside_header_social_color',
		'label'    => esc_html__( 'Social Icon Color', 'mucha' ),
		'section'  => 'mucha_header_general',
		'choices'	 => array(
			'bg_color' 		=> esc_html__( 'Background Color', 'mucha' ),
	        'link'    		=> esc_html__( 'Color', 'mucha' ),
	        'hover'   		=> esc_html__( 'Hover', 'mucha' ),
	        'bg_hover'   	=> esc_html__( 'Background Hover', 'mucha' ),
	        'border'   		=> esc_html__( 'Border Color', 'mucha' ),
	        'hover_border'  => esc_html__( 'Hover Border Color', 'mucha' ),
		),
		'default'	 => array(
	        'link'    		=> '#FFFFFF',
	        'hover'   		=> '#FFFFFF',
	        'bg_color'  	=> '#4A2973',
	        'bg_hover'  	=> '#FF7506',
	        'border'  		=> '#4A2973',
	        'hover_border'  => '#FF7506',
		),			
		'output'	 => array(
			array(
				'choice'	 => 'link',
				'element'	 => '.search-container .inline-social-icons.social-links ul li a::before',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'hover',
				'element'	 => '.search-container .inline-social-icons.social-links ul li a:hover::before',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'bg_color',
				'element'	 => '.search-container .inline-social-icons li a',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'bg_hover',
				'element'	 => '.search-container .inline-social-icons li a:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'border',
				'element'	 => '.search-container .inline-social-icons li a',
				'property'	 => 'border-color',
			),
	    	array(
				'choice'	 => 'hover_border',
				'element'	 => '.search-container .inline-social-icons li a:hover',
				'property'	 => 'border-color',
			),									
		),		
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'icon',
			),

		),			
	)
);
// Border Bottom
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_header_bottom',
		'label'    => esc_html__( 'Show Border Bottom', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => true,
	)
);
// Header Border Width.
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'header_border_width',
		'label'    => esc_html__( 'Border Bottom Width', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '1',
		'choices'	 => array(
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => '.site-header',
				'property'	 => 'border-bottom-width',
				'units'		 => 'px',
			),
		),	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_header_bottom',
				'operator'	 => '==',
				'value'		 => true,
			),
		),						
	)
);
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'header_border_color',
		'label'    => esc_html__( 'Border Bottom Color', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '#e2e2e2',
		'choices'	 => array(
			'alpha' => true,
		),
		'output'	 => array(
			array(				
				'element'	 => '.site-header',
				'property'	 => 'border-bottom-color',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_header_bottom',
				'operator'	 => '==',
				'value'		 => true,
			),
		),							
	)
);
mucha_add_field(
    array(
		'type'     	=> 'select',
		'settings' 	=> 'header_border_style',
		'label'    	=> esc_html__( 'Border Bottom Style', 'mucha' ),
		'section'  	=> 'mucha_header_general',
		'default'  	=> 'solid',
		'choices'	=> array(
			'solid'		=> esc_html__( 'Solid', 'mucha' ), 
			'dashed'	=> esc_html__( 'Dashed', 'mucha' ), 
			'double'	=> esc_html__( 'Double', 'mucha' ), 
			'grove'		=> esc_html__( 'Grove', 'mucha' ), 
			'inset'		=> esc_html__( 'Inset', 'mucha' ), 
			'outset'	=> esc_html__( 'Outset', 'mucha' ), 
			'ridge'		=> esc_html__( 'Ridge', 'mucha' ), 
		),
		'output'	 => array(
			array(				
				'element'	 => '.site-header',
				'property'	 => 'border-bottom-style',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_header_bottom',
				'operator'	 => '==',
				'value'		 => true,
			),
		),							
	)
);

// Transparent Header Options
Kirki::add_section( 'mucha_transparent_header', array(
	'title'    => esc_html__( 'Transparent Header', 'mucha' ),
	'panel'    => 'mucha_header_options',
	'priority' => 20,
) );
// Enable Transparent Header
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_transparent_header',
		'label'    => esc_html__( 'Enbale Transparent Header', 'mucha' ),
		'section'  => 'mucha_transparent_header',
		'default'  =>  false,
	)
);
// Show  Transparent Logo.
mucha_add_field(
    array(
		'type'     => 'checkbox',
		'settings' => 'show_transparent_logo',
		'label'    => esc_html__( 'Different Logo For Transparent Header?', 'mucha' ),
		'section'  => 'mucha_transparent_header',
		'default'  => false,
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_transparent_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),						
	)
);
//Transparent Logo.
mucha_add_field(
    array(
		'type'     => 'image',
		'settings' => 'transparent_logo',
		'label'    => esc_html__( 'Transparent Logo', 'mucha' ),
		'section'  => 'mucha_transparent_header',
		'default'  => '',	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_transparent_header',
				'operator'	 => '==',
				'value'		 => true,
			),
			array(
				'setting'	 => 'show_transparent_logo',
				'operator'	 => '==',
				'value'		 => true,
			),			
		),	
		'choices'	 => array(
			'save_as' => 'id',
		),		
	)
);
//Transparent Navigation Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'transparent_navigaion_color',
		'label'    => esc_html__( 'Transparent Navigation Color', 'mucha' ),
		'section'  => 'mucha_transparent_header',
		'choices'	 => array(
	        'link'    => esc_html__( 'Color', 'mucha' ),
	        'hover'   => esc_html__( 'Hover', 'mucha' ),
	        'active'  => esc_html__( 'Active', 'mucha' ),
	        'sub_bg'  	=> esc_html__( 'Sub Menu Background Hover', 'mucha' ),
	        'sub_border'  => esc_html__( 'Sub Menu Border Color', 'mucha' ),
		),
		'default'	 => array(
	        'link'    => '#6E3CAF',
	        'hover'   => '#FF7506',
	        'active'  => '#6E3CAF',
	        'sub_bg'  => '#FF7506',
	        'sub_border'  => '#676767',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'link',
				'element'	 => '.mucha-transparent-header .main-navigation li a, .mucha-transparent-header .menu-item-has-children::before,
				.mucha-transparent-header-without-logo .main-navigation li a, .mucha-transparent-header-without-logo .menu-item-has-children::before',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'hover',
				'element'	 => '.mucha-transparent-header .main-navigation li a:hover, .mucha-transparent-header .menu-item-has-children:hover::before, .mucha-transparent-header .main-navigation ul li a:hover,
				.mucha-transparent-header-without-logo .main-navigation li a:hover, .mucha-transparent-header-without-logo .menu-item-has-children:hover::before, .mucha-transparent-header-without-logo .main-navigation ul li a:hover',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'active',
				'element'	 => '.mucha-transparent-header .main-navigation li.current-menu-item a, .mucha-transparent-header .main-navigation li.current_page_item a,
				mucha-transparent-header-without-logo .main-navigation li.current-menu-item a, .mucha-transparent-header-without-logo .main-navigation li.current_page_item a',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'sub_bg',
				'element'	 => '.mucha-transparent-header .main-navigation ul li ul li a:hover,.mucha-transparent-header-without-logo .main-navigation ul li ul li a:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'sub_border',
				'element'	 => '.mucha-transparent-header .main-navigation ul ul li:hover ul, .mucha-transparent-header .main-navigation ul ul ul li:hover ul, .mucha-transparent-header .main-navigation ul ul ul ul li:hover ul, .mucha-transparent-header .main-navigation ul ul ul ul ul li:hover ul, .mucha-transparent-header .main-navigation ul li ul,.mucha-transparent-header-without-logo .main-navigation ul ul li:hover ul, .mucha-transparent-header-without-logo .main-navigation ul ul ul li:hover ul, .mucha-transparent-header-without-logo .main-navigation ul ul ul ul li:hover ul, .mucha-transparent-header-without-logo .main-navigation ul ul ul ul ul li:hover ul, .mucha-transparent-header-without-logo .main-navigation ul li ul',
				'property'	 => 'border-top-color',
			),	
	    	array(
				'choice'	 => 'sub_border',
				'element'	 => '.mucha-transparent-header .main-navigation ul li ul li,.mucha-transparent-header-without-logo .main-navigation ul li ul li',
				'property'	 => 'border-bottom-color',
			),									
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_transparent_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),				
	)
);
// Transparent Button Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'transparent_button_color',
		'label'    => esc_html__( 'Transparent Button Color', 'mucha' ),
		'section'  => 'mucha_transparent_header',
		'choices'	 => array(
	        'button_link'    		=> esc_html__( 'Color', 'mucha' ),
	        'button_border'    		=> esc_html__( 'Border Color', 'mucha' ),
	        'button_hover_link'   	=> esc_html__( 'Hover Color', 'mucha' ),
	        'button_hover_border'   	=> esc_html__( 'Hover Border Color', 'mucha' ),
	        'button_bg_color'  		=> esc_html__( 'Background Color', 'mucha' ),
	        'button_bg_hover_color' => esc_html__( 'Hover Background Color', 'mucha' ),
		),
		'default'	 => array(
	        'button_link'    		=> '#ffffff',
	        'button_hover_link'   	=> '#ffffff',
	        'button_border'  		=> '#6E3CAF',
	        'button_bg_color'  		=> '#6E3CAF',
	        'button_bg_hover_color' => '#FF7506',
	        'button_hover_border' 	=> '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'button_link',
				'element'	 => 'a.header-btn',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'button_hover_link',
				'element'	 => '.mucha-transparent-header a.header-btn:hover, .mucha-transparent-header-without-logo a.header-btn:hover',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'button_bg_color',
				'element'	 => '.mucha-transparent-header a.header-btn, .mucha-transparent-header-without-logo a.header-btn',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'button_bg_hover_color',
				'element'	 => '.mucha-transparent-header a.header-btn:hover, .mucha-transparent-header-without-logo a.header-btn:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'button_border',
				'element'	 => '.mucha-transparent-header a.header-btn:hover, .mucha-transparent-header-without-logo a.header-btn:hover',
				'property'	 => 'border-color',
			),
	    	array(
				'choice'	 => 'button_hover_border',
				'element'	 => '.mucha-transparent-header a.header-btn:hover,.mucha-transparent-header-without-logo a.header-btn:hover',
				'property'	 => 'border-color',
			),	

		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'button',
			),
			array(
				'setting'	 => 'show_transparent_header',
				'operator'	 => '==',
				'value'		 => true,
			),			
		),				
	)
);
// Transparent Beside Social Icon Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'transparent_beside_header_social_color',
		'label'    => esc_html__( 'Transparent Social Icon Color', 'mucha' ),
		'section'  => 'mucha_transparent_header',
		'choices'	 => array(
			'bg_color' 		=> esc_html__( 'Background Color', 'mucha' ),
	        'link'    		=> esc_html__( 'Color', 'mucha' ),
	        'hover'   		=> esc_html__( 'Hover', 'mucha' ),
	        'bg_hover'   	=> esc_html__( 'Background Hover', 'mucha' ),
	        'border'   		=> esc_html__( 'Border Color', 'mucha' ),
	        'hover_border'  => esc_html__( 'Hover Border Color', 'mucha' ),
		),
		'default'	 => array(
	        'link'    		=> '#FF7506',
	        'hover'   		=> '#FFFFFF',
	        'bg_color'  	=> '#FFFFFF',
	        'bg_hover'  	=> '#FF7506',
	        'border'  		=> '#F2E9FD',
	        'hover_border'  => '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'link',
				'element'	 => '.mucha-transparent-header .search-container .inline-social-icons li a:before, .mucha-transparent-header-without-logo .search-container .inline-social-icons li a:before',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'hover',
				'element'	 => '.mucha-transparent-header .search-container .inline-social-icons li a:hover:before, .mucha-transparent-header-without-logo .search-container .inline-social-icons li a:hover:before',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'bg_color',
				'element'	 => '.mucha-transparent-header .search-container .inline-social-icons li a, .mucha-transparent-header-without-logo .search-container .inline-social-icons li a',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'bg_hover',
				'element'	 => '.mucha-transparent-header .search-container .inline-social-icons li a:hover, .mucha-transparent-header-without-logo .search-container .inline-social-icons li a:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'border',
				'element'	 => '.mucha-transparent-header .search-container .inline-social-icons li a, .mucha-transparent-header-without-logo .search-container .inline-social-icons li a',
				'property'	 => 'border-color',
			),
	    	array(
				'choice'	 => 'hover_border',
				'element'	 => '.mucha-transparent-header .search-container .inline-social-icons li a:hover, .mucha-transparent-header-without-logo .search-container .inline-social-icons li a:hover',
				'property'	 => 'border-color',
			),									
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'beside_navigation',
				'operator'	 => '==',
				'value'		 => 'icon',
			),
			array(
				'setting'	 => 'show_transparent_header',
				'operator'	 => '==',
				'value'		 => true,
			),
		),			
	)
);
//Transparent Header Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'transparent_header_text_color',
		'label'    => esc_html__( 'Transparent Header Color', 'mucha' ),
		'section'  => 'mucha_header_general',
		'default'  => '#F8F5FB',
		'choices'  => array(
			'alpha' => true,	
		),	
		'output'	 => array(
			array(				
				'element'	 => '.mucha-transparent-header #left-search.search-container p, .mucha-transparent-header .search-toggle, .mucha-transparent-header .site-cart-info, .mucha-transparent-header-without-logo #left-search.search-container p, .mucha-transparent-header-without-logo .search-toggle, .mucha-transparent-header-without-logo .site-cart-info',
				'property'	 => 'color',
			),
		),			
	)
);
// Breadcrumb Options
Kirki::add_section( 'mucha_breadcrumb', array(
	'title'    => esc_html__( 'Breadcrumb', 'mucha' ),
	'panel'    => 'mucha_header_options',
	'priority' => 20,
) );
// Show Breadcrumb
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_breadcrumb',
		'label'    => esc_html__( 'Show Breadcrumb', 'mucha' ),
		'section'  => 'mucha_breadcrumb',
		'default'  =>  true,
	)
);

//Breadcrumb Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'breadcrumb_color',
		'label'    => esc_html__( 'Breadcrumb Color', 'mucha' ),
		'section'  => 'mucha_breadcrumb',
		'choices'	 => array(
	        'text_color'    => esc_html__( 'Color', 'mucha' ),
	        'hover_link'    => esc_html__( 'Hover Color', 'mucha' ),
	        'active'   		=> esc_html__( 'Active Color', 'mucha' ),
	        'border'   		=> esc_html__( 'Border Color', 'mucha' ),
		),
		'default'	 => array(
	        'text_color'    	=> '#ffffff',
	        'hover_link'   		=> '#FF7506',
	        'active'  			=> '#ffffff',
	        'border'  			=> '#ffffff',
		),	
		'output'	 => array(
	    	array(
				'choice'	 => 'text_color',
				'element'	 => '.page-title-wrap .breadcrumbs a span',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'hover_link',
				'element'	 => '.page-title-wrap .breadcrumbs a:hover span',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'active',
				'element'	 => '.breadcrumbs li span',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'border',
				'element'	 => '.breadcrumbs li::before',
				'property'	 => 'color',
			),				
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_breadcrumb',
				'operator'	 => '==',
				'value'		 => true,
			),
		),							
	)
);
//Breadcrumb Header Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'breadcrumb_header_color',
		'label'    => esc_html__( 'Breadcrumb Background Color', 'mucha' ),
		'section'  => 'mucha_breadcrumb',
		'default'  => 'rgba(110,60,175)',
		'choices'  => array(
			'alpha' => true,	
		),	
		'output'	 => array(
			array(				
				'element'	 => '.page-title-wrap.breadcrumb-wrapper:before',
				'property'	 => 'background-color',
			),
		),	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_breadcrumb',
				'operator'	 => '==',
				'value'		 => true,
			),
		),		
	)
);
// Breadcrumb Background
mucha_add_field(
    array(
		'type'     => 'background',
		'settings' => 'breadcrumb_bg',
		'label'    => esc_html__( 'Breadcrumb Background', 'mucha' ),
		'section'  => 'mucha_breadcrumb',
		'default'  => array(
			'background-color'      => 'rgba(110,60,175)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
		'output'	 => array(
			array(				
				'element'	 => '.page-title-wrap.breadcrumb-wrapper',				
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_breadcrumb',
				'operator'	 => '==',
				'value'		 => true,
			),
		),								
	)
);
