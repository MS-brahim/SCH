<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Text_Block
 *
 * @since 1.0.0
 */

class bring_back_Info_Box extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'bring-back-Info-Box';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    public function get_title() {
        return __( 'Info Box', 'bring-back' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */

    public function get_icon() {
        return 'eicon-icon-box';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */

    public function get_categories() {
        return [ 'bring_back' ];
    }


    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function _register_controls() {

        $this->start_controls_section(
            'info_box_section',
            [
                'label' => __( 'Setting', 'bring-back' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => __( 'Choose small Image', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bring-back' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => __( 'Link', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'bring-back' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->end_controls_section();


        // STYLE Settings
        $this->start_controls_section(
            'info_box_style_section',
            [
                'label' => __( 'Style', 'bring-back' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Button Style
        $this->add_control(
            'icon_style',
            [
                'label' => __( 'Icon', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'BG Color', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'fff4ed',
                'selectors' => [
                    '{{WRAPPER}} .box-icon' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .services-box:hover' => 'border-color: {{VALUE}}'
                ],
            ]
        );

        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __( 'Title', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'bring-back' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h3',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '232323',
                'selectors' => [
                    '{{WRAPPER}} h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'content_style',
            [
                'label' => __( 'Content', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Typography', 'bring-back' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __( 'Text Color', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '78787c',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function render() {
        $settings = $this->get_settings_for_display();

        $title = $settings['title'];
        $paragraph = $settings['paragraph'];
        $target = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
        ?>

        <div class="services-box position-relative">
            <?php if( !empty( $settings['btn_url']['url'] )  ): ?>
                <a class="service-link" href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" <?php echo esc_attr( $target ) .' '. esc_attr( $nofollow ); ?> ></a>
            <?php endif;

            if( !empty( $settings['icon']['url'] ) ): ?>
                <div class="box-icon text-center d-flex align-items-center justify-content-center">
                    <img src="<?php echo esc_url( $settings['icon']['url'] ); ?>">
                </div>
            <?php endif;

            if( !empty( $title ) ) : ?>
                <h3><?php echo esc_html( $title ); ?></h3>
            <?php
            endif;

            if( !empty( $paragraph ) ) : ?>
                <p class="mb-0"><?php echo esc_html( $paragraph ); ?></p>
            <?php endif; ?>

        </div>

        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new bring_back_Info_Box() );