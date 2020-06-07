<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bring_back
 */

$class[] = 'col-12';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <?php if( ! is_front_page() && ! class_exists('bring_back_Toolkit' ) ) : ?>

	<div class="entry-header mb-4">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div><!-- .entry-header -->

    <?php endif; ?>

	<?php bring_back_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bring-back' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<div class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'bring-back' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div><!-- .entry-footer -->
	<?php endif; ?>

</div><!-- #post-<?php the_ID(); ?> -->
