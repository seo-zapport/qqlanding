<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package QQLanding
 */

get_header();
?>
	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">
			<section class="error-404 not-found text-center">
				<header class="page-header">
					<h2 class="page-title" itemprop="headline"><?php esc_html_e( 'Oops!', 'qqlanding' ); ?></h2>
					<h3 class="page-sub-title"><?php esc_html_e( '404', 'qqlanding' ); ?></h3>
				</header><!-- .page-header -->
				<div class="page-content text-center">
					<h3><?php esc_html_e( 'That page can&rsquo;t be found.', 'qqlanding' ); ?></h3>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try to search?', 'qqlanding' ); ?></p>
					<di class="col-md-4 center-blocks"><?php get_search_form(); ?></di>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
