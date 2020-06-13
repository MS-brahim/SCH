<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mucha
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php mucha_single_structure(); ?>
	<?php 		
		wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mucha' ),
				'after'  => '</div>',
		) );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
