<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Mucha
 */

if ( ! function_exists( 'mucha_transparent_logo' ) ) :
    /**
     * Site Branding
     *
     * @since 1.0.0
     */
    function mucha_transparent_logo( $html ) {
        $show_transparent_logo  = get_theme_mod( 'show_transparent_logo' );
        $transparent_logo = get_theme_mod( 'transparent_logo' );
        $transparent_logo_url = wp_get_attachment_image_url( $transparent_logo, 'full', false);
        if ( false == $show_transparent_logo  || empty( $transparent_logo_url ) ){
            return $html;
        }
        
        $url = network_site_url();
        $transparent_logo = sprintf( '<a href="%1$s" class="transparent-custom-logo-link" rel="home" itemprop="url">%2$s</a>',
                        esc_url( $url  ),
                            wp_get_attachment_image( $transparent_logo, 'full', false, array(
                                'class'    => 'transparent-custom-logo',
                            ) )
                        );
        return $html . $transparent_logo;
    }

endif;
add_filter( 'get_custom_logo', 'mucha_transparent_logo', 9 );

if ( ! function_exists( 'mucha_mobile_logo' ) ) :
    /**
     * Site Branding
     *
     * @since 1.0.0
     */
    function mucha_mobile_logo( $html ) {
        $mobile_logo_id = get_theme_mod( 'mobile_logo' );
        $url = network_site_url();
        $mobile_logo = sprintf( '<a href="%1$s" class="mobile-custom-logo-link" rel="home" itemprop="url">%2$s</a>',
                        esc_url( $url  ),
                            wp_get_attachment_image( $mobile_logo_id, 'full', false, array(
                                'class'    => 'mobile-custom-logo',
                            ) )
                        );
        
        return $html . $mobile_logo;
    }

endif;
add_filter( 'get_custom_logo', 'mucha_mobile_logo' );

if ( ! function_exists( 'mucha_is_woocommerce_active' ) ) :

    /**
     * Check if WooCommerce is active.
     *
     * @since 1.0.0
     *
     * @return bool Active status.
     */
    function mucha_is_woocommerce_active() {
        $output = false;

        if ( class_exists( 'WooCommerce' ) ) {
            $output = true;
        }

        return $output;
    }

endif;

if ( ! function_exists( 'mucha_get_meta' ) ):
    /*
     *  Custom function to get the meta
     *
     */
    function mucha_get_meta( $post_id, $key, $default = null ) {
        $value = get_post_meta( $post_id, $key, true );

        if ( ! $value ) {
            $value = $default;
        }

        return $value;
    }
    
endif; 

/**
 * Entry Title
 */
function mucha_the_title() {
    do_action( 'mucha_action_title' );
}

/**
 * Feature Image
 */
function mucha_the_posthubnail() {
    do_action( 'mucha_action_image' );
}


/**
 *  Comment Section
 */
function mucha_the_comment() {
    do_action( 'mucha_action_comment' );
}

/**
 * Single Post/Page Order
 */
if ( ! function_exists( 'mucha_single_structure' ) ) {

    /**
     * Single Post/Page Order
     *
     * @since  1.0.0
     */
    function mucha_single_structure() {
        if ( is_page() ){
            $single_structure = get_theme_mod( 'single_page_structure', array( 'entry-title', 'entry-content', 'featured-image' ) );
        } else{
            $single_structure = get_theme_mod( 'single_post_structure', array( 'entry-title', 'featured-image', 'entry-content', 'post-meta' ) );
        }
        
        if ( is_array( $single_structure ) ) {
            // Append the custom class for second element for single post.
            foreach ( $single_structure as $structure ) {

                switch ( $structure ) {

                    // Single Post Title.
                    case 'entry-title':
                        mucha_the_title();
                        break;

                    // Single Post Featured Image.
                    case 'featured-image':
                        mucha_the_posthubnail();
                        break;

                    // Single Post Entry Contet.
                    case 'entry-content':
                        echo '<div class="entry-content">';
                            the_content();
                        echo '</div>';

                        break;

                        // Single Post Title and Single Post Meta.
                    case 'post-meta':
                        
                        echo '<div class="entry-meta">';
                            mucha_posted_on();
                            mucha_posted_by();
                        echo '</div>';    


                        break;
                }
            }
        }
    }
}

/**
 * Archive Post/Page Order
 */
if ( ! function_exists( 'mucha_archive_structure' ) ) {

    /**
     * Archive/Page Order
     *
     * @since  1.0.0
     */
    function mucha_archive_structure() {

        $archive_post_structure = get_theme_mod( 'archive_post_structure', array( 'entry-title','entry-content', 'featured-image', 'post-meta' ) );

        $post_content = get_theme_mod( 'post_content', 'excerpt' );

       
        if ( is_array( $archive_post_structure ) ) {
            // Append the custom class for second element for single post.
            foreach ( $archive_post_structure as $structure ) {

                switch ( $structure ) {

                    // Single Post Title.
                    case 'entry-title':
                        echo '<h3 class="entry-title"><a href="'.esc_url( get_the_permalink() ).'">'. esc_html(get_the_title() ).'</a></h3>';
                        break;

                    // Single Post Featured Image.
                    case 'featured-image':
                        mucha_the_posthubnail();
                        break;

                    // Single Post Entry Contet.
                    case 'entry-content':
                        echo '<div class="entry-content">';
                            if ( 'excerpt' == $post_content ){
                                the_excerpt();
                            } else{
                                the_content();
                            }
                            
                        echo '</div>';

                        break;

                        // Single Post Title and Single Post Meta.
                    case 'post-meta':
                        
                        echo '<div class="entry-meta">';
                            mucha_posted_on();
                            mucha_posted_by();
                        echo '</div>';    


                        break;
                }
            }
        }
    }
}
if ( ! function_exists( 'mucha_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function mucha_breadcrumb( $args = array() ) {

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require_once get_template_directory() . '/inc/libraries/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'     => 'div',
            'show_browse'   => false,
            'show_on_front'   => false,
        );
        breadcrumb_trail( $breadcrumb_args );
       
    }

endif;
if ( ! function_exists( 'mucha_excerpt_more' ) ) :

    /**
     * Excerpt more.
     *
     * @since 1.0.0
     *
     */
    function mucha_excerpt_more($more) {
         global $post; 
        $read_more = sprintf(
            esc_html( '%s' ),
            '<a class="read-more-tag" 
         href="'. esc_url( get_permalink($post->ID) ) . '">'.esc_html__( '&nbsp;Read More', 'mucha' ).'</a>'
        );
        
        return $more . $read_more;
        
    }

endif;
add_filter('the_excerpt', 'mucha_excerpt_more', 20);


if ( ! function_exists( 'mucha_is_woocommerce_active' ) ) :

    /**
    * Check if WooCommerce is active.
    *
    * @since 1.0.0
    *
    * @return bool Active status.
    */
    function mucha_is_woocommerce_active() {
        if ( in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins' ), true ) ) {
            return true;
        } else {
            return false;
        }
    }
endif;

if ( ! function_exists( 'mucha_fonts_url' ) ) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Font URL.
     */
    function mucha_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Muli: on or off', 'mucha' ) ) {
            $fonts[] = 'Muli:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;

    }

endif;


if ( ! function_exists( 'mucha_post_navigation' ) ) :

    /**
     * Posts navigation.
     *
     * @since 1.0.0
     */
    function mucha_post_navigation() {

        $pagination_option = get_theme_mod( 'pagination_layout', 'default' );   

        if ( 'default' == $pagination_option) {

            the_posts_navigation(); 

        } else{

            the_posts_pagination( array(
                'mid_size' => 5,
                'prev_text' => esc_html__( 'Prev', 'mucha' ),
                'next_text' => esc_html__( 'Next', 'mucha' ),
            ) );
        }

    }
add_action( 'mucha_action_post_navigation', 'mucha_post_navigation' );   

endif;
if ( ! function_exists( 'mucha_register_required_plugins' ) ) :
    /**
     * Register the required plugins for this theme.
     * 
     * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
     */
    function mucha_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(      
            array(
                'name'      => esc_html__( 'Theme Once Click Demo Importer', 'mucha' ), //The plugin name
                'slug'      => 'theme-one-click-demo-import',  // The plugin slug (typically the folder name)
                'required'  => false,  // If false, the plugin is only 'recommended' instead of required.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),    
                  
        );

        $config = array(
            'id'           => 'mucha',        // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.     
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
            );

        tgmpa( $plugins, $config );
    }

    add_action( 'tgmpa_register', 'mucha_register_required_plugins' );
endif;
