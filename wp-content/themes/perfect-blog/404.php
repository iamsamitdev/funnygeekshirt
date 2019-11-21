<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package perfect-blog
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'perfect-blog' ), esc_html__( 'Not Found', 'perfect-blog' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'perfect-blog' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'perfect-blog' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Back to Home Page', 'perfect-blog' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'perfect-blog' ); ?></span></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>