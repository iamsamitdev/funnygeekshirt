<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package perfect-blog
 */
?>

<footer role="contentinfo">
    <div id="footer" class="copyright-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <span><?php echo esc_html(get_theme_mod('perfect_blog_footer_copy', __('Copyright 2017 -', 'perfect-blog'))); ?><?php // PERFECT_BLOG_CREDIT(); 
                                                                                                                        ?>
        </span>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>