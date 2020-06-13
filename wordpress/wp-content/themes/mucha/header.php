<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mucha
 */

?><?php
	/**
	 * Hook - mucha_action_doctype.
	 *
	 * @hooked mucha_doctype -  10
	 */
	do_action( 'mucha_action_doctype' );
?>

<head>
	<?php
	/**
	 * Hook - mucha_action_head.
	 *
	 * @hooked mucha_head -  10
	 */
	do_action( 'mucha_action_head' );
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else{
		do_action( 'wp_body_open' );
	} ?>
	<?php
	/**
	 * Hook - mucha_action_before.
	 *
	 * @hooked mucha_page_start - 10
	 * 
	 */
	do_action( 'mucha_action_before' );

	/**
	 * Hook - mucha_action_before_header
	 *
	 * @hooked mucha_site_branding -10
	 * @hooked mucha_main_navigation -15
	 * @hooked mucha_header_information -20
	 *
	 */
	do_action( 'mucha_action_before_header' );

	/**
	 * Hook - mucha_action_header
	 *
	 * @hooked mucha_site_branding -10
	 *
	 */
	do_action( 'mucha_action_header' );

	/**
	 * Hook - mucha_action_after_header
	 *
	 * @hooked mucha_header_end -10
	 *
	 */
	do_action( 'mucha_action_after_header' );

	/**
	 * Hook - mucha_action_breadcrumb
	 *
	 * @hooked mucha_breadcrumb -10
	 *
	 */
	do_action( 'mucha_action_breadcrumb' );

	/**
	 * Hook - mucha_action_before_content
	 *
	 * @hooked mucha_content_start -10
	 *
	 */
	do_action( 'mucha_action_before_content' );