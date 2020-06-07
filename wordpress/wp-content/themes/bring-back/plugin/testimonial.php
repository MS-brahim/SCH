<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Testimonial
 *
 * @since 1.0.0
 */

class bring_back_Testimonial extends Widget_Base {

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
        return 'bring-back-testimonial';
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
        return __( 'Testimonial', 'bring-back' );
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
        return 'fa fa-commenting-o';
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
            'testimonial_section',
            [
                'label' => __( 'Setting', 'bring-back' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'pre_title',
            [
                'label' => __( 'Pre Title', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bring-back' ),
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'comment', [
                'label' => __( 'Comment', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_name', [
                'label' => __( 'Name', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_position', [
                'label' => __( 'Position', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'banner',
            [
                'label' => __( 'Choose Image', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => __( 'Add Testimonial', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls()
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

        $pre_title = $settings['pre_title'];
        $title = $settings['title'];
        $paragraph = $settings['paragraph'];
        $list = $settings['list'];
        ?>

        <!-- .testimonial-heading start -->
        <div class="col-lg-6 col-12 offset-lg-3 text-center testimonial-heading">
            <?php if ( esc_html( $pre_title ) != '' ) : ?>
                <h6 class="sub-heading"><?php echo esc_html( $pre_title ); ?></h6>
            <?php endif;

            if ( esc_html( $title ) != '') : ?>
                <h2>
                    <?php echo esc_html( $title ); ?>
                </h2>
            <?php endif;

            if ( esc_html( $paragraph ) != '' ) : ?>
                <p class="mb-0"><?php echo esc_html( $paragraph ) ; ?></p>
            <?php endif; ?>
        </div>
        <!-- .testimonial-heading end -->
        <?php if ( $list ) { ?>
        <!-- .testimonial-nav-slider start -->
        <div class="testimonial-nav-slider col-lg-12 col-12">
            <?php

            foreach ( $list as $item ) {
                if ( esc_url( $item['banner']['url'] ) != '' ) {
                    ?>
                    <div class="testimonial-nav-item testimonial-nav-item-<?php echo esc_attr($item['_id'] ); ?> rollIn">
                        <img src="<?php echo esc_url( $item['banner']['url'] ); ?>" class="img-fluid">
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <!-- .testimonial-nav-slider end -->
        <!-- #testimonial-slider start -->
        <div class="testimonial-slider col-lg-8 offset-lg-2 col-12 text-center">
            <?php
            foreach ( $list as $item) {
                ?>
                <div class="testimonial-item testimonial-item-<?php echo esc_attr($item['_id'] ); ?>">

                    <?php if ( esc_html( $item['comment'] ) != '' ) { ?>
                        <p><?php echo esc_html( $item['comment'] ); ?></p>
                    <?php }

                    if ( esc_html($item['list_name'] ) != '' ) { ?>
                        <h5><?php echo esc_html($item['list_name'] ); ?></h5>
                    <?php }

                    if ( esc_html($item['list_position'] ) != '') { ?>
                        <span><?php echo esc_html($item['list_position'] ); ?></span>
                    <?php } ?>

                </div>
                <?php
            }
            ?>
        </div>
        <!-- #testimonial-slider end -->
        <?php
    }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bring_back_Testimonial() );