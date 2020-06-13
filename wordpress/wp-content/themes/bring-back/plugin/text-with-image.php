<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Text_With_Image
 *
 * @since 1.0.0
 */

class bring_back_Text_With_Image extends Widget_Base {

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
        return 'bring-back-Text-With-Image';
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
        return __( 'Text With Image', 'bring-back' );
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
        return 'fa fa-file-image-o';
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
            'text_with_image_section',
            [
                'label' => __( 'Setting', 'bring-back' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'We are global business solutions provider.', 'bring-back' )
            ]
        );
        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Having a proper appearance devices tablets more and smartphone can eportant when trying getteing customers keep your visitors attention.', 'bring-back' )
            ]
        );
        $this->add_control(
            'btn_txt',
            [
                'label' => __( 'Button Text', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Started', 'bring-back' )
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => __( 'Button URL', 'bring-back' ),
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
        $this->add_control(
            'banner',
            [
                'label' => __( 'Choose Image', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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

        $target = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <div class="hero-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12 offset-lg-5 hero-banner">
                        <img src="<?php echo esc_url( $settings['banner']['url'] ); ?>" class="img-fluid">
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="hero-content">
                            <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                            <div class="text-image-content">
                                <?php

                                echo wp_kses(
                                    $settings['paragraph'],
                                    array(
                                        'a' => array(
                                            'href' => array(),
                                            'title' => array()
                                        ),
                                        'p' => array(),
                                        'h2' => array(),
                                        'h3' => array(),
                                        'h4' => array(),
                                        'h5' => array(),
                                        'h6' => array(),
                                        'ul' => array(),
                                        'li' => array(),
                                        'strong' => array(),
                                        'span' => array(),
                                        'br' => array()
                                    )
                                );
                                ?>
                            </div>
                            <a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" <?php echo esc_attr( $target ) .' '. esc_attr( $nofollow ); ?> class="btn mt-35"><?php echo esc_html( $settings['btn_txt'] ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new bring_back_Text_With_Image() );