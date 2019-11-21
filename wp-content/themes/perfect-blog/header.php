<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package perfect-blog
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url(__('http://gmpg.org/xfn/11', 'perfect-blog')); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header role="banner" class="fixed-top">
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e('Skip to content', 'perfect-blog'); ?></a>
    <div id="header">
      <div class="container">
        <div class="row">
          <div class="logo col-lg-3 col-md-9 col-9">
            <?php if (has_custom_logo()) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php else : ?>
              <?php $blog_info = get_bloginfo('name'); ?>
              <?php if (!empty($blog_info)) : ?>
                <?php if (is_front_page() && is_home()) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) :
                  ?>
                <p class="site-description">
                  <?php echo esc_html($description); ?>
                </p>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <div class="col-lg-7 col-md-3 col-3">
            <div class="toggle-menu responsive-menu">
              <button onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu', 'perfect-blog'); ?></span></button>
            </div>
            <div id="menu-sidebar" class="nav sidebar">
              <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e('Top Menu', 'perfect-blog'); ?>">
                <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu', 'perfect-blog'); ?></span></a>
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu-navigation clearfix',
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ));
                ?>
                <div id="contact-info">
                  <div class="social-icons">
                    <?php if (get_theme_mod('perfect_blog_facebook_url') != '') { ?>
                      <a href="<?php echo esc_url(get_theme_mod('perfect_blog_facebook_url', '')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e('Facebook', 'perfect-blog'); ?></span></a>
                    <?php } ?>
                    <?php if (get_theme_mod('perfect_blog_twitter_url') != '') { ?>
                      <a href="<?php echo esc_url(get_theme_mod('perfect_blog_twitter_url', '')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e('Twitter', 'perfect-blog'); ?></span></a>
                    <?php } ?>
                    <?php if (get_theme_mod('perfect_blog_skipe_url') != '') { ?>
                      <a href="<?php echo esc_url(get_theme_mod('perfect_blog_skipe_url', '')); ?>"><i class="fab fa-skype"></i><span class="screen-reader-text"><?php esc_attr_e('Skype', 'perfect-blog'); ?></span></a>
                    <?php } ?>
                    <?php if (get_theme_mod('perfect_blog_pint_url') != '') { ?>
                      <a href="<?php echo esc_url(get_theme_mod('perfect_blog_pint_url', '')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_attr_e('Pinterest', 'perfect-blog'); ?></span></a>
                    <?php } ?>
                  </div>
                  <?php get_search_form(); ?>
                </div>
              </nav>
            </div>
          </div>
          <div class="social-media col-lg-2 col-md-3">
            <?php if (get_theme_mod('perfect_blog_facebook_url') != '') { ?>
              <a href="<?php echo esc_url(get_theme_mod('perfect_blog_facebook_url', '')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e('Facebook', 'perfect-blog'); ?></span></a>
            <?php } ?>
            <?php if (get_theme_mod('perfect_blog_twitter_url') != '') { ?>
              <a href="<?php echo esc_url(get_theme_mod('perfect_blog_twitter_url', '')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e('Twitter', 'perfect-blog'); ?></span></a>
            <?php } ?>
            <?php if (get_theme_mod('perfect_blog_skipe_url') != '') { ?>
              <a href="<?php echo esc_url(get_theme_mod('perfect_blog_skipe_url', '')); ?>"><i class="fab fa-skype"></i><span class="screen-reader-text"><?php esc_attr_e('Skype', 'perfect-blog'); ?></span></a>
            <?php } ?>
            <?php if (get_theme_mod('perfect_blog_pint_url') != '') { ?>
              <a href="<?php echo esc_url(get_theme_mod('perfect_blog_pint_url', '')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_attr_e('Pinterest', 'perfect-blog'); ?></span></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </header>