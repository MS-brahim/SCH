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

class bring_back_Text_Block extends Widget_Base {

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
        return 'bring-back-Text-Block';
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
        return __( 'Text Block', 'bring-back' );
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
        return 'fa fa-text-width';
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
            'text_block_section',
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
                'type' => \Elementor\Controls_Manager::WYSIWYG
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'list_title', [
                'label' => __( 'Title', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => __( 'Add Text', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls()
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

        $pre_title = $settings['pre_title'];
        $title = $settings['title'];
        $paragraph = $settings['paragraph'];
        $list = $settings['list'];
        $url_txt = $settings['btn_txt'];
        $target = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <div class="help-content help">
            <?php if( esc_html( $pre_title ) != '' ) : ?>
                <h6 class="sub-heading"><?php echo esc_html( $pre_title ); ?></h6>
            <?php endif;

            if( esc_html( $title ) != '' ) : ?>
                <h2>
                    <?php echo esc_html( $title ); ?>
                </h2>
            <?php endif;

            if( esc_html( $paragraph ) != '' ) : ?>
                <div class="text-block-content">
                    <?php

                    echo wp_kses(
                        $paragraph,
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
            <?php endif;

            if ( $list ) { ?>
                <ul class="list-unstyled">
                    <?php
                    foreach (  $list as $item ) {
                        if( esc_html( $item['list_title'] ) != '' ) {
                            ?>
                            <li class="elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>"><?php echo esc_html( $item['list_title'] ); ?></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <?php
            }
            ?>
            <?php if ( esc_html( $url_txt ) != '' ) { ?>
                <a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" <?php echo esc_attr( $target ) .' '. esc_attr( $nofollow ); ?> class="btn"><?php echo esc_html( $url_txt ); ?></a>
            <?php } ?>
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <#
        var target = settings.btn_url.is_external ? ' target="_blank"' : '';
        var nofollow = settings.btn_url.nofollow ? ' rel="nofollow"' : '';
        #>

        <h2>{{{ settings.title }}}</h2>
        <p>{{{ settings.paragraph }}}</p>
        <# if ( settings.list.length ) { #>
        <ul class="list-unstyled">
            <# _.each( settings.list, function( item ) { #>
            <li class="elementor-repeater-item-{{ item._id }}">{{{ item.list_title }}}</li>
            <# }); #>
        </ul>
        <# } #>
        <a href="{{ settings.btn_url.url }}"{{ target }}{{ nofollow }}>{{{ settings.btn_txt }}}</a>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bring_back_Text_Block() );