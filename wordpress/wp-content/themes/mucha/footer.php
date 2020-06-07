<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mucha
 */

	/*
	 * Hook - mucha_action_after_content
	 *
	 * @hooked - mucha_content_end -10
	 *
	*/
	do_action( 'mucha_action_after_content' );

	/*
	 * Hook - mucha_action_before_footer
	 *
	 * @hooked - mucha_footer_start -10
	*/
	do_action( 'mucha_action_before_footer' );

	/*
	 * Hook - mucha_action_footer
	 *
	 * @hooked - mucha_footer_end -10
	*/
	do_action( 'mucha_action_footer' );

	/*
	 * Hook - mucha_action_after_footer
	 *
	 * @hooked - mucha_footer_end -10
	*/
	do_action( 'mucha_action_after_footer' );

	/*
	 * Hook - mucha_action_scroll_footer
	 *
	 * @hooked - mucha_scroll_footer -10
	*/
	do_action( 'mucha_action_scroll_footer' );	

	/*
	 * Hook - mucha_action_after
	 *
	 * @hooked - mucha_page_end -10
	*/
	do_action( 'mucha_action_after' );
	?>
<?php wp_footer(); ?>

</body>
</html>
