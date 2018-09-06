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
if ( ! defined( 'ABSPATH' ) ) die; ?>
		<?php if ( ! is_page_template( 'template-page.php' ) || is_home() ): ?>
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
			<div class="site-bank-wrapper widget py-3">
				<div class="row">
					<?php if ( have_rows('licensed_settings', 'option')  ): ?>
						<?php while ( have_rows('licensed_settings', 'option')  ): the_row(); ?>
							<?php if ( get_sub_field( 'lcs_allow','option' ) === true ): ?>
								<div class="col-12 col-md-3 col-lg-3">
									<div class="provider-group prov-license">
										<?php if ( ! empty( get_sub_field( 'lcs_title','option' ) ) ): ?>
											<div class="widget-title-container">
												<h4 class="widget-title"><?php echo get_sub_field( 'lcs_title','option' ); ?></h4>
											</div>
										<?php endif; ?>
										<div class="provider-wrap">
											<span class="provider-item "><i class="pagcor">pagcor</i></span>
										</div>
									</div>
								</div>
							<?php endif;?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if ( have_rows('banks', 'option')  ): ?>
						<?php while ( have_rows('banks', 'option')  ): the_row(); ?>
							<?php $country = get_sub_field( 'b_country', 'option' );
								switch ($country) {
									case 'my': $country_class = 'malaysia'; break;
									case 'th': $country_class = 'thailand'; break;
									case 'vn': $country_class = 'vietnam'; break;
									case 'zh': $country_class = 'china'; break;
									default: $country_class = 'indo'; break;
								} 
							?>
							<div class="col-12 col-md-9 col-lg-9">
								<div class="provider-group prov-banks flex-wrap">
									<?php if ( ! empty( get_sub_field( 'b_title','option' ) ) ): ?>
										<div class="widget-title-container">
											<h4 class="widget-title"><?php echo get_sub_field( 'b_title','option' ); ?></h4>
										</div>
									<?php endif; ?>
									<?php if ( get_sub_field( 'b_allow_bank','option' ) == true ): ?>
										<?php if ( have_rows( 'b_item','option' ) ): ?>
											<div class="provider-wrap bank-<?php echo $country_class; ?> flex-wrap">
												<?php while ( have_rows('b_item', 'option')  ): the_row(); ?>
													<?php 
													$val = 'bb_logo_' . $country;
													$logo = get_sub_field( $val, 'option' ); ?>
													<span class="provider-item"><i class="<?php echo $logo; ?>"><?php the_sub_field('bb__title','option'); ?></i></span>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'left-footer-sidebar' ) || is_active_sidebar( 'middle-footer-sidebar' ) || is_active_sidebar( 'middle-footer-sidebar' ) ) : ?>
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
<?php endif; ?>

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
	<?php if ( is_home() || is_page_template( 'template-page.php' ) && get_field( 'th_layout', 'option' ) === 'box'): ?>
		</div>
	<?php endif;?> <!--if wide/box only-->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
