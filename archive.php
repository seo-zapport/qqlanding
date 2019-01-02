<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */
if ( ! defined('ABSPATH')) exit;

get_header();

$blogs_sidebar_layout = qqlanding_grid_sets( 'right','blog');

if ( get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'left' || get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'left' );
endif;
?>

	<div id="primary" class="content-area <?php echo $blogs_sidebar_layout['grid_sets'] ?>">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="qqland-grid-2">

				<?php
				/* Start the Loop */
				/*if (  get_post_type( 'qqvideos' ) ) :
					echo '<div class="row">';
						get_template_part( 'template-parts/content', 'videos' );
					echo '</div>';
				else:
*/
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					
					echo '<span class="clearfix"></span>';
					echo '<div class="col-12">';
						qqlanding_post_navigations();
					echo '</div>';				
				//endif;
				?>
			</div><!-- .qqland-grid-2 -->

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'right' || get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'right' );
endif;
get_footer();
