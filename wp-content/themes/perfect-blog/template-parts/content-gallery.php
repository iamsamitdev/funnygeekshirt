<?php
/**
 * The template part for displaying services
 *
 * @package perfect-blog
 * @subpackage perfect-blog
 * @since perfect-blog 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article class="page-box">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <div class="metabox">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-6">
        <?php if( get_theme_mod( 'perfect_blog_author_hide',true) != '') { ?>
          <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        <?php } ?>
      </div>
      <div class="date-section col-lg-6 col-md-6 col-6">
        <?php if( get_theme_mod( 'perfect_blog_date_hide',true) != '') { ?>
          <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span> 
        <?php } ?>

        <?php if( get_theme_mod( 'perfect_blog_comment_hide',true) != '') { ?>     
          <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'perfect-blog'), __('0 Comments', 'perfect-blog'), __('% Comments', 'perfect-blog') ); ?> </span>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="box-image">
    <?php
      if ( ! is_single() ) {

        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo get_post_gallery();
          echo '</div>';
        };
      };
    ?>
  </div>
  <div class="new-text">
    <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( perfect_blog_string_limit_words( $excerpt, esc_attr(get_theme_mod('perfect_blog_excerpt_number','20')))); ?></p></div>
    <div class="second-border">
      <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'perfect-blog' ); ?>"><?php echo esc_html(get_theme_mod('perfect_blog_button_text','Read complete post'));?><span class="screen-reader-text"><?php esc_html_e( 'Read complete post','perfect-blog' );?></span></a>
    </div>
  </div>
  <div class="clearfix"></div>
</article>