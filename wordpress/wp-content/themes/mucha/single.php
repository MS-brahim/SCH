<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mucha
 */

get_header();
?>
<div class="row">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content','single' );

			$show_post_navigation = get_theme_mod( 'show_post_navigation', true );
			if( true == $show_post_navigation ):
				the_post_navigation();
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			mucha_the_comment();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
		/**
		 *
		 * Hook - mucha_action_sidebar_layout
		 *
		 * @hooked -mucha_sidebar_layout -10
		*/
		do_action( 'mucha_action_sidebar_layout' );
	?>	
</div>
<?php
get_footer();
