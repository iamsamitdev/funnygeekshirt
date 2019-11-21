<?php

/**
 * The Template for displaying all single posts.
 *
 * @package perfect-blog
 */

get_header(); ?>

<div class="container" style="padding-top:120px">
	<main id="maincontent" role="main" class="middle-align">
		<?php
		$left_right = get_theme_mod('perfect_blog_layout_options', 'Right Sidebar');
		if ($left_right == 'Left Sidebar') { ?>
			<div class="row">
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
				<div class="col-lg-8 col-md-8" class="content-ts">
					<?php if (have_posts()) :
							/* Start the Loop */
							while (have_posts()) : the_post();
								get_template_part('template-parts/single-content');
							endwhile;
						else :
							get_template_part('no-results');
						endif;
						?>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php } else if ($left_right == 'Right Sidebar') { ?>
			<div class="row">
				<div class="col-lg-8 col-md-8" class="content-ts">
					<?php if (have_posts()) :
							/* Start the Loop */
							while (have_posts()) : the_post();
								get_template_part('template-parts/single-content');
							endwhile;
						else :
							get_template_part('no-results');
						endif;
						?>
				</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		<?php } else if ($left_right == 'One Column') { ?>
			<div class="content-ts">
				<?php if (have_posts()) :
						/* Start the Loop */
						while (have_posts()) : the_post();
							get_template_part('template-parts/single-content');
						endwhile;
					else :
						get_template_part('no-results');
					endif;
					?>
			</div>
		<?php } else if ($left_right == 'Three Columns') { ?>
			<div class="row">
				<div id="sidebar" class="col-lg-3 col-md-3">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
				<div class="col-lg-6 col-md-6" class="content-ts">
					<?php if (have_posts()) :
							/* Start the Loop */
							while (have_posts()) : the_post();
								get_template_part('template-parts/single-content');
							endwhile;
						else :
							get_template_part('no-results');
						endif;
						?>
				</div>
				<div id="sidebar" class="col-lg-3 col-md-3">
					<?php dynamic_sidebar('sidebar-2'); ?>
				</div>
			</div>
		<?php } else if ($left_right == 'Four Columns') { ?>
			<div class="row">
				<div id="sidebar" class="col-lg-3 col-md-3">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
				<div class="col-lg-3 col-md-3" class="content-ts">
					<?php if (have_posts()) :
							/* Start the Loop */
							while (have_posts()) : the_post();
								get_template_part('template-parts/single-content');
							endwhile;
						else :
							get_template_part('no-results');
						endif;
						?>
				</div>
				<div id="sidebar" class="col-lg-3 col-md-3">
					<?php dynamic_sidebar('sidebar-2'); ?>
				</div>
				<div id="sidebar" class="col-lg-3 col-md-3">
					<?php dynamic_sidebar('sidebar-3'); ?>
				</div>
			</div>
		<?php } else if ($left_right == 'Grid Layout') { ?>
			<div class="row">
				<div class="col-lg-8 col-md-8" class="content-ts">
					<?php if (have_posts()) :
							/* Start the Loop */
							while (have_posts()) : the_post();
								get_template_part('template-parts/single-content');
							endwhile;
						else :
							get_template_part('no-results');
						endif;
						?>
				</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-2'); ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="row">
				<div class="col-lg-8 col-md-8" class="content-ts">
					<?php if (have_posts()) :
							/* Start the Loop */
							while (have_posts()) : the_post();
								get_template_part('template-parts/single-content');
							endwhile;
						else :
							get_template_part('no-results');
						endif;
						?>
				</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-2'); ?>
				</div>
			</div>
		<?php } ?>
		<div class="clearfix"></div>
	</main>
</div>

<?php get_footer(); ?>