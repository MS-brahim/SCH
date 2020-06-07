<?php
/**
 *
 * @package Babysitter Lite
 */

get_header(); 

if (!is_home() && is_front_page()) {
	$hideslide = get_theme_mod('hide_slider', '1');
	 if($hideslide == ''){   
$babysitter_lite_pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $babysitter_lite_pages[] = $mod;
    }	
} 
if( !empty($babysitter_lite_pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $babysitter_lite_pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $babysitter_lite_slideno[] = $i;
          $babysitter_lite_slidetitle[] = get_the_title();
          $babysitter_lite_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $babysitter_lite_slideno as $babysitter_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $babysitter_lite_sln ); ?>" class="nivo-html-caption">
      <div class="top-bar">
        <h2><a href="<?php echo esc_url($babysitter_lite_slidelink[$k] ); ?>"><?php echo esc_html($babysitter_lite_slidetitle[$k] ); ?></a></h2>
        <div class="clear"></div>
        <a class="slide-button" href="<?php echo esc_url($babysitter_lite_slidelink[$k] ); ?>">
          <?php echo esc_html(get_theme_mod('slide_text',__('View More','babysitter-lite')));?>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
?>

 <div class="main-container"> 
                       <?php $hidebox = get_theme_mod('hide_section', '1'); ?>  
             <?php if($hidebox  == '') { ?>
              <?php if(get_theme_mod('page-setting1',true) != '' ) { ?>  
             <section id="pagearea">
<div class="container">
  <div class="pagearea-inner">
         <?php if(get_theme_mod('page-setting1') != '') { ?>
         	<?php $page_query = new WP_Query(array('page_id' => get_theme_mod('page-setting1'))); ?>
         		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                          <div class="home-section">
                          		<div class="container">
                                		<div class="home-content">
                                        		<h3><?php the_title(); ?></h3>
                                                <p><?php the_excerpt(); ?></p>
                                                <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More','babysitter-lite'); ?></a>
                                        </div><!-- home-content -->
                                        <div class="home-thumb">
                                        	<?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
                                        </div><!-- home-thumb --><div class="clear"></div>
                                </div><!-- container -->
                          </div><!-- home-section -->
                <?php endwhile; ?>
                <?php }  ?>
					<div class="clear"></div>
                </div><!-- .pagearea-inner -->
    </div><!-- container-->
</section>
                       <?php } }?>
                                     
       <div class="content-area">
        <div class="middle-align content_sidebar">
            <div class="site-main" id="sitemain">
				<?php
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content-page', get_post_format() );
						
                    endwhile;
                    // Previous/next post navigation.
                    the_posts_pagination();
					wp_reset_postdata();
                
                else :
                    // If no content, include the "No posts found" template.
                     get_template_part( 'no-results' );
                
                endif;
                ?>
            </div>
            <?php get_sidebar();?>
            <div class="clear"></div>
        </div>
    </div>
<?php get_footer(); ?>