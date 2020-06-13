<?php
/**
 * Register Social Media Widgets.
 *
 * @package Mucha
 */

function mucha_social_action_media() {

  register_widget( 'mucha_social_media' );
  
}
add_action( 'widgets_init', 'mucha_social_action_media' );



/**
 * Social widget class.
 *
 * @since 1.0.0
 */
class mucha_social_media extends WP_Widget {

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    function __construct() {
        $opts = array(
            'classname'   => 'widget_social_share',
            'description' => esc_html__( 'Social Link Widget', 'mucha' ),
        );
        parent::__construct( 'mucha_social_media', esc_html__( 'Mucha: Social Media', 'mucha' ), $opts );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_style' ) );
    }

    public function register_widget_style() {
        wp_register_style( 'mucha-widget-style', get_template_directory_uri() . '/assets/css/social-media.css' );
    }

    /**
     * Echo the widget content.
     *
     * @since 1.0.0
     *
     * @param array $args     Display arguments including before_title, after_title,
     *                        before_widget, and after_widget.
     * @param array $instance The settings for the particular instance of the widget.
     */
    function widget( $args, $instance ) {

        $this->print_style();

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $icon_color             = !empty( $instance['icon_color'] ) ? $instance['icon_color'] : '#fff'; 
        $icon_bg_color          = !empty( $instance['icon_bg_color'] ) ? $instance['icon_bg_color'] : '#4A2973'; 
        $icon_hover_color       = !empty( $instance['icon_hover_color'] ) ? $instance['icon_hover_color'] : '#fff'; 
        $icon_bg_hover_color    = !empty( $instance['icon_bg_hover_color'] ) ? $instance['icon_bg_hover_color'] : '#FF7506'; 


        echo $args['before_widget'];

        echo '<div class="inline-social-icons social-links">';

        if ( ! empty( $title ) ) { ?>
            <h4 class="widget-title"><?php echo esc_html( $title );?></h4>
        <?php }        

        if ( has_nav_menu( 'social-icon' ) ) {
			wp_nav_menu( array(
				'theme_location'  => 'social-icon',
				'container'       => false,							
				'depth'           => 1,
				'fallback_cb'     => false,
			) );
			
        }

        echo '</div>';

        echo $args['after_widget'];

    }

    /**
     * Update widget instance.
     *
     * @since 1.0.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            {@see WP_Widget::form()}.
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['icon_color']             = sanitize_hex_color($new_instance['icon_color']);
        $instance['icon_bg_color']          = sanitize_hex_color($new_instance['icon_bg_color']);
        $instance['icon_hover_color']       = sanitize_hex_color($new_instance['icon_hover_color']);
        $instance['icon_bg_hover_color']    = sanitize_hex_color($new_instance['icon_bg_hover_color']);

        return $instance;
    }

    /**
     * Output the settings update form.
     *
     * @since 1.0.0
     *
     * @param array $instance Current settings.
     * @return void
     */
    function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array(
            'title'                 => '',
            'icon_color'            => '#fff',
            'icon_bg_color'         => '#4A2973',
            'icon_hover_color'      => '#fff',
            'icon_bg_hover_color'   => '#FF7506',
        ) );
        ?>
        <?php if ( ! has_nav_menu( 'social-icon' ) ) { ?>
        <p>
            <?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Media.', 'mucha' ); ?>
        </p>

        <?php } else{ ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'mucha' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('icon_color') ); ?>">
                    <?php esc_html_e('Icon Color :', 'mucha'); ?></br>
                </label>
                <input class="color-picker" id="<?php echo esc_attr( $this->get_field_id('icon_color') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_color') ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_color'] ); ?>" />      
            </p> 
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('icon_bg_color') ); ?>">
                    <?php esc_html_e('Icon Background Color :', 'mucha'); ?></br>
                </label>
                <input class="color-picker" id="<?php echo esc_attr( $this->get_field_id('icon_bg_color') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_bg_color') ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_bg_color'] ); ?>" />      
            </p> 
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('icon_hover_color') ); ?>">
                    <?php esc_html_e('Icon Hover Color :', 'mucha'); ?></br>
                </label>
                <input class="color-picker" id="<?php echo esc_attr( $this->get_field_id('icon_hover_color') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_hover_color') ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_hover_color'] ); ?>" />      
            </p> 
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('icon_bg_hover_color') ); ?>">
                    <?php esc_html_e('Icon Background Hover Color :', 'mucha'); ?></br>
                </label>
                <input class="color-picker" id="<?php echo esc_attr( $this->get_field_id('icon_bg_hover_color') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_bg_hover_color') ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_bg_hover_color'] ); ?>" />      
            </p>                                     
        <?php } 
    }

    function print_style() {
            $dynamic_css = '';      
            $instances = get_option( 'widget_' . $this->id_base );
            $id_base = '#' . $this->id;
            if ( array_key_exists( $this->number, $instances ) ) {
                $instance = $instances[ $this->number ];  
                $icon_color             = !empty( $instance['icon_color'] ) ? esc_html($instance['icon_color'] ) : '#fff'; 
                $icon_bg_color          = !empty( $instance['icon_bg_color'] ) ? esc_html($instance['icon_bg_color'] ) : '#4A2973'; 
                $icon_hover_color       = !empty( $instance['icon_hover_color'] ) ? esc_html($instance['icon_hover_color'] ) : '#fff'; 
                $icon_bg_hover_color    = !empty( $instance['icon_bg_hover_color'] ) ? esc_html($instance['icon_bg_hover_color'] ): '#FF7506';        


                $dynamic_css .= "
                    ". esc_attr( $id_base ) ." .inline-social-icons li a{
                            background-color: ". esc_attr( $icon_bg_color ) .";
                            border-color: ". esc_attr( $icon_bg_color ) .";
                    }";         
                 
                $dynamic_css .= "
                    ". esc_attr( $id_base ) ." .inline-social-icons li a:hover{
                            background-color: ". esc_attr( $icon_bg_hover_color ) .";
                            border-color: ". esc_attr( $icon_bg_hover_color ) .";
                    }";
                $dynamic_css .= "
                    ". esc_attr( $id_base ) ." .inline-social-icons.social-links ul li a::before{
                            color: ". esc_attr( $icon_color ) .";
                    }";                          

                $dynamic_css .= "
                    ". esc_attr( $id_base ) ." .inline-social-icons.social-links ul li a:hover::before{
                            color: ". esc_attr( $icon_hover_color ) .";
                    }";           
                 
            }
            wp_enqueue_style( 'mucha-widget-style');
            wp_add_inline_style( 'mucha-widget-style', $dynamic_css );

    } 


    function admin_scripts( $hook ) {
        if ( 'widgets.php' != $hook ) {
            return;
        }
        wp_enqueue_style( 'wp-color-picker' );        
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'mucha-color-picker', get_template_directory_uri() . '/assets/js/color-picker.js', array( ), '20151215', true );
    }    
}

