<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mucha
 */

get_header();
?>
<div class="row">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php 
			/*
			 * Hook - mucha_action_404_page
			 *
			 * @hooked - mucha_404_page_content -10
			*/
			do_action( 'mucha_action_404_page' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
