<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */
if ( ! defined('ABSPATH')) exit;

get_header();

$page_sidebar_layout = qqlanding_grid_sets( 'right','page');

if ( get_theme_mod( 'qqlanding_page_sidebar_layout', 'both' ) == 'left' || get_theme_mod( 'qqlanding_page_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'left' );
endif;
?>

	<div id="primary" class="content-area <?php echo $page_sidebar_layout['grid_sets'] ?>">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			if ( get_theme_mod( 'qqlanding_page_display_comment', 0 ) == 1 ) {
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( get_theme_mod( 'qqlanding_page_sidebar_layout', 'both' ) == 'right' || get_theme_mod( 'qqlanding_page_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'right' );
endif;
get_footer();
