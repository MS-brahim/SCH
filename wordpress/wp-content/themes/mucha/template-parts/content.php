<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mucha
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php mucha_archive_structure(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
