<?php
/**
 * Bring Back
 * Social Widget
 *
 */

class bring_back_Social extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'bring-back-social-widget',
            'customize_selective_refresh' => true,
        );

        parent::__construct( 'bring-back-social-widget', __( 'Bring Back Social', 'bring-back' ), $widget_ops );
        $this->alt_option_name = 'bring_back_Social';
    }

    public function widget( $args, $instance )
    {
        if ( !isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        echo $args['before_widget'];

        ?>
        <ul class="list-unstyled social-links">

            <?php do_action( 'bring_back_social' ); ?>

        </ul>
        <?php

        echo $args['after_widget'];
    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    public function form( $instance ) { ?>
        <div class="bring-back-wrap">
            <h2><?php esc_html_e( 'Social links options in Appearance -> Customize -> Social Media', 'bring-back' ); ?></h2>
        </div>
        <?php
    }
}