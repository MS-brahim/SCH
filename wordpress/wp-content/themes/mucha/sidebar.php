<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mucha
 */

$sidebar = apply_filters( 'mucha_get_sidebar', 'sidebar-1' );
if ( is_active_sidebar( $sidebar ) ) : ?>
	<aside id="secondary" class="widget-area">		

		<?php dynamic_sidebar( $sidebar ); ?>
			
	</aside><!-- #secondary -->
<?php endif; ?>