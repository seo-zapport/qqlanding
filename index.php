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

$blogs_sidebar_layout = qqlanding_grid_sets( 'both','blog');

if ( get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'left' || get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'left' );
endif; ?>

<?php /*if ( have_rows( 'th_fonts', 'option' ) ) :
	while ( have_rows( 'th_fonts', 'option' ) ) : the_row();
		$smo = 1;
		$entry_item = get_sub_field('th_entry_item');
		$font_family = get_sub_field('thr_font_family');
		$font_size = get_sub_field('thr_font_size');
		$font_style = get_sub_field('thr_font_style');
		$font_weight = get_sub_field('thr_font_weight');

		if ( get_sub_field('th_entry_item') == 'body' ) : ?>
			body.qqlanding-sites{
		<?php elseif( get_sub_field('th_entry_item') == 'content' ): ?>
			.page-content,.entry-content,.entry-summary,.comment-content{
		<?php elseif( get_sub_field('th_entry_item') == 'meta' ): ?>
			.genpost-entry-meta,.single-entry-meta,.genpost-entry-footer{
		<?php elseif( get_sub_field('th_entry_item') == 'link' ): ?>
			a, .page-links{
		<?php else: ?>
			.page-entry-title,.archive-page-title,.search-page-title,.entry-title{
		<?php endif; ?>
		
		font-family:
		<?php foreach ($font_family as $val) {
			//echo $val . ' ,';
			//$item = implode(', ', $val);
			echo item;
		} ?> ;
		font-size: <?php echo $font_size; ?>px; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }	
	<?php endwhile;
endif;*/?>

	<div id="primary" class="content-area <?php echo $blogs_sidebar_layout['grid_sets'] ?>">
		<main id="main" class="site-main">

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

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

if ( get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'right' || get_theme_mod( 'qqlanding_blog_sidebar_layout', 'both' ) == 'both' ) :
	get_sidebar( 'right' );
endif;

get_footer();
