<?php
/**
 * Template Name: Single Video
 * Template Post Type: video
 */
if ( ! defined('ABSPATH')) exit;

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', 'single' );

			if( get_theme_mod( 'qqlanding_single_post_nav_display', true ) ) the_post_navigation(); // Display post navigation

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
