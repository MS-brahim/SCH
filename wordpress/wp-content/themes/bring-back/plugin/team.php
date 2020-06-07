<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Team
 *
 * @since 1.0.0
 */

class bring_back_Team extends Widget_Base {

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
        return 'bring-back-team';
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
        return __( 'Team', 'bring-back' );
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
        return 'eicon-user-circle-o';
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

    protected function _register_controls()
    {

        $this->start_controls_section(
            'team_section',
            [
                'label' => __('Setting', 'bring-back'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // Title
        $repeater->add_control(
            'divTitle',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Select Staff Image', 'bring-back'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        // Image
        $repeater->add_control(
            'title',
            [
                'label' => __('Name', 'bring-back'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jono', 'bring-back'),
                'label_block' => true,
            ]
        );
        // Content
        $repeater->add_control(
            'divContent',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label' => __('Position', 'bring-back'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Designer', 'bring-back')
            ]
        );
        // Social Links
        $repeater->add_control(
            'divSocial',
            [
                'label' => __( 'Social Links', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Social Links 1
        $repeater->add_control(
            'icon1',
            [
                'label' => __( 'Icon', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'icon_link1',
            [
                'label' => __( 'Link', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'bring-back' )
            ]
        );
        $repeater->add_control(
            'divlink1',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Social Links 2
        $repeater->add_control(
            'icon2',
            [
                'label' => __( 'Icon', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'icon_link2',
            [
                'label' => __( 'Link', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'bring-back' )
            ]
        );
        $repeater->add_control(
            'divlink2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Social Links 3
        $repeater->add_control(
            'icon3',
            [
                'label' => __( 'Icon', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'icon_link3',
            [
                'label' => __( 'Link', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'bring-back' )
            ]
        );

        // Repeater
        $this->add_control(
            'list',
            [
                'label' => __('Add New Team', 'bring-back'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'team_style_section',
            [
                'label' => __('Style', 'bring-back'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Text Alignment
        $this->add_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'bring-back'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bring-back'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bring-back'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bring-back'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        // Padding
        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'bring-back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __('Name', 'bring-back'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bring-back'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h4',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bring-back'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#232323',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'content_style',
            [
                'label' => __('Position', 'bring-back'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Typography', 'bring-back'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'bring-back'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#78787c',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Icon Style
        $this->add_control(
            'icon_style',
            [
                'label' => __('Icons', 'bring-back'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'bring-back'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#78787c',
                'selectors' => [
                    '{{WRAPPER}} i' => 'color: {{VALUE}}',
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

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ( $settings['list'] ) {
            ?>
            <div class="our-team">
                <div class="row">
                    <?php
                    foreach ( $settings['list'] as $item ) {
                        ?>

                        <article class="col-12 col-lg-3">
                            <div class="our-team-item text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
                                <?php
                                if ( ! empty( $item['image']['url'] ) ) {
                                    ?>
                                    <figure class="our-team-profile mb-4">

                                        <img class="img-fluid" src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo Control_Media::get_image_alt( $item['sliderImage'] ); ?>">
                                    </figure>
                                    <?php
                                }
                                ?>
                                <?php
                                if ( ! empty( $item['title'] ) ) {
                                    ?>
                                    <h4 class="m-0"><?php echo esc_html( $item['title'] ); ?></h4>
                                    <?php
                                }
                                ?>
                                <?php
                                if ( ! empty( $item['content'] ) ) {
                                    ?>
                                    <p class="mb-0 mt-4"><?php echo esc_html( $item['content'] ); ?></p>
                                    <?php
                                }
                                ?>
                                <ul class="list-inline social-list mt-3 mb-0">
                                    <?php
                                    if ( ! empty( $item['icon_link1']['url'] ) ) {
                                        ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url( $item['icon_link1']['url'] ); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon1'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ( ! empty( $item['icon_link2']['url'] ) ) {
                                        ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url( $item['icon_link2']['url'] ); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon2'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ( ! empty( $item['icon_link3']['url'] ) ) {
                                        ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url( $item['icon_link3']['url'] ); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon3'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </article>

                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bring_back_Team() );