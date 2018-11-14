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
		<?php if ( ! is_page_template( 'template-page.php' ) && ! is_page_template( 'template-videos.php' ) && ! is_singular( 'video' ) || is_home() ): ?>
		</div><!-- .row -->
		<?php endif; ?>
	</div><!-- #content -->
	<footer id="footer" class="site-footer py-0" itemscope itemtype="http://schema.org/WPFooter"> 
		<meta itemprop="name" content="Webpage footer for <?php wp_title('&raquo;', true, 'right'); ?>"/>
		<meta itemprop="description" content="Information about imprint and data protection"/>
		<meta itemprop="keywords" content="Imprint, Data Protection, Copyright Data, QR-Code"/>
		<meta itemprop="copyrightYear" content="2018"/>
		<meta itemprop="copyrightHolder" content="<?php echo force_relative_url(); ?>"/>

		<div class="container">
			<?php $licensed = get_field('licensed_settings', 'option');
			$banks_enabled = get_field('providers', 'option');
			if ($licensed['lcs_allow'] == true ): ?>
				<div class="site-bank-wrapper widget py-4">
					<div class="row">
						<?php if ( have_rows('licensed_settings', 'option')  ): ?>
							<?php while ( have_rows('licensed_settings', 'option')  ): the_row(); ?>
								<?php if ( get_sub_field( 'lcs_allow','option' ) === true ): ?>
									<div class="col-12 col-md-3 col-lg-3">
										<div class="provider-group prov-license">
											<?php if ( ! empty( get_sub_field( 'lcs_title','option' ) ) ): ?>
												<div class="<?php echo ( get_field('footer_enable_title_bg','option') === true ) ? 'widget-title-container' : 'widget-container'; ?>">
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
						<?php 
						$dislay_footer = ( get_field( 'sm_footer', 'option' ) === true ) ? 'col-md-6 col-lg-6' : 'col-md-9 col-lg-9' ;
						if ( have_rows('providers', 'option')  ): ?>
							<?php while ( have_rows('providers', 'option')  ): the_row(); ?>
								<?php $country = get_sub_field( 'b_country', 'option' );
									switch ($country) {
										case 'my': $country_class = 'malaysia'; break;
										case 'th': $country_class = 'thailand'; break;
										case 'vn': $country_class = 'vietnam'; break;
										case 'zh': $country_class = 'china'; break;
										default: $country_class = 'indo'; break;
									} 
								?>
								<div class="col-12 <?php echo $dislay_footer; ?>">
									<div class="provider-group prov-<?php echo ( get_sub_field( 'b_providers','option' ) == 'bank' ) ? 'banks' : 'network'; ?> flex-wrap">
										<?php if ( ! empty( get_sub_field( 'b_title','option' ) ) ): ?>
											<div class="<?php echo ( get_field('footer_enable_title_bg','option') === true ) ? 'widget-title-container' : 'widget-container'; ?>">
												<h4 class="widget-title"><?php echo get_sub_field( 'b_title','option' ); ?></h4>
											</div>
										<?php endif; ?>
										<?php if ( get_sub_field( 'b_providers','option' ) === 'bank' ): ?>
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
										<?php else: ?>
											<?php if ( have_rows( 'b_tv_item','option' ) ): ?>
												<div class="provider-wrap network-<?php echo $country_class; ?> flex-wrap">
													<?php while ( have_rows('b_tv_item', 'option')  ): the_row(); ?>
														<?php 
														$val = 'prov_net_logo_' . $country;
														$logo = get_sub_field( $val, 'option' ); 
														//var_dump($logo);
														?>
														<span class="provider-item"><i class="<?php echo $logo; ?>"><?php the_sub_field('prov_net__title','option'); ?></i></span>
													<?php endwhile; ?>
												</div>
											<?php endif; ?>
										<?php endif; //check what providers include ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
						<?php if ( get_field( 'sm_footer', 'option' ) === true ): ?>
							<div class="col-12 col-md-3 col-lg-3">
								<div class="<?php echo ( get_field('footer_enable_title_bg','option') === true ) ? 'widget-title-container' : 'widget-container'; ?>">
									<h4 class="widget-title">Social Media</h4>
								</div>
								<div class="site-footer-info px-0">
									<div class="container px-0">
										<?php qqlanding_social_media(); ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
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
			<?php endif; 
			$footer_socket_class = qqlanding_footer_socket_class( get_theme_mod('qqlanding_display_footer_option'),  has_nav_menu('footer') );
			if( get_theme_mod("qqlanding_display_footer_option") == 1 ): ?>
				<div class="row">
					<div class="site-info <?php echo $footer_socket_class['footer_class']; ?>">		
						<?php if(get_theme_mod('qqlanding_footer_settings')): 
								echo get_theme_mod('qqlanding_footer_settings');
						 else: ?>
						<a href="<?php /*echo esc_url( __( 'https://wordpress.org/', 'qqlanding' ) );*/ ?>">
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
						<?php endif; //end copyright editor?>			
					</div><!-- .site-info -->
				</div>
			<?php endif; //end qqlanding_display_footer_option
				if ( has_nav_menu('footer') ):
					wp_nav_menu( array(
						'theme_location'  => 'footer',
						'container'       => 'div',
						'container_class' => $footer_socket_class['has_nav_class'] . ' mt-3 mt-md-3 mt-lg-0',
						'container_id'    => 'footer-menu-wrap',
						'menu_class'      => 'footer-menu',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth'           => 0,
					) );
				endif; ?>
		</div><!-- .container -->
	</footer><!-- #colophon -->
	<?php if ( th_layout() === 'box' ): ?>
		</div>
	<?php endif;?> <!--if wide/box only-->
</div><!-- #page -->

<div id="site_back_top" class="site_back_top" ><i class="fas fa-chevron-up"></i></div>

<?php wp_footer(); ?>

</body>
</html>



















