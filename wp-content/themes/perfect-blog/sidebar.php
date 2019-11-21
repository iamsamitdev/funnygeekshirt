<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package perfect-blog
 */
?>

<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="archives" role="complementary" class="widget" aria-label="firstsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'perfect-blog' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside id="meta" role="complementary" class="widget" aria-label="firstsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'perfect-blog' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>