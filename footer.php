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
		<?php if ( ! is_front_page() && ! is_home() ): ?>
		</div><!-- .row -->
		<?php endif; ?>
	</div><!-- #content -->
	<footer id="footer" class="site-footer" itemscope itemtype="http://schema.org/WPFooter"> 
		<meta itemprop="name" content="Webpage footer for <?php wp_title('&raquo;', true, 'right'); ?>"/>
		<meta itemprop="description" content="Information about imprint and data protection"/>
		<meta itemprop="keywords" content="Imprint, Data Protection, Copyright Data, QR-Code"/>
		<meta itemprop="copyrightYear" content="2018"/>
		<meta itemprop="copyrightHolder" content="<?php echo force_relative_url(); ?>"/>

		<div class="container">
			<div class="site-socker py-3">
				<div class="row">
					<div class="col-md-4">
						<?php if ( is_active_sidebar( 'left-footer-sidebar' ) ) dynamic_sidebar( 'left-footer-sidebar' ); ?>
					</div>
					<div class="col-md-4">
						<?php if ( is_active_sidebar( 'middle-footer-sidebar' ) ) dynamic_sidebar( 'middle-footer-sidebar' ); ?>
					</div>
					<div class="col-md-4">
						<?php if ( is_active_sidebar( 'right-footer-sidebar' ) ) dynamic_sidebar( 'right-footer-sidebar' ); ?>
					</div>
				</div>
			</div>
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
