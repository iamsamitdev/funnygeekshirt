<?php
/**
 * The template part for displaying slider
 *
 * @package perfect-blog
 * @subpackage perfect-blog
 * @since perfect-blog 1.0
 */
?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <div class="entry-attachment">
            <div class="attachment">
                <?php perfect_blog_the_attached_image(); ?>
            </div>

            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content"><p><?php the_excerpt();?></p></div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'perfect-blog' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'perfect-blog' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'perfect-blog' ),
            ) );
        }   elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'perfect-blog' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'perfect-blog' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'perfect-blog' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'perfect-blog' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }

    ?>
</article> 