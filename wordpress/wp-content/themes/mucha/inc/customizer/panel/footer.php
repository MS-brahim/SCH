<?php
/**
 * Footer Options
 *
 * @package Mucha
 */

/**
 * Footer Options Panel
 */
Kirki::add_panel( 'mucha_footer_options', array(
	'priority' => 10,
	'title'    => esc_html__( 'Footer', 'mucha' ),
) );
// Header Options
Kirki::add_section( 'mucha_footer_section', array(
	'title'    => esc_html__( 'Footer Widget', 'mucha' ),
	'panel'    => 'mucha_footer_options',
	'priority' => 20,
) );
//Show Footer Widget
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_footer_widget',
		'label'    => esc_html__( 'Show Footer Widget', 'mucha' ),
		'section'  => 'mucha_footer_section',
		'default'  => false,				
	)
);
// Footer Background Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'footer_bg_color',
		'label'    => esc_html__( 'Footer Background Color', 'mucha' ),
		'section'  => 'mucha_footer_section',
		'default'  => 'rgba(110, 60, 175, 0.85)',
		'choices'  => array(
			'alpha' => true,	
		),	
		'output'	 => array(
			array(				
				'element'	 => '.site-footer .widget-area:before',
				'property'	 => 'background-color',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_footer_widget',
				'operator'	 => '==',
				'value'		 => true,
			),
		),			
	)
);
// Footer Background Image
mucha_add_field(
    array(
		'type'     => 'background',
		'settings' => 'footer_widget_bg',
		'label'    => esc_html__( 'Footer Widget Background', 'mucha' ),
		'section'  => 'mucha_footer_section',
		'default'  => array(
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
		'output'	 => array(
			array(				
				'element'	 => '.site-footer .widget-area',				
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_footer_widget',
				'operator'	 => '==',
				'value'		 => true,
			),
		),								
	)
);
// Footer Widget Style
mucha_add_field(
    array(
		'type'     => 'radio-image',
		'settings' => 'footer_widget_styles',
		'label'    => esc_html__( 'Footer Widget Style', 'mucha' ),
		'section'  => 'mucha_footer_section',
		'default'  => '4',
		'choices'	 => array(
			'1'   	=> get_template_directory_uri() . '/assets/img/footer-1.png',
			'2' 	=> get_template_directory_uri() . '/assets/img/footer-2.png',
			'3'  	=> get_template_directory_uri() . '/assets/img/footer-3.png',
			'4'  	=> get_template_directory_uri() . '/assets/img/footer-4.png',
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_footer_widget',
				'operator'	 => '==',
				'value'		 => true,
			),
		),
	)
);
mucha_add_field(
    array(
		'type'     => 'radio-buttonset',
		'settings' => 'footer_widget_styles_align',
		'label'    => esc_html__( 'Footer Widget Align', 'mucha' ),
		'section'  => 'mucha_footer_section',
		'default'  => 'left',
		'choices'	 => array(
			'left'		=> esc_html__( 'Left', 'mucha' ),
	    	'center'	=> esc_html__( 'Center', 'mucha' ),
			'right'		=> esc_html__( 'Right', 'mucha' ),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_footer_widget',
				'operator'	 => '==',
				'value'		 => true,
			),
		),
	)
);


mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'footeer_widget_color',
		'label'    => esc_html__( 'Footer Widget Color', 'mucha' ),
		'section'  => 'mucha_footer_section',
		'choices'	 => array(
	        'title'    => esc_html__( 'Title Color', 'mucha' ),
	        'text'   => esc_html__( 'Text', 'mucha' ),
	        'hover'  => esc_html__( 'Hover', 'mucha' ),
		),
		'default'	 => array(
	        'title'    	=> '#fff',
	        'text'   	=> '#fff',
	        'hover'  	=> '#fff',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'title',
				'element'	 => '.site-footer .widget-title span, .site-footer .widget-title',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'text',
				'element'	 => '.site-footer .widget p,.site-footer .widget a,.site-footer .widget li',
				'property'	 => 'color',
			),
	    array(
				'choice'	 => 'hover',
				'element'	 => '.site-footer a:hover,.site-footer .widget>ul li a:hover,.site-footer .widget>ul li a:before',
				'property'	 => 'color',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_footer_widget',
				'operator'	 => '==',
				'value'		 => true,
			),
		),				
	)
);
// Bottom Footer Options
Kirki::add_section( 'mucha_bottom_footer_section', array(
	'title'    => esc_html__( 'Bottom Footer', 'mucha' ),
	'panel'    => 'mucha_footer_options',
	'priority' => 30,
) );
mucha_add_field(
    array(
		'type'     => 'editor',
		'settings' => 'footer_credit',
		'label'    => esc_html__( 'Footer Credit', 'mucha' ),
		'section'  => 'mucha_bottom_footer_section',
		'default'  => sprintf( __( 'Theme of %s', 'mucha' ), '<a target="_blank" rel="designer" href="http://theme404.com/">Theme 404.</a>' ),
	)
);

//Beside Footer Credit
mucha_add_field(
    array(
		'type'     => 'select',
		'settings' => 'besider_footer_credit',
		'label'    => esc_html__( 'Beside Footer Credit ', 'mucha' ),
		'section'  => 'mucha_bottom_footer_section',
		'default'  => 'none',
		'choices'	 => array(
			'none'		=> esc_html__( 'None', 'mucha' ),
	    	'search'	=> esc_html__( 'Search', 'mucha' ),
			'menu'		=> esc_html__( 'Menu', 'mucha' ),
			'text/html' => esc_html__( 'Text/Html', 'mucha' ),
			'icon' 		=> esc_html__( 'Social Icon', 'mucha' ),
		),			
	)
);
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'beside_site-generator_social_color',
		'label'    => esc_html__( 'Social Icon Color', 'mucha' ),
		'section'  => 'mucha_bottom_footer_section',
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
				'element'	 => '.besider-site-generator .inline-social-icons.social-links ul li a::before',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'hover',
				'element'	 => '.besider-site-generator .inline-social-icons.social-links ul li a:hover::before',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'bg_color',
				'element'	 => '.besider-site-generator .inline-social-icons li a',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'bg_hover',
				'element'	 => '.besider-site-generator .inline-social-icons li a:hover',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'border',
				'element'	 => '.besider-site-generator .inline-social-icons li a',
				'property'	 => 'border-color',
			),
	    	array(
				'choice'	 => 'hover_border',
				'element'	 => '.besider-site-generator .inline-social-icons li a:hover',
				'property'	 => 'border-color',
			),									
		),		
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'besider_footer_credit',
				'operator'	 => '==',
				'value'		 => 'icon',
			),

		),			
	)
);
// Footer Menu
mucha_add_field(
    array(
		'type'     => 'select',
		'settings' => 'footer_menu',
		'label'    => esc_html__( 'Footer Menu', 'mucha' ),
		'section'  => 'mucha_bottom_footer_section',
		'default'  => 'search',
		'choices'	 => mucha_get_menu_options(),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'besider_footer_credit',
				'operator'	 => '==',
				'value'		 => 'menu',
			),
		),			
	)
);
// Footer Text/Html
mucha_add_field(
    array(
		'type'     => 'editor',
		'settings' => 'footer_textarea',
		'label'    => esc_html__( 'Text/Html', 'mucha' ),
		'section'  => 'mucha_bottom_footer_section',
		'default'  => '',
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'besider_footer_credit',
				'operator'	 => '==',
				'value'		 => 'text/html',
			),
		),	
	)
);
mucha_add_field(
    array(
		'type'     => 'repeater',
		'settings' => 'footer_icon',
		'label'    => esc_html__( 'Footer Icon', 'mucha' ),
		'section'  => 'mucha_bottom_footer_section',
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
				'setting'	 => 'besider_footer_credit',
				'operator'	 => '==',
				'value'		 => 'icon',
			),
		),		
	)
);
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'footeer_bottom_color',
		'label'    => esc_html__( 'Bottom Footer Color', 'mucha' ),
		'section'  => 'mucha_bottom_footer_section',
		'choices'	 => array(
	        'bg_color'    => esc_html__( 'Background Color', 'mucha' ),
	        'text_color'   => esc_html__( 'Text', 'mucha' ),
	        'hover'  => esc_html__( 'Hover', 'mucha' ),
		),
		'default'	 => array(
	        'bg_color' 	=> '#593290',
	        'text_color'   	=> '#fff',
	        'hover'  	=> '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'bg_color',
				'element'	 => '.site-generator,  .mucha-wrapper-header-layout-6 .site-footer',
				'property'	 => 'background-color',
			),
			array(
				'choice'	 => 'text_color',
				'element'	 => '.site-generator, .site-generator a, .site-generator p',
				'property'	 => 'color',
			),
	    array(
				'choice'	 => 'hover',
				'element'	 => '.site-footer a:hover',
				'property'	 => 'color',
			),
		),		
	)
);

Kirki::add_section( 'mucha_scroll_top', array(
	'title'    => esc_html__( 'Scroll to Top', 'mucha' ),
	'panel'    => 'mucha_footer_options',
	'priority' => 40,
) );
//Show Scroll to Top
mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_scroll_to_top',
		'label'    => esc_html__( 'Show Scroll to Top', 'mucha' ),
		'section'  => 'mucha_scroll_top',
		'default'  => true,				
	)
);
// Scroll to Top Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'scroll_top_colors',
		'label'    => esc_html__( 'Scroll to Top Color', 'mucha' ),
		'section'  => 'mucha_scroll_top',
		'choices'	 => array(
	        'bg_color'    	=> esc_html__( 'Background Color', 'mucha' ),
	        'text_color'   	=> esc_html__( 'Text Color', 'mucha' ),
	        'bg_hover'  	=> esc_html__( 'Hover Background Color', 'mucha' ),
	        'hover'  		=> esc_html__( 'Hover Text Color', 'mucha' ),
	        'hover_border'  => esc_html__( 'Hover Border Color', 'mucha' ),
		),
		'default'	 => array(
	        'bg_color' 		=> '#FF7506',
	        'text_color'   	=> '#ffffff',
	        'hover'  		=> '#ffffff',
	        'bg_hover'  	=> '#6E3CAF',
	        'hover_border' 	=> '#ffffff',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'bg_color',
				'element'	 => '.back-to-top a',
				'property'	 => 'background-color',
			),
			array(
				'choice'	 => 'text_color',
				'element'	 => '.back-to-top a',
				'property'	 => 'color',
			),
		    array(
					'choice'	 => 'bg_hover',
					'element'	 => '.back-to-top a:hover',
					'property'	 => 'background-color',
				),
		    array(
					'choice'	 => 'hover',
					'element'	 => '.back-to-top a:hover',
					'property'	 => 'color',
				),
		    array(
					'choice'	 => 'hover_border',
					'element'	 => '.back-to-top a:hover',
					'property'	 => 'border-color',
				),
		),	
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'show_scroll_to_top',
				'operator'	 => '==',
				'value'		 => true,
			),
		),			
				
	)
);
