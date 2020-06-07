<?php

/**
 * Blog
 */

bring_back_Kirki::add_panel('blog_panel', array(
    'priority' => 90,
    'title' => esc_html__('Blog', 'bring-back'),
    'description' => esc_html__('Blog', 'bring-back'),
));

// Blog Layout

bring_back_Kirki::add_section('blog_section', array(
    'title' => esc_html__('Blog Layout', 'bring-back'),
    'panel' => 'blog_panel',
    'priority' => 10,
));

// Blog Columns

bring_back_Kirki::add_field('bring_back', array(
    'type' => 'select',
    'settings' => 'blog_layout',
    'label' => __('Select a layout', 'bring-back'),
    'section' => 'blog_section',
    'default' => 'blog-layout-2',
    'priority' => 10,
    'choices' => array(
        'blog-layout-1' => esc_html__('Layout 1', 'bring-back'),
        'blog-layout-2' => esc_html__('Layout 2', 'bring-back')
    ),
));

// Hide Sidebar

bring_back_Kirki::add_field('bring_back', array(
    'type' => 'toggle',
    'settings' => 'hide_sidebar',
    'label' => esc_html__('Hide Sidebar?', 'bring-back'),
    'section' => 'blog_section',
    'default' => true,
    'priority' => 15,
));

// Meta Post

bring_back_Kirki::add_section('blog_meta_post_section', array(
    'title' => esc_html__('Meta Post', 'bring-back'),
    'panel' => 'blog_panel',
    'priority' => 15,
));

// Hide Blog Posts Meta

bring_back_Kirki::add_field('bring_back', array(
    'type' => 'toggle',
    'settings' => 'blog_post_meta',
    'label' => esc_html__('Hide Blog Posts Meta', 'bring-back'),
    'section' => 'blog_meta_post_section',
    'default' => true,
    'priority' => 10,
));

// Hide Single Posts Meta

bring_back_Kirki::add_field('bring_back', array(
    'type' => 'toggle',
    'settings' => 'single_post_meta',
    'label' => esc_html__('Hide Single Posts Meta', 'bring-back'),
    'section' => 'blog_meta_post_section',
    'default' => '1',
    'priority' => 10,
));

// Featured Image

bring_back_Kirki::add_section('blog_featured_image_section', array(
    'title' => esc_html__('Featured Image', 'bring-back'),
    'panel' => 'blog_panel',
    'priority' => 20,
));

// Hide Blog Posts Meta

bring_back_Kirki::add_field('bring_back', array(
    'type' => 'toggle',
    'settings' => 'blog_featured_image',
    'label' => esc_html__('Hide Blog Featured Image', 'bring-back'),
    'section' => 'blog_featured_image_section',
    'default' => true,
    'priority' => 10,
));

// Hide Single Posts Meta

bring_back_Kirki::add_field('bring_back', array(
    'type' => 'toggle',
    'settings' => 'single_featured_image',
    'label' => esc_html__('Hide Single Featured Image', 'bring-back'),
    'section' => 'blog_featured_image_section',
    'default' => '1',
    'priority' => 10,
));