<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package perfect-blog
 */

get_header(); ?>

<?php do_action('perfect_blog_page_header'); ?>

<?php while (have_posts()) : the_post(); ?>
    <main id="maincontent" role="main">
        <div class="container" style="padding-top:120px">
            <div class="middle-align">
                <?php the_post_thumbnail(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content">
                    <p><?php the_content(); ?></p>
                </div>
                <?php
                    //If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number())
                        comments_template();
                    ?>
                <div class="clear"></div>
            </div>
        </div>
    </main>
<?php endwhile; // end of the loop. 
?>

<?php do_action('perfect_blog_page_footer'); ?>

<?php get_footer(); ?>