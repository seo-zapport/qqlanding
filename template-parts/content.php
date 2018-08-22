<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('qqland-post'); ?>>
	<header class="entry-header">
		<div class="qqland-entry-wrapper">
			<?php
			if ( is_singular() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif; ?>
		</div>
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				qqlanding_posted_on();
				qqlanding_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php qqlanding_post_thumbnail(); ?>

	<div class="entry-excerpt">
		<?php
		/*the_content( sprintf(
			wp_kses(
				 //translators: %s: Name of current post. Only visible to screen readers
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'qqlanding' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );*/
		the_excerpt();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'qqlanding' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php qqlanding_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
