<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Babysitter Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'babysitter-lite' ); ?>
</a>
<?php if(get_theme_mod('phone-txt') || get_theme_mod('email-txt') || get_theme_mod('fb-link') || get_theme_mod('twitt-link') || get_theme_mod('gplus-link')  || get_theme_mod('linked-link') || get_theme_mod('insta-link') != '') { ?>
<div class="top-header">
	<div class="container">
    	<div class="top-contact">
			<?php if(get_theme_mod('phone-txt',true) != '') { ?>
				<span>
					<i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('phone-txt')); ?>
				</span>
			<?php } ?>
			<?php if(get_theme_mod('email-txt') != ''){ ?>
				<span>
					<i class="fa fa-envelope-o" aria-hidden="true"></i><a href="<?php echo esc_url('mailto:'.sanitize_email(get_theme_mod('email-txt'))); ?>"><?php echo sanitize_email(get_theme_mod('email-txt')); ?></a>
				</span>
			<?php } ?>
		</div><!-- top-contact -->
		<div class="social">
			<?php if(get_theme_mod('fb-link') != ''){ ?>
				<a href="<?php echo esc_url(get_theme_mod('fb-link')); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(get_theme_mod('twitt-link') != ''){ ?>
				<a href="<?php echo esc_url(get_theme_mod('twitt-link')); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(get_theme_mod('gplus-link') != ''){ ?>
				<a href="<?php echo esc_url(get_theme_mod('gplus-link')); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(get_theme_mod('linked-link') != ''){ ?>
				<a href="<?php echo esc_url(get_theme_mod('linked-link')); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if(get_theme_mod('insta-link') != '') { ?>
				<a href="<?php echo esc_url(get_theme_mod('insta-link')); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			<?php } ?>
		</div><!-- social --><div class="clear"></div>
    </div><!-- container -->
</div><!-- top header --> 
<?php } ?>


<div id="header">
	<div class="header-inner container">
      <div class="logo">
       <?php babysitter_lite_the_custom_logo(); ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>

					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_html($description); ?></p>
					<?php endif; ?>
    </div><!-- .logo -->                 
    
	<div id="navigation">
		<div class="toggle">
				<a class="toggleMenu" href="#"><?php esc_html_e('Menu','babysitter-lite'); ?></a>
		</div><!-- toggle --> 	
		<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">					
				<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>	
		</nav><!-- main-navigation -->
	</div><!-- navigation --><div class="clear"></div>
</div><!-- .header-inner-->
	<div class="wave"></div>
</div><!-- #header -->