<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" role="main" id="maincontent">
  <?php do_action( 'perfect_blog_before_slider' ); ?>

  <?php /** slider section **/ ?>
  <?php if( get_theme_mod('perfect_blog_slider_hide_show') != ''){ ?>
    
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'perfect_blog_slidersettings_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $slider_pages[] = $mod;
            }
          }
          if( !empty($slider_pages) ) :
          $args = array(
              'post_type' => 'page',
              'post__in' => $slider_pages,
              'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1> 
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( perfect_blog_string_limit_words( $excerpt,30 ) ); ?></p> 
                  <div class="more-btn">              
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','perfect-blog'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','perfect-blog' );?></span></a>
                  </div>         
                </div>
              </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','perfect-blog' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','perfect-blog' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php do_action( 'perfect_blog_after_slider' ); ?>

  <div class="container">
    <div class="row m-0">
      <div class="col-lg-9 col-md-9 title">
        <?php if( get_theme_mod('perfect_blog_cat_title') != ''){ ?> <h2><?php echo esc_html(get_theme_mod('perfect_blog_cat_title',__('THINGS YOU DONT WANNA MISS','perfect-blog'))); ?></h2>
        <hr class="titlehr">
        <?php }?>
        <div class="category-section row">
          <?php 
            $catData=  get_theme_mod('perfect_blog_category');
              if($catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'perfect-blog')));?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="col-lg-4 col-md-6"> 
                    <div class="imagebox">
                      <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    </div>
                    <div class="contentbox">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    </div>
                  </div>
                <?php endwhile;
              wp_reset_postdata();
            } ?>
        </div>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>
      </div>
      <div id="sidebar" class="col-lg-3 col-md-3">
        <?php dynamic_sidebar('home-page'); ?>
      </div>
    </div>
  </div>

  <?php do_action( 'perfect_blog_after_post_section' ); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>