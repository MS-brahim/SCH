<?php
/**
 * Custom hook and function
 *
 * @package Mucha
 */

if ( ! function_exists( 'mucha_top_header' ) ):
    /**
     * Header section
     * 
     * @since 1.0.0
     */
    function mucha_top_header() {  
        $show_top_header = get_theme_mod( 'show_top_header', false );
        if ( false == $show_top_header ){
            return;
        }
        ?>         
        <div class="top-header">
            <div class="container">
                <div class="top-header-wrap">
                    <div class="top-header-left">
                        <?php 
                        /**
                         * Hook - mucha_action_top_header_left.
                         *
                         * @hooked mucha_top_header_left -  10
                         */
                        do_action( 'mucha_action_top_header_left' ); 
                        ?>
                    </div>
                    <div class="top-header-right">
                        <?php
                        /**
                         * Hook - mucha_action_top_header_right.
                         *
                         * @hooked mucha_top_header_right -  10
                         */
                        do_action( 'mucha_action_top_header_right' );  ?>
                    </div>  
                </div>
            </div>
        </div>
    <?php }
endif;
add_action( 'mucha_action_header', 'mucha_top_header', 10 );


if ( ! function_exists( 'mucha_header' ) ):
	/**
	 * Header section
	 * 
	 * @since 1.0.0
	 */
	function mucha_header() {      
        $header_layout = get_theme_mod( 'header_layout', 'header-layout-1' );
        $header_image = get_header_image(); ?>
        <div class="hgroup-wrap" style="background-image:url( <?php echo esc_url( $header_image );?>);" >    
            <div class="container">
                <span class="header-menu-icon"><span></span></span>
        		<?php 
                /**
        		 * Hook - mucha_action_site_branding.
        		 *
        		 * @hooked mucha_site_branding -  10
        		 */
        		do_action( 'mucha_action_site_branding' );
        		?>
                    <?php 
                    
                        echo '<div class="hgroup-right">';
                     ?>   
                    <?php 
                    /**
                     * Hook - mucha_action_navigation.
                     *
                     * @hooked mucha_navigation -  10
                     */
                    do_action( 'mucha_action_navigation' ); ?>

                    <?php $show_cart = get_theme_mod( 'show_woo_cart', true );
                    $beside_navigation = get_theme_mod( 'beside_navigation', 'search' );
                    if ( true == $show_cart || 'none' !== $beside_navigation ){ ?>
                   
                        <div id="left-search" class="search-container">
                            <?php 
                            /**
                             * Hook - mucha_action_woocommerce_cart.
                             *
                             * @hooked mucha_woocommerce_cart -  10
                             */
                            do_action( 'mucha_action_woocommerce_cart' ); ?>                         
                            <?php
                			/**
                			 * Hook - mucha_action_beside_navigation.
                			 *
                			 * @hooked mucha_beside_navigation -  10
                			 */
                			do_action( 'mucha_action_beside_navigation' );			
                			?>
                        </div>
                    <?php } ?>
                <?php 
                    echo '</div>';
                ?>
            </div>
        </div> 
	<?php }
endif;
add_action( 'mucha_action_header', 'mucha_header', 20 );

if ( ! function_exists( 'mucha_header_breadcrumb' ) ):
    /**
     * Header Breadcrumb
     * 
     * @since 1.0.0
     */
    function mucha_header_breadcrumb() {      
        $show_breadcrumb = get_theme_mod( 'show_breadcrumb', true );        
        if ( false == $show_breadcrumb || is_front_page() ){
            return;
        }
        ?>
        <div class="page-title-wrap breadcrumb-wrapper">
            <div class="container">
                <?php mucha_breadcrumb(); ?>
            </div>
        </div>
    <?php }
endif;
add_action( 'mucha_action_breadcrumb', 'mucha_header_breadcrumb', 10 );



if ( !function_exists( 'mucha_footer_widget') ):
    /**
     * Footer Widget 
     *
     * @since 1.0.0
    */
    function mucha_footer_widget(){
        $show_footer_widget = get_theme_mod( 'show_footer_widget', false );
        $widget_text_align  = get_theme_mod( 'footer_widget_styles_align', 'left' );
        if ( false == $show_footer_widget ){
            return;
        }
    ?>  
            <div class="widget-area" >
                <!-- widget area starting from here -->
                <div class="container">
                    <div class="row">
						<?php $footer_widget_styles = get_theme_mod( 'footer_widget_styles', '4' ); 
						for ( $i = 1; $i <= $footer_widget_styles ; $i++ ) {
							if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
								<div class="mucha-footer-widget-<?php echo esc_attr( $footer_widget_styles );?> footer-<?php echo esc_attr( $widget_text_align );?>">
									<?php dynamic_sidebar( 'footer-' . $i ); ?>
								</div>
							<?php }
						} ?>
                    </div>
                </div>
            </div>
    <?php }
endif;
add_action( 'mucha_action_footer', 'mucha_footer_widget', 10);

if ( !function_exists( 'mucha_footer') ):
    /**
     * Footer Section
     *
     * @since 1.0.0
    */
    function mucha_footer(){
    ?>  
        <div class="site-generator">
            <div class="container">
            	<?php $footer_credit = get_theme_mod( 'footer_credit', sprintf( __( 'Theme of %s', 'mucha' ), '<a target="_blank" rel="designer" href="http://theme404.com/">Theme 404.</a>' ) );
            	?>
                <span class="copy-right">
                	<?php echo wp_kses_post( $footer_credit ); ?>
                </span>
                <div class="besider-site-generator">
                    <?php
                    /**
                     * Hook - mucha_action_besider_footer_credit.
                     *
                     * @hooked mucha_besider_footer_credit -  10
                     */
                    do_action( 'mucha_action_besider_footer_credit' );         
                    ?>
                </div>                  
            </div>
        </div> 
 
    <?php }
endif;
add_action( 'mucha_action_footer', 'mucha_footer', 20);

if ( ! function_exists( 'mucha_scroll_footer' ) ) :
    /**
     * Footer Scroll to Top
     *
     * @since 1.0.0
     */
    function mucha_scroll_footer() {
        if ( false == get_theme_mod( 'show_scroll_to_top', true ) ){
            return;
        }
    ?>
        <!-- footer ends here -->
        <div class="back-to-top">
            <a href="#masthead" title="<?php echo esc_attr__('Go to Top', 'mucha');?>" class="fa-angle-up"></a>
        </div>

    <?php 
    }
endif;
add_action( 'mucha_action_scroll_footer', 'mucha_scroll_footer', 10 );
