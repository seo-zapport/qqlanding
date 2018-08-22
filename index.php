<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */

get_header();
<<<<<<< HEAD

$blogs_sidebar_layout = qqlanding_grid_sets( 'both','blog');

if ( get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'left' || get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'left' );
endif; ?>
	<div id="primary" class="content-area <?php echo $blogs_sidebar_layout['grid_sets'] ?>">
		<main id="main" class="site-main">
			<div class="qqland-grid-2">
=======
get_sidebar( 'left' );
?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main">

>>>>>>> b6d2702... initial commit
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
<<<<<<< HEAD
			echo '<span class="clearfix"></span>';
			echo '<div class="col-12">';
				qqlanding_post_navigations();
			echo '</div>';
=======

			the_posts_navigation();
>>>>>>> b6d2702... initial commit

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
<<<<<<< HEAD
			</div>
=======

>>>>>>> b6d2702... initial commit
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
<<<<<<< HEAD

if ( get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'right' || get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'right' );
endif;

=======
get_sidebar( 'right' );
>>>>>>> b6d2702... initial commit
get_footer();
