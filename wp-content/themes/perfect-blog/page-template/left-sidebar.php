<?php
/**
 * Template Name: Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'perfect_blog_pageleft_header' ); ?>

<main id="maincontent" role="main">
    <div class="container">
        <div class="middle-align row">
        	<div id="sidebar" class="col-lg-4 col-md-4">
        		<?php dynamic_sidebar('sidebar-2'); ?>
        	</div>
            <div class="col-lg-8 col-md-8">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php the_post_thumbnail(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content"><p><?php the_content();?></p></div>
                <?php
                    //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
                <?php endwhile; // end of the loop. ?>
            </div>
            <div class="clear"></div> 
        </div>   
    </div>
</main>

<?php do_action( 'perfect_blog_pageleft_footer' ); ?>

<?php get_footer(); ?>