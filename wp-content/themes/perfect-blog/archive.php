<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package perfect-blog
 */

get_header(); ?>

<main id="maincontent" role="main" class="our-services">
    <div class="innerlightbox">
        <div class="container">
            <?php
            $left_right = get_theme_mod( 'perfect-blog_layout_options','Right Sidebar');
            if($left_right == 'Left Sidebar'){ ?>
                <div class="row">
                    <div class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8'); ?>>
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                          while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() ); 
                          endwhile;
                          else :
                            get_template_part( 'no-results' ); 
                          endif; 
                        ?>                
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'perfect-blog' ),
                                    'next_text'          => __( 'Next page', 'perfect-blog' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-blog' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                </div>
            <?php }else if($left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8'); ?>>
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' );
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'perfect-blog' ),
                                    'next_text'          => __( 'Next page', 'perfect-blog' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-blog' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }else if($left_right == 'One Column'){ ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() ); 
                        endwhile;
                        else :
                            get_template_part( 'no-results' );
                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'perfect-blog' ),
                                'next_text'          => __( 'Next page', 'perfect-blog' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-blog' ) . ' </span>',
                            ) );
                        ?>
                    </div> 
                </div>
            <?php }else if($left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6 col-md-6'); ?>>
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                          while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() ); 
                          endwhile;
                          else :
                            get_template_part( 'no-results' );
                          endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'perfect-blog' ),
                                    'next_text'          => __( 'Next page', 'perfect-blog' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-blog' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-3 col-md-3'); ?>>
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' );
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'perfect-blog' ),
                                    'next_text'          => __( 'Next page', 'perfect-blog' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-blog' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($left_right == 'Grid Layout'){ ?>
                <div class="row">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9 col-md-9 row'); ?>>
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/grid-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' );
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'perfect-blog' ),
                                    'next_text'          => __( 'Next page', 'perfect-blog' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-blog' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9 col-md-9 row'); ?>>
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/grid-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' );
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'perfect-blog' ),
                                    'next_text'          => __( 'Next page', 'perfect-blog' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-blog' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }?>
          <div class="clearfix"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>