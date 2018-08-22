<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package QQLanding
 */

?>

			</div><!-- #primary -->
		</div><!-- #content -->

		<footer id="colophon" class="site-footer">
			<div class="container">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'qqlanding' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'qqlanding' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'qqlanding' ), 'qqlanding', '<a href="https://github.com/seo-zapport">Zapport SEO Dev</a>' );
						?>
				</div><!-- .site-info -->
			</div><!-- .container -->
		</footer><!-- #colophon -->
	<?php if ( get_field( 'th_layout', 'option' ) == 'wide'): ?>
		</div>
	<?php endif;?> <!--if wide/box only-->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
