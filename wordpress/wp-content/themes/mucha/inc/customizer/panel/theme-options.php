<?php
/**
 * Theme Options
 *
 * @package Mucha
 */
/**
 * Theme Options Panel
 */
add_filter( 'kirki_telemetry', '__return_false' );
Kirki::add_panel( 'mucha_theme_options', array(
	'priority' => 10,
	'title'    => esc_html__( 'Theme Option', 'mucha' ),
) );
// Layout Options
Kirki::add_section( 'mucha_typography_section', array(
	'title'    => esc_html__( 'Typography', 'mucha' ),
	'panel'    => 'mucha_theme_options',
	'priority' => 20,
) );
// Button Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'general_button_color',
		'label'    => esc_html__( 'General Button Color', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => 'right',
		'choices'	 => array(
	        'button_link'    		=> esc_html__( 'Color', 'mucha' ),
	        'button_hover_link'   	=> esc_html__( 'Hover Color', 'mucha' ),
	        'button_bg_color'  		=> esc_html__( 'Background Color', 'mucha' ),
	        'button_bg_hover_color' => esc_html__( 'Hover Background Color', 'mucha' ),
		),
		'default'	 => array(
	        'button_link'    		=> '#ffffff',
	        'button_hover_link'   	=> '#ffffff',
	        'button_bg_color'  		=> '#6E3CAF',
	        'button_bg_hover_color' => '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'button_link',
				'element'	 => '.woocommerce a.button, .woocommerce button.button, .box-button, .wpcf7-submit[type="submit"], input[type="submit"], .post .read-more-tag, .comment-reply-link, .woocommerce div.product form.cart .button',
				'property'	 => 'color',
			),
			array(
				'choice'	 => 'button_hover_link',
				'element'	 => '.woocommerce a.button:hover, .woocommerce button.button:hover, .box-button:hover, .wpcf7-submit[type="submit"]:hover, input[type="submit":hover], .post .read-more-tag:hover, .form-submit input[type="submit"]:hover,.comment-reply-link:hover, .woocommerce div.product form.cart .button:hover',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'button_bg_color',
				'element'	 => '.woocommerce a.button, .woocommerce button.button, .box-button, .wpcf7-submit[type="submit"], input[type="submit"], .post .read-more-tag, .comment-reply-link, .woocommerce div.product form.cart .button',
				'property'	 => 'background-color',
			),
	    	array(
				'choice'	 => 'button_bg_hover_color',
				'element'	 => '.woocommerce a.button:hover, .woocommerce button.button:hover, .box-button:hover, .wpcf7-submit[type="submit"]:hover, input[type="submit"]:hover, .post .read-more-tag:hover, .form-submit input[type="submit"]:hover, .comment-reply-link:hover, .woocommerce div.product form.cart .button:hover',
				'property'	 => 'background-color',
			),								
		),				
	)
);
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'general_border_radius',
		'label'    => esc_html__( 'Button Border Radius', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => 0,
		'choices'	 => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => '.woocommerce a.button, .woocommerce button.button, .box-button, .wpcf7-submit[type="submit"], input[type="submit"], .post .read-more-tag, .comment-reply-link',
				'property'	 => 'border-radius',
				'units'		 => 'px',
			),
		),							
	)
);
// Body Typography
mucha_add_field(
    array(
		'type'     => 'typography',
		'settings' => 'body_typography',
		'label'    => esc_html__( 'Body Typography', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => array(
			'font-family'    => 'Muli',
			'variant'		 => '',
			'font-size'      => '16px',
			'line-height'    => '1.27',
			'letter-spacing' => '0',
			'color'          => '#676767',		
		),
		'choices'	 => array(
			'fonts'  => array( 
				'google' => array( 'Roboto','Roboto Slab', 'Quicksand', 'Poppins', 'Open Sans', 'Muli', 'Noto Serif', 'Noto Sans'), 
			), 
		),
		'output'	 => array(
			array(				
				'element'	 => 'body',				
			),
		),					
	)
);
// Title Typography
mucha_add_field(
    array(
		'type'     => 'typography',
		'settings' => 'title_typography',
		'label'    => esc_html__( 'Title Typography', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => array(
			'font-family'    => 'Muli',
			'variant'		 => '',
			'font-size'      => '25px',
			'line-height'    => '1.2',
			'letter-spacing' => '0',
			'color'          => '#6E3CAF',
			'text-transform' => 'capitalize',		
		),
		'choices'	 => array(
			'fonts'  => array( 
				'google' => array( 'Roboto', 'Roboto Slab', 'Quicksand', 'Poppins', 'Open Sans', 'Muli', 'Noto Serif', 'Noto Sans'), 
			), 
		),
		'output'	 => array(
			array(				
				'element'	 => 'h3.entry-title a',				
			),
		),					
	)
);
// Paragraph Typography
mucha_add_field(
    array(
		'type'     => 'typography',
		'settings' => 'paragraph_typography',
		'label'    => esc_html__( 'Paragraph Typography', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => array(
			'font-family'    => 'Muli',
			'variant'		 => '',
			'font-size'      => '16px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => '#676767',		
		),
		'choices'	 => array(
			'fonts'  => array( 
				'google' => array( 'Roboto', 'Roboto Slab', 'Quicksand', 'Poppins', 'Open Sans', 'Muli', 'Noto Serif', 'Noto Sans'), 
			), 
		),
		'output'	 => array(
			array(				
				'element'	 => '.entry-content, .site-footer p',				
			),
		),					
	)
);

// Primary Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'primary_typography',
		'label'    => esc_html__( 'Primary Color', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => '#6E3CAF',
		'choices'     => array(
			'alpha' => true,
		),
		'output'	 => array(
			array(				
				'element'	 => 'input, textarea, .post-navigation .nav-links a, .wpcf7-form input, .wpcf7-form textarea, input[type="text"], input[type="email"], input[type="search"], input[type="password"], input[type="tel"], input[type="url"], input[type="date"], input[type="number"], h1, h2, h3, h4, h5, h6',	
				'property'	 => 'color',				
			),

			array(				
				'element'	 => '.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .nav-links a, .woocommerce span.onsale, .search-form input[type="submit"]',	
				'property'	 => 'background-color',				
			),

			
		),					
	)
);
// Secondary Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'secondary_typography',
		'label'    => esc_html__( 'Secondary Color', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => '#FF7506',
		'choices'     => array(
			'alpha' => true,
		),
		'output'	 => array(
			array(				
				'element'	 => '.woocommerce-Price-amount, blockquote, .mean-container a.meanmenu-reveal, .woocommerce-Price-amount:before, search-toggle:hover:before, .entry-meta, .entry-meta a',	
				'property'	 => 'color',			
			),
			array(				
				'element'	 => 'input[type="text"]:focus, input[type="email"]:focus, input[type="search"]:focus, input[type="password"]:focus, input[type="tel"]:focus, input[type="url"]:focus, input[type="date"]:focus, input[type="number"]:focus, textarea:focus, .site-footer input[type="reset"]:hover, .site-footer input[type="button"]:hover, .site-footer input[type="submit"]:hover, .mini_cart_inner, .site-header .mini_cart_inner::before',	
				'property'	 => 'border-color',			
			),	
			array(				
				'element'	 => '.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .search-form input[type="submit"]:hover, .woocommerce-Price-amount:before, #secondary .widget-title::before, .nav-links a:hover',	
				'property'	 => 'background-color',			
			),	
		),					
	)
);

// Hover Color
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'hover_typography',
		'label'    => esc_html__( 'Hover Color', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'default'  => '#6E3CAF',
		'choices'     => array(
			'alpha' => true,
		),
		'output'	 => array(
			array(				
				'element'	 => '#secondary .widget li a:hover, .post-navigation .nav-links a, .wpcf7-form input, .wpcf7-form textarea, .entry-meta a:hover, .cat-links a:hover',	
				'property'	 => 'color',				
			),			
		),					
	)
);

// Layout Options
Kirki::add_section( 'mucha_layout_section', array(
	'title'    => esc_html__( 'Layout', 'mucha' ),
	'panel'    => 'mucha_theme_options',
	'priority' => 20,
) );
mucha_add_field(
    array(
		'type'     => 'radio-image',
		'settings' => 'site_content_layout',
		'label'    => esc_html__( 'Website Layout', 'mucha' ),
		'section'  => 'mucha_layout_section',
		'default'  => 'full-width',
		'choices'	 => array(
			'full-width'		=> esc_url( get_template_directory_uri() ) . '/assets/img/full-width.png',
	    	'boxed'				=> esc_url( get_template_directory_uri() ) . '/assets/img/boxed.png',
			'stretched'			=> esc_url( get_template_directory_uri() ) . '/assets/img/stretched.png',
		),			
	)
);
mucha_add_field(
    array(
		'type'     => 'radio-buttonset',
		'settings' => 'single_page_align',
		'label'    => esc_html__( 'Single Page Align', 'mucha' ),
		'section'  => 'mucha_layout_section',
		'default'  => 'left',
		'choices'	 => array(
			'left'		=> '<i class="dashicons dashicons-editor-alignleft"></i>',
	    	'center'	=> '<i class="dashicons dashicons-editor-aligncenter"></i>',
			'right'		=> '<i class="dashicons dashicons-editor-alignright"></i>',
		),
		'output'	 => array(
			array(				
				'element'	 => 'article.page',
				'property'	 => 'text-align',
			),
		),			
	)
);

// Container Style.
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'container_style',
		'label'    => esc_html__( 'Container Style', 'mucha' ),
		'section'  => 'mucha_layout_section',
		'default'  => '1170',
		'choices'	 => array(
			'min'  => 800,
			'max'  => 1600,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => '.container',
				'property'	 => 'width',
				'units'		 => 'px',
			),
		),
	  	'active_callback'	 => array(
			array(
				'setting'	 => 'site_content_layout',
				'operator'	 => '!==',
				'value'		 => 'stretched',
			),
		),					
	)
);
// Sidebar Width.
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'sidebar_widths',
		'label'    => esc_html__( 'Sidebar Width', 'mucha' ),
		'description'=> esc_html__( 'Only works for left/ right sidebar layout', 'mucha'),
		'section'  => 'mucha_layout_section',
		'default'  => '33.333',
		'choices'	 => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => '.global-layout-left_sidebar #secondary, .global-layout-right_sidebar #secondary',
				'property'	 => 'width',
				'units'		 => '%',
				'media_query' => '@media (min-width: 767px)',
			),
		),				
	)
);
// Container Width.
mucha_add_field(
    array(
		'type'     => 'slider',
		'settings' => 'container_widths',
		'label'    => esc_html__( 'Container Width', 'mucha' ),
		'description'=> esc_html__( 'Only works for left/ right sidebar layout', 'mucha'),
		'section'  => 'mucha_layout_section',
		'default'  => '66.6667',
		'choices'	 => array(
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		),
		'output'	 => array(
			array(				
				'element'	 => '.global-layout-left_sidebar #primary, .global-layout-right_sidebar #primary',
				'property'	 => 'width',
				'units'		 => '%',
				'media_query' => '@media (min-width: 767px)',
			),
		),				
	)
);

// Sidebar Options
Kirki::add_section( 'mucha_sidebar_section', array(
	'title'    => esc_html__( 'Sidebar', 'mucha' ),
	'panel'    => 'mucha_theme_options',
	'priority' => 20,
) );

//Archive Sidebar Options
mucha_add_field(
    array(
		'type'     => 'radio-image',
		'settings' => 'sidebar_layout',
		'label'    => esc_html__( 'Sidebar Options', 'mucha' ),
		'section'  => 'mucha_sidebar_section',
		'default'  => 'right_sidebar',
		'choices'	 => array(
			'left_sidebar'		=> esc_url( get_template_directory_uri() ) . '/assets/img/left-sidebar.png',
	    	'right_sidebar'		=> esc_url( get_template_directory_uri() ) . '/assets/img/right-sidebar.png',
			'no_sidebar'		=> esc_url( get_template_directory_uri() ) . '/assets/img/no-sidebar.png',
		),			
	)
);
// Widget Typography
mucha_add_field(
    array(
		'type'     => 'typography',
		'settings' => 'widgets_typography',
		'label'    => esc_html__( 'Widget Title Typography', 'mucha' ),
		'section'  => 'mucha_sidebar_section',
		'default'  => array(
			'font-family'    => 'Muli',
			'variant'		 => '',
			'font-size'      => '25px',
			'line-height'    => '1.2',
			'letter-spacing' => '0',
			'text-transform' => 'capitalize',		
		),
		'choices'	 => array(
			'fonts'  => array( 
				'google' => array( 'Roboto', 'Roboto Slab', 'Quicksand', 'Poppins', 'Open Sans', 'Muli', 'Noto Serif', 'Noto Sans'), 
			), 
		),
		'output'	 => array(
			array(				
				'element'	 => '.widget-area .widget-title',				
			),
		),					
	)
);
// Sidebar Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'sidebar_widget_color',
		'label'    => esc_html__( 'Sidebar Color', 'mucha' ),
		'section'  => 'mucha_sidebar_section',
		'choices'	 => array(
	        'background_color'  => esc_html__( 'Background Color', 'mucha' ),
	        'sidebar_title_color' 	=> esc_html__( 'Sidebar Title Color', 'mucha' ),
	        'sidebar_color'  	=> esc_html__( 'Sidebar Color', 'mucha' ),
	        'sidebar_hover_color'  	=> esc_html__( 'Sidebar Hover Color', 'mucha' ),
	        
		),
		'default'	 => array(
	        'background_color'    	=> '#F0F4FF',
	        'sidebar_title_color'   => '#6e3caf',
	        'sidebar_color' 		=> '#ff7506',
	        'sidebar_hover_color' 	=> '#6E3CAF',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'background_color',
				'element'	 => '#secondary .widget',
				'property'	 => 'background-color',
			),
			array(
				'choice'	 => 'sidebar_title_color',
				'element'	 => '.widget-area .widget-title',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'sidebar_color',
				'element'	 => '#secondary .widget li a',
				'property'	 => 'color',
			),	
	    	array(
				'choice'	 => 'sidebar_hover_color',
				'element'	 => '#secondary .widget li a:hover',
				'property'	 => 'color',
			),											
		),				
	)
);

// Widget Typography
mucha_add_field(
    array(
		'type'     => 'typography',
		'settings' => 'widgets_text_typography',
		'label'    => esc_html__( 'Widget Typography', 'mucha' ),
		'section'  => 'mucha_sidebar_section',
		'default'  => array(
			'font-family'    => 'Muli',
			'variant'		 => '',
			'font-size'      => '16px',
			'line-height'    => '1.27',
			'letter-spacing' => '0',
			'text-transform' => 'capitalize',		
		),
		'choices'	 => array(
			'fonts'  => array( 
				'google' => array( 'Roboto', 'Roboto Slab', 'Quicksand', 'Poppins', 'Open Sans', 'Muli', 'Noto Serif', 'Noto Sans'), 
			), 
		),
		'output'	 => array(
			array(				
				'element'	 => '#secondary .widget li a',				
			),
		),					
	)
);

// Archive Options
Kirki::add_section( 'mucha_blog_section', array(
	'title'    => esc_html__( 'Archive/Blog', 'mucha' ),
	'panel'    => 'mucha_theme_options',
	'priority' => 20,
) );


// Archive Post Sortable
mucha_add_field(
    array(
		'type'     => 'sortable',
		'settings' => 'archive_post_structure',
		'label'    => esc_html__( 'Archive/Blog Post Structure', 'mucha' ),
		'section'  => 'mucha_blog_section',
		'default'  => array(
			'entry-title',
			'entry-content',
			'featured-image',
			'post-meta',
		),
		'choices'	 => array(
			'entry-title'		=> esc_html__( 'Entry Title', 'mucha' ),
	    	'entry-content'		=> esc_html__( 'Entry Content', 'mucha' ),
			'featured-image'	=> esc_html__( 'Featured Image', 'mucha' ),
			'post-meta'			=> esc_html__( 'Post Meta', 'mucha' ),
		),				
	)
);
// Post Options
mucha_add_field(
    array(
		'type'     => 'radio',
		'settings' => 'post_content',
		'label'    => esc_html__( 'Content', 'mucha' ),
		'section'  => 'mucha_blog_section',
		'default'  => 'excerpt',
		'choices'  => array(
			'excerpt'	=> esc_html__( 'Excerpt', 'mucha' ),
			'content'	=> esc_html__( 'Content', 'mucha' ),
		),
	)
);
// Pagination Options
mucha_add_field(
    array(
		'type'     => 'radio',
		'settings' => 'pagination_layout',
		'label'    => esc_html__( 'Pagination', 'mucha' ),
		'section'  => 'mucha_blog_section',
		'default'  => 'default',
		'choices'  => array(
			'default'	=> esc_html__( 'Default', 'mucha' ),
			'numeric'	=> esc_html__( 'Numeric', 'mucha' ),
		),
	)
);

// Single Options
Kirki::add_section( 'mucha_single_section', array(
	'title'    => esc_html__( 'Single Page/Post', 'mucha' ),
	'panel'    => 'mucha_theme_options',
	'priority' => 20,
) );

mucha_add_field(
    array(
		'type'     => 'toggle',
		'settings' => 'show_post_navigation',
		'label'    => esc_html__( 'Show Post Navigation', 'mucha' ),
		'section'  => 'mucha_single_section',
		'default'  => false,
	)
);

// Single Post Sortable
mucha_add_field(
    array(
		'type'     => 'sortable',
		'settings' => 'single_post_structure',
		'label'    => esc_html__( 'Single Post Structure', 'mucha' ),
		'section'  => 'mucha_single_section',
		'default'  => array(
			'entry-title',
			'entry-content',
			'featured-image',
			'post-meta'
		),
		'choices'	 => array(
			'entry-title'		=> esc_html__( 'Entry Title', 'mucha' ),
	    	'entry-content'		=> esc_html__( 'Entry Content', 'mucha' ),
			'featured-image'	=> esc_html__( 'Featured Image', 'mucha' ),
			'post-meta'			=> esc_html__( 'Post Meta', 'mucha' ),
		),				
	)
);
// Content Align
mucha_add_field(
    array(
		'type'     => 'radio-buttonset',
		'settings' => 'single_post_align',
		'label'    => esc_html__( 'Single Post Align', 'mucha' ),
		'section'  => 'mucha_single_section',
		'default'  => 'left',
		'choices'	 => array(
			'left'		=> '<i class="dashicons dashicons-editor-alignleft"></i>',
	    	'center'	=> '<i class="dashicons dashicons-editor-aligncenter"></i>',
			'right'		=> '<i class="dashicons dashicons-editor-alignright"></i>',
		),
		'output'	 => array(
			array(				
				'element'	 => 'article.post',
				'property'	 => 'text-align',
			),
		),			
	)
);

// Single Page Sortable
mucha_add_field(
    array(
		'type'     => 'sortable',
		'settings' => 'single_page_structure',
		'label'    => esc_html__( 'Single Page Structure', 'mucha' ),
		'section'  => 'mucha_single_section',
		'default'  => array(
			'entry-title',
			'entry-content',
			'featured-image',
		),
		'choices'	 => array(
			'entry-title'				=> esc_html__( 'Entry Title', 'mucha' ),
	    	'entry-content'			=> esc_html__( 'Entry Content', 'mucha' ),
			'featured-image'	=> esc_html__( 'Featured Image', 'mucha' ),
		),			
	)
);
mucha_add_field(
    array(
		'type'     => 'radio-buttonset',
		'settings' => 'single_page_align',
		'label'    => esc_html__( 'Single Page Align', 'mucha' ),
		'section'  => 'mucha_single_section',
		'default'  => 'left',
		'choices'	 => array(
			'left'		=> '<i class="dashicons dashicons-editor-alignleft"></i>',
	    	'center'	=> '<i class="dashicons dashicons-editor-aligncenter"></i>',
			'right'		=> '<i class="dashicons dashicons-editor-alignright"></i>',
		),
		'output'	 => array(
			array(				
				'element'	 => 'article.page',
				'property'	 => 'text-align',
			),
		),			
	)
);

//  Erro page Options
Kirki::add_section( 'mucha_404_page', array(
	'title'    => esc_html__( 'Error Page', 'mucha' ),
	'panel'    => 'mucha_theme_options',
	'priority' => 20,
) );
// Error Background Image
mucha_add_field(
    array(
		'type'     => 'image',
		'settings' => 'error_bg_image',
		'label'    => esc_html__( 'Background Image', 'mucha' ),
		'section'  => 'mucha_404_page',
		'default'  => esc_url( get_template_directory_uri() ). '/assets/img/error-bg.jpg',	
		'output'	 => array(
			array(				
				'element'	 => '.error-404.not-found',
				'property'	 => 'background-image',
			),
		),	
	)
);
// Error Title
mucha_add_field(
    array(
		'type'     => 'text',
		'settings' => 'error_title',
		'label'    => esc_html__( 'Title', 'mucha' ),
		'section'  => 'mucha_404_page',
		'default'  => esc_html__( '404', 'mucha'),	
	)
);
// Error Description
mucha_add_field(
    array(
		'type'     => 'text',
		'settings' => 'error_desc',
		'label'    => esc_html__( 'Description', 'mucha' ),
		'section'  => 'mucha_404_page',
		'default'  => esc_html__( 'Page not found.', 'mucha'),	
	)
);
// Error Button
mucha_add_field(
    array(
		'type'     => 'text',
		'settings' => 'error_button',
		'label'    => esc_html__( 'Button Title', 'mucha' ),
		'section'  => 'mucha_404_page',
		'default'  => esc_html__( 'Back to Home.', 'mucha'),	
	)
);
mucha_add_field(
    array(
		'type'     => 'color',
		'settings' => 'error_bg_color',
		'label'    => esc_html__( 'Background Color', 'mucha' ),
		'section'  => 'mucha_404_page',
		'default'  => '#F8F5FB',
		'choices'  => array(
			'alpha' => true,	
		),	
		'output'	 => array(
			array(				
				'element'	 => '.error-404.not-found',
				'property'	 => 'background-color',
			),
		),
	)
);

// Mobile Menu Color
mucha_add_field(
    array(
		'type'     => 'multicolor',
		'settings' => 'mobile_menu_color',
		'label'    => esc_html__( 'Mobile Menu Color', 'mucha' ),
		'section'  => 'mucha_typography_section',
		'choices'	 => array(
	        'menu_color'       	=> esc_html__( 'Menu Color', 'mucha' ),
	        'menu_hover_color' 	=> esc_html__( 'Menu Hover Color', 'mucha' ),
	        'menu_bg_color'  	=> esc_html__( 'Background Color', 'mucha' ),
	        'menu_hover_bg_color'  	=> esc_html__( 'Hover Background Color', 'mucha' ),
	        'menu_icon_color' 	=> esc_html__( 'Menu Icon Color', 'mucha' ),
		),
		'default'	 => array(
	        'menu_color'    		=> '#ffffff',
	        'menu_hover_color'   	=> '#ffffff',
	        'menu_bg_color'  		=> '#6E3CAF',
	        'menu_icon_color' 		=> '#FF7506',
	        'menu_hover_bg_color' 	=> '#FF7506',
		),		
		'output'	 => array(
			array(
				'choice'	 => 'menu_icon_color',
				'element'	 => '.mean-container .meanmenu-reveal span, .mean-container .meanmenu-reveal span::before, .mean-container .meanmenu-reveal span::after',
				'property'	 => 'background-color',
			),
			array(
				'choice'	 => 'menu_color',
				'element'	 => '.mean-container .mean-nav ul li a',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'menu_hover_color',
				'element'	 => '.mean-container .mean-nav ul li a:hover',
				'property'	 => 'color',
			),
	    	array(
				'choice'	 => 'menu_hover_bg_color',
				'element'	 => '.mean-container .mean-nav ul li a:hover',
				'property'	 => 'background-color',
			),	
	    	array(
				'choice'	 => 'menu_bg_color',
				'element'	 => '.mean-container .mean-nav>ul',
				'property'	 => 'background-color',
			),											
		),				
	)
);