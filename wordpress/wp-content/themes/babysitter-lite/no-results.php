<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Babysitter Lite
 */
?>
<header>
<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'babysitter-lite' ); ?></h1>
</header>
<div class="blog-post">
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
<p>
<?php /* translators: %s: publish post started */ 
printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'babysitter-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'babysitter-lite' ); ?></p>
<?php get_search_form();  
	  else : ?>
<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'babysitter-lite' ); ?></p>
<?php get_search_form();
	  endif; 
?>