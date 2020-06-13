<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Tabs
 *
 * @since 1.0.0
 */

class bring_back_Tabs extends Widget_Base {

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
        return 'bring-back-Tabs';
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
        return __( 'Tabs', 'bring-back' );
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
        return 'fa fa-tasks';
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
            'Tabs_section',
            [
                'label' => __( 'Setting', 'bring-back' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $month_year = new \Elementor\Repeater();
        $month_year->add_control(
            'tab_title', [
                'label' => __( 'Tab Name', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $month_year->add_control(
            'title', [
                'label' => __( 'Title', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $month_year->add_control(
            'content', [
                'label' => __( 'Content', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => __( 'Tab List', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $month_year->get_controls()
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
        $list = $settings['list'];

        ?>

        <div class="tabs-wrap">
            <ul class="nav nav-tabs text-uppercase d-inline-block" id="monthly-yearly-tab" role="tablist">

                <?php
                foreach ( $list as $item ) {
                    $title = $item['tab_title'];

                    if ( esc_html( $title ) != '' ) { ?>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link" id="<?php echo esc_attr( $title ); ?>-tab" data-toggle="tab" href="#<?php echo esc_attr( $title ); ?>" role="tab" aria-controls="<?php echo esc_attr( $title ); ?>" aria-selected="true"><?php echo esc_html( $title ); ?></a>
                        </li>
                    <?php }
                }
                ?>

            </ul>

            <div class="tab-content" id="monthly-yearly-content">

                <?php
                foreach ( $list as $item ) {
                    ?>
                    <div class="tab-pane fade" id="<?php echo esc_attr( $item['tab_title'] ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $item['tab_title'] ); ?>-tab">

                        <?php if ( esc_html($item['title'] ) != '') { ?>
                            <h2><?php echo esc_html($item['title'] ); ?></h2>
                        <?php } ?>

                        <div class="text-justify">
                            <?php if ( esc_html( $item['content'] ) != '' ) {

                                echo wp_kses(
                                    $item['content'],
                                    array(
                                        'a' => array(
                                            'href' => array(),
                                            'title' => array()
                                        ),
                                        'p' => array(),
                                        'h2' => array(),
                                        'h3' => array(),
                                        'strong' => array(),
                                        'span' => array(),
                                        'br' => array()
                                    )
                                );

                            }
                            ?>
                        </div>
                    </div>

                    <?php
                }
                ?>

            </div>
        </div>
        <?php

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bring_back_Tabs() );