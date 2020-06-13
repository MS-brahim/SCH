<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Mucha
 */
if ( ! function_exists( 'mucha_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function mucha_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'mucha_action_doctype', 'mucha_doctype', 10 );

if ( !function_exists( 'mucha_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function mucha_head() {
	?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
	<?php
	}
endif;

add_action( 'mucha_action_head', 'mucha_head', 10 );

if ( ! function_exists( 'mucha_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function mucha_page_start() {
	?>
    <div id="page" class="site">
    	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mucha' ); ?></a>
    <?php
	}
endif;
add_action( 'mucha_action_before', 'mucha_page_start' );

if ( ! function_exists( 'mucha_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function mucha_page_end() {
	?></div><!-- #page --><?php
	}
endif;
add_action( 'mucha_action_after', 'mucha_page_end' );

if ( ! function_exists( 'mucha_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function mucha_content_start() {
	?><div id="content" class="site-content"><div class="container"><?php
	}
endif;
add_action( 'mucha_action_before_content', 'mucha_content_start' );


if ( ! function_exists( 'mucha_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function mucha_content_end() {
	?></div><!-- container --></div><!-- #content --><?php
	}
endif;
add_action( 'mucha_action_after_content', 'mucha_content_end' );


if ( ! function_exists( 'mucha_header_start' ) ) :
	/**
	 * Header Start
	 *
	 * @since 1.0.0
	 */
	function mucha_header_start() { ?>
	<header itemtype="https://schema.org/WPHeader" itemscope="itemscope" id="masthead" <?php mucha_header_classes(); ?>><div class="bg-ovelay"></div> <!-- header starting from here --><?php	
	}
endif;

add_action( 'mucha_action_before_header', 'mucha_header_start', 10 );


if ( ! function_exists( 'mucha_header_end' ) ) :
	/**
	 * Header End
	 *
	 * @since 1.0.0
	 */
	function mucha_header_end() {
	?></header><!-- header ends here --><?php	
	}
endif;
add_action( 'mucha_action_after_header', 'mucha_header_end', 10 );

if ( ! function_exists( 'mucha_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function mucha_footer_start() {
	?><footer id="colophon" class="site-footer"> <!-- footer starting from here --> 
	<?php
	}
endif;
add_action( 'mucha_action_before_footer', 'mucha_footer_start' );


if ( ! function_exists( 'mucha_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function mucha_footer_end() {
	?></footer><!-- #colophon --><?php
	}
endif;
add_action( 'mucha_action_after_footer', 'mucha_footer_end' );
