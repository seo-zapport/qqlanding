<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package QQLanding
 */
if ( ! defined('ABSPATH')) exit;

get_header();

$single_sidebar_layout = qqlanding_grid_sets( 'both','single');

if ( get_theme_mod( 'qqlanding_single_sidebar_layout', 'both' ) == 'left' || get_theme_mod( 'qqlanding_single_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'left' );
endif; ?>

	<div id="primary" class="content-area <?php echo $single_sidebar_layout['grid_sets']; ?>">
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

if ( get_theme_mod( 'qqlanding_single_sidebar_layout', 'both' ) == 'right' || get_theme_mod( 'qqlanding_single_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'right' );
endif;
get_footer();
