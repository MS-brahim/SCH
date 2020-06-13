<?php

namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Service
 *
 * @since 1.0
 */

class bring_back_Services_Post_Type extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'bring-back-Post-Type-Services';
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
        return __( 'Services Post Type', 'bring-back' );
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
        return 'fa fa-file-text-o';
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
            'post_type_section',
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
                'placeholder' => __( 'Title', 'bring-back' ),
            ]
        );

        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Content', 'bring-back' ),
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => __( 'Post Limit', 'bring-back' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => absint(1),
                'max' => absint(9),
                'step' => absint(1),
                'default' => absint(3)
            ]
        );

        $this->add_control(
            'hr2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
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


        $post_limit = $settings['limit'];
        $title = $settings['title'];
        $paragraph = $settings['paragraph'];
        $target = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';

        $query = new \WP_Query(
            array(
                'post_type'           => esc_attr( 'bb-services' ),
                'posts_per_page'      => absint( $post_limit ),
                'no_found_rows'       => true,
                'post_status'         => 'publish'
            )
        );

        ?>
        <!-- .bb-services-container start -->
        <section class="bb-services-container">
            <?php if( esc_html( $title ) != '' or esc_html( $paragraph ) != '' ) : ?>
                <!-- .services-heading start -->
                <div class="col-lg-12 col-12 services-heading">
                    <?php if( esc_html( $title ) != '' ) : ?>
                        <h2>
                            <?php
                            echo esc_html( $title );
                            ?>
                        </h2>
                    <?php endif; ?>
                    <?php if( esc_html( $paragraph ) != '' ) : ?>
                        <p class="mb-0"><?php echo esc_html( $paragraph ); ?></p>
                    <?php endif; ?>
                </div>
                <!-- .services-heading end -->
            <?php endif; ?>
            <!-- .services start -->
            <div class="bb-post-services">
                <div class="row">
                    <?php
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>

                            <!-- .services-box-item start -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="services-box wow slideInUp" data-wow-delay=".1s">

                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="box-icon">
                                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                                <?php the_post_thumbnail( 'bring-back-lg-thumb' ); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <h3>
                                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                                    </h3>

                                    <p class="mb-0"><?php echo esc_html( wp_trim_words( get_the_content(), 35, '...' ) ); ?></p>
                                </div>
                            </div>
                            <!-- .services-box-item end -->

                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>

                <?php if ( esc_html( $settings['btn_txt'] ) != '' ) : ?>
                    <div class="text-center all-services text-capitalize wow slideInUp" data-wow-delay=".1s">
                        <a  class="btn" href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" <?php echo esc_attr( $target ) .' '. esc_attr( $nofollow ); ?> class="btn mt-35"><?php echo esc_html( $settings['btn_txt'] ); ?></a>
                    </div>
                <?php endif; ?>

            </div>
            <!-- .services end -->
        </section>
        <!-- .bb-services-container end -->
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new bring_back_Services_Post_Type() );