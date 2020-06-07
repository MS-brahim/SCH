<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Mucha
 */

if ( ! function_exists( 'mucha_site_branding' ) ) :
    /**
     * Site Branding
     *
     * @since 1.0.0
     */
    function mucha_site_branding() {
    ?>
		<section class="site-branding">
	    	<?php $site_identity  = get_theme_mod( 'site_branding', 'title-text' ); ?>			    	
                <?php if ( has_custom_logo() ): ?>
    	    		<div class="site-logo">
    	    			<?php the_custom_logo(); ?> 
    	    		</div>
                <?php endif; ?>
				<?php $title = get_bloginfo( 'name', 'display' );
				if ( $title || is_customize_preview() ) : 
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;
				endif;
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
				<?php endif; 
			?>
		</section><!-- .site-branding -->
    <?php }
endif;
add_action( 'mucha_action_site_branding', 'mucha_site_branding', 10 );

if ( ! function_exists( 'mucha_navigation' ) ) :
    /**
     * Main Navigation
     *
     * @since 1.0.0
     */
    function mucha_navigation() {
    	if ( '1' == get_theme_mod( 'show_nav', '1' ) ): ?>
            <div id="navbar" class="navbar">
                <!-- navbar starting from here -->
                <nav id="site-navigation" class="navigation main-navigation" role="navigation" >
                    <div class="menu-content-wrapper">                        
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
                            'container_class' => 'menu-top-menu-container',
							'fallback_cb' 	=> 'mucha_primary_navigation_fallback',
						) );
						?>
                        
                    </div>
                </nav><!-- #site-navigation -->
            </div> <!-- navbar ends here -->
        <?php endif; ?>
    <?php }
endif;
add_action( 'mucha_action_navigation', 'mucha_navigation', 10 );

if ( ! function_exists( 'mucha_woocommerce_cart' ) ) :
    /**
     * Woocommerce Cart
     *
     * @since 1.0.0
     */
    function mucha_woocommerce_cart() { 
        if ( mucha_is_woocommerce_active() ): 
        $show_cart = get_theme_mod( 'show_woo_cart', true );
        if ( false == $show_cart ){
            return;
        }?>
            <div class="site-cart-views">
                <div class="site-cart-info">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="cart-quantity"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                </div>
                <div class="widget widget_shopping_cart">
                    <div class="mini_cart_inner">
                        <?php the_widget( 'WC_Widget_Cart', '' ); ?>
                    </div>
                </div>
            </div>
        <?php endif;  
    }
endif;
add_action( 'mucha_action_woocommerce_cart', 'mucha_woocommerce_cart', 10 );

if ( ! function_exists( 'mucha_beside_navigation' ) ) :
    /**
     * Beside Navigation
     *
     * @since 1.0.0
     */
    function mucha_beside_navigation() { ?>
    	<?php $beside_navigation = get_theme_mod( 'beside_navigation', 'search' );

		switch ( $beside_navigation ) {

			case 'search':			
				echo mucha_beside_search();
				break;

			case 'button':
				echo mucha_beside_button();
				break;				

			case 'text/html':
				$header_textarea 	= get_theme_mod( 'header_textarea', '' );
				echo wp_kses_post( $header_textarea );
				break;

            case 'icon':
                    $beside_header_icon = get_theme_mod( 'beside_header_icon', '' );
                    echo '<div class="inline-social-icons social-links"><ul>';
                        foreach( $beside_header_icon as $icon ) :
                            $target = $icon['link_target'];
                            if ( true == $target ){
                                $target_arg = '_blank';
                            } else{
                                 $target_arg = '_self';
                            }?>
                            <li><a href="<?php echo esc_url($icon['link_url'] ); ?>" target="<?php echo esc_attr( $$target_arg ); ?>">
                                <?php echo esc_html( $icon['link_text'] ); ?>
                            </a></li>
                        <?php endforeach; ?>
                    <?php echo '</ul></div>';  
                break;              

			case 'widget':
				if ( is_active_sidebar( 'header-widget' ) ) {
					dynamic_sidebar( 'header-widget' );
				}

				break;

			default:
				return;
		} ?>  

    <?php }
endif;
add_action( 'mucha_action_beside_navigation', 'mucha_beside_navigation', 10 );

if ( ! function_exists( 'mucha_beside_search' ) ) {

	/**
	 * Beside Header Search
	 */
	function mucha_beside_search() {

		ob_start();
		echo '<a href="javascript:void(0)" class="search-toggle"></a><div class="search-section">';
			get_search_form();
		echo '<span class="search-arrow"></span></div>';	
		return ob_get_clean();			

	}
}

if ( ! function_exists( 'mucha_beside_button' ) ) {

	/**
	 * Beside Header button
	 */
	function mucha_beside_button() {
    	$header_button_text = get_theme_mod( 'header_button_text', '' );
    	$header_button_link = get_theme_mod( 'header_button_link', '' );
    	$header_open_newtab = get_theme_mod( 'header_open_newtab', '' );
    	$header_open_newtab = $header_open_newtab ? ' target="_blank"' : '';
		ob_start();
		echo '<a class="header-btn" href="' .esc_url( $header_button_link ). '" ' . esc_attr( $header_open_newtab ) . ' >' .esc_html( $header_button_text ).'</a>';
		return ob_get_clean();			

	}
}

if ( ! function_exists( 'mucha_top_header_search' ) ) {

	/**
	 * Beside Header Search
	 */
	function mucha_top_header_search() {

		ob_start();
		echo '<div class="top-header-search-section">';
			get_search_form();
		echo '<span class="search-arrow"></span></div>';	
		return ob_get_clean();			

	}
}

if ( ! function_exists( 'mucha_top_header_left' ) ) :
    /**
     * Top Header Left
     *
     * @since 1.0.0
     */
    function mucha_top_header_left() { ?>    	
            <?php $top_left_header = get_theme_mod( 'top_left_header', 'none' );

            switch ( $top_left_header ) {

                case 'search':          
                    echo mucha_top_header_search();
                    break;

                case 'menu':
                    $menu = get_theme_mod( 'top_left_header_menu', 'none' );

                    if ( 'none' === $menu ) {
                        return;
                    }

                    wp_nav_menu(
                        array(
                            'menu'      => esc_attr( $menu ),
                            'container_class'   => 'header-info',
                            'container' => 'div',
                            'depth'     => -1,
                        )
                    );
                    break;              

                case 'text/html':
                    $top_header_left_textarea    = get_theme_mod( 'top_header_left_textarea', '' );
                    echo '<div class="header-info">';
                        echo wp_kses_post( $top_header_left_textarea );
                    echo '</div>';
                    break;

                case 'icon':
                    $top_left_header_icon = get_theme_mod( 'top_left_header_icon', '' );
                    echo '<div class="inline-social-icons social-links"><ul>';
					    foreach( $top_left_header_icon as $icon ) : ?>
					        <li><a href="<?php echo esc_url($icon['link_url'] ); ?>">
					            <?php echo esc_html( $icon['link_text'] ); ?>
					        </a></li>
					    <?php endforeach; ?>
				    <?php echo '</ul></div>';

                    break;

                default:
                    return;
            } ?>
    <?php }
endif;
add_action( 'mucha_action_top_header_left', 'mucha_top_header_left', 10 );

if ( ! function_exists( 'mucha_top_header_right' ) ) :
    /**
     * Top Header Right
     *
     * @since 1.0.0
     */
    function mucha_top_header_right() { ?>
    	
            <?php $top_right_header = get_theme_mod( 'top_right_header', 'none' );

            switch ( $top_right_header ) {

                case 'search':          
                    echo mucha_top_header_search();
                    break;

                case 'menu':
                    $menu = get_theme_mod( 'top_right_header_menu', 'none' );

                    if ( 'none' === $menu ) {
                        return;
                    }

                    wp_nav_menu(
                        array(
                            'menu'      => esc_attr( $menu ),
                            'container_class'   => 'header-info',
                            'container' => 'div',
                            'depth'     => -1,
                        )
                    );
                    break;              

                case 'text/html':
                    $top_header_right_textarea    = get_theme_mod( 'top_header_right_textarea', '' );
                    echo '<div class="header-info">';
                        echo wp_kses_post( $top_header_right_textarea );
                    echo '</div>';
                    break;

                case 'icon':
                    $top_right_header_icon = get_theme_mod( 'top_right_header_icon', '' );
                    echo '<div class="header-info"><div class="inline-social-icons social-links"><ul>';                    
					    foreach( $top_right_header_icon as $icon ) : ?>
					        <li><a href="<?php echo esc_url($icon['link_url'] ); ?>">
					            <?php echo esc_html( $icon['link_text'] ); ?>
					        </a></li>
					    <?php endforeach; ?>
				    <?php echo '</ul></div></div>';

                    break;

                default:
                    return;
            } ?>
    <?php }
endif;
add_action( 'mucha_action_top_header_right', 'mucha_top_header_right', 10 );

if ( ! function_exists( 'mucha_besider_footer_credit' ) ) :
    /**
     * Top Header Left
     *
     * @since 1.0.0
     */
    function mucha_besider_footer_credit() { ?>      
            <?php $besider_footer_credit = get_theme_mod( 'besider_footer_credit', 'none' );

            switch ( $besider_footer_credit ) {

                case 'search':          
                    echo mucha_top_header_search();
                    break;

                case 'menu':
                    $menu = get_theme_mod( 'footer_menu', 'none' );

                    if ( 'none' === $menu ) {
                        return;
                    }

                    wp_nav_menu(
                        array(
                            'menu'      =>esc_attr( $menu ),
                            'container_class'   => 'footer-menu',
                            'container' => 'div',
                            'depth'     => -1,
                        )
                    );
                    break;              

                case 'text/html':
                    $footer_textarea    = get_theme_mod( 'footer_textarea', '' );
                    echo '<div class="footer-info">';
                        echo wp_kses_post( $footer_textarea );
                    echo '</div>';
                    break;

                case 'icon':
                    $footer_icon = get_theme_mod( 'footer_icon', '' );
                    echo '<div class="inline-social-icons social-links"><ul>';
                        foreach( $footer_icon as $icon ) : ?>
                            <li><a href="<?php echo esc_url($icon['link_url'] ); ?>">
                                <?php echo esc_html( $icon['link_text'] ); ?>
                            </a></li>
                        <?php endforeach; ?>
                    <?php echo '</ul></div>';

                    break;

                default:
                    return;
            } ?>
    <?php }
endif;
add_action( 'mucha_action_besider_footer_credit', 'mucha_besider_footer_credit', 10 );

if ( ! function_exists( 'mucha_sidebar_layout' ) ) :

    /**
     * Add sidebar.
     *
     * @since 1.0.0
     */
    function mucha_sidebar_layout() {

        // Sidebar Layout
        global $post;
        $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right_sidebar' ); 
        $sidebar_layout = apply_filters( 'mucha_sidebar_global_layout', $sidebar_layout );  
               
        // Check if single.
        if ( $post  && is_single() || is_page() ) {
            $sidebar_post_options = get_post_meta( $post->ID, 'sidebar_options', true );
            if ( isset( $sidebar_post_options ) && ! empty( $sidebar_post_options ) ) {
                if ( 'customizer_setting' == $sidebar_post_options ){
                    $sidebar_layout = get_theme_mod( 'sidebar_layout', 'right_sidebar' );
                } else{
                    $sidebar_layout = $sidebar_post_options;
                }
                
            }
        }

        // Include primary sidebar.
        if ( 'no_sidebar' !== $sidebar_layout ) {
            get_sidebar();
        }

    }

endif;

add_action( 'mucha_action_sidebar_layout', 'mucha_sidebar_layout' );

if ( ! function_exists( 'mucha_title' ) ) :

    /**
     * Add Title.
     *
     * @since 1.0.0
     */
    function mucha_title() {
        global $post;
        $title_options = mucha_get_meta( $post->ID, 'mucha_enable_title', 'yes' );
        if ( isset( $title_options ) && ! empty( $title_options ) ) {
            if( 'yes' == $title_options ){
               the_title( '<h3 class="entry-title">', '</h3>' );
            }
        }

    }

endif;
add_action( 'mucha_action_title', 'mucha_title' );

if ( ! function_exists( 'mucha_post_thumbnail' ) ) :

    /**
     * Add Feature Image.
     *
     * @since 1.0.0
     */
    function mucha_post_thumbnail() {
        global $post;
        $image_options = mucha_get_meta( $post->ID, 'mucha_enable_feature_image', 'yes' );
        if ( isset( $image_options ) && ! empty( $image_options )  ) {
            if( 'yes' == $image_options && has_post_thumbnail() ){
                echo '<figure class="featured-image">';    
                    the_post_thumbnail();  
                echo '</figure>';      
            }
        }

    }

endif;
add_action( 'mucha_action_image', 'mucha_post_thumbnail' );
if ( ! function_exists( 'mucha_post_comment' ) ) :

    /**
     * Enable/Disable Comment Section
     *
     * @since 1.0.0
     */
    function mucha_post_comment() {
        global $post;
        $mucha_enable_comment = mucha_get_meta( $post->ID, 'mucha_enable_comment', 'yes' );
        if ( isset( $mucha_enable_comment ) && ! empty( $mucha_enable_comment ) ) {
            if( 'yes' == $mucha_enable_comment ){
                
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            }
        }

    }

endif;

add_action( 'mucha_action_comment', 'mucha_post_comment' );

if ( ! function_exists( 'mucha_404_page_content' ) ) :
    /**
     * 404 page content
     *
     * @since 1.0.0
     */
    function mucha_404_page_content() { ?>
        <?php $error_title = get_theme_mod( 'error_title', esc_html__( '404', 'mucha') );
        $error_desc = get_theme_mod( 'error_desc', esc_html__( 'Page not found.', 'mucha') );
        $error_button = get_theme_mod( 'error_button', esc_html__( 'Back to Home.', 'mucha') );
        ?>
        <section class="error-404 not-found">
            <div class="container">
                <div class="entry-content">
                    <?php if ( !empty( $error_title ) ): ?>
                        <h2 class="page-title"><?php echo esc_html( $error_title ); ?></h2>
                    <?php endif; ?>
                    <?php if ( !empty( $error_desc ) ): ?>
                        <p><?php echo esc_html( $error_desc ); ?></p>
                    <?php endif; ?>
                    <?php if ( !empty( $error_button ) ): ?>
                        <a class="box-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $error_button ); ?></a>
                    <?php endif; ?>   
                </div>
            </div>
        </section>             
        <?php
    }
endif;
add_action( 'mucha_action_404_page', 'mucha_404_page_content' );

