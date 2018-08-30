<?php
	$theme_color = get_field( 'th_color_scheme', 'option' ); // theme color
	$layout = get_field( 'fb_banner_layout', 'option' ); //Banner Layout
	switch ($theme_color) {
		case 'qq188': $class = ' ' . $theme_color . '_box'; break;
		case 'qq101': $class = ' ' . $theme_color . '_box'; break;
		case 'qq1x2': $class = ' ' . $theme_color . '_box'; break;
		case 'qq724': $class = ' ' . $theme_color . '_box'; break;
		case 'qqfortuna': $class = ' ' . $theme_color . '_box'; break;
		case 'qq801': $class = ' ' . $theme_color . '_box'; break;
		case 'qq882': $class = ' ' . $theme_color . '_box'; break;
		case 'qq808': $class = ' ' . $theme_color . '_box'; break;
		case 'qq828': $class = ' ' . $theme_color . '_box'; break;
		case 'custom': $class = ' ' . $theme_color . '_box'; break;
		default: $class = ' ' . $theme_color . '_box'; break;
	}
	switch ($layout) {
		case 'slider': $banner_class = 'qqgroup-slider'; $wrap_class = 'banner-slider owl-carousel'; break;
		case 'pop_up': $banner_class = 'qqgroup-popup'; $wrap_class = 'container';break;
		default: $banner_class = 'qqgroup-float d-sm-none d-md-none d-lg-block desk'; $m_classs="qqgroup-float"; $wrap_class = 'd-flex flex-wrap';break;
	}
?>
<section id="qqgroup-wrap" class="<?php echo $banner_class; ?>">
	<h3 class="sr-only"><?php the_field('fb_banner_title','option'); ?></h3>
	<?php if ($layout == 'slider'): ?>
		<div class="container">
	<?php endif; ?>
		<?php if ( have_rows('fb_layout_settings', 'option') ): ?>
			<?php while ( have_rows('fb_layout_settings', 'option') ): the_row();
				$float_layout = get_sub_field( 'fb__layout', 'option' );
				$float_class = ( $float_layout == 'classic') ? ' float-classic' : ' float-flat';
				?>
				<?php if ( $layout == 'float' && $float_layout == 'flat' ): ?>
					<button type="button" class="btn btn-xs btn-block btn-pangclose btn-float-b"><i class="fa fa-lg fa-arrow-right"></i></button>
				<?php endif; ?>
				<div class="<?php echo $wrap_class . $class . $float_class; ?>">
					<?php if ( $layout == 'float' ):?>

						<?php if ($float_layout == 'classic'): ?>
							<div class="qqgroup-img boxWrap"><?php floating_banner('fb__item'); ?></div>
						<?php endif; ?>
						<div class="qqgroup-sidebox side btn-pangclose" data-toggle="clickToggle">
							<?php if ($float_layout == 'classic'): ?>
								<div class="qqgroup-logo">
									<i class="fa fa-2x fa-angle-double-left"></i>
									<h3><?php the_field( 'fb_banner_title', 'option' ); ?></h3>
									<i class="fa fa-2x fa-angle-double-left"></i>
								</div>
							<?php else: ?>
								<?php if ( have_rows( 'fb__item_side_brand_logo', 'option' ) ): ?>
									<?php while ( have_rows('fb__item_side_brand_logo', 'option') ): the_row(); ?>
										<?php $logo = get_sub_field('fb__item_side_bl_logo','option'); ?>
										<div class="p_logo"><img src="<?php echo esc_attr( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="img-responsive"></div>
									<?php endwhile; ?>
								<?php endif; //end of fb_banner_title?>
							<?php endif; //end of style ?>
						</div>
						<?php if ( $float_layout == 'flat' ): ?>
							<div class="qqgroup-img boxWrap"><?php floating_banner('fb__item'); ?></div>
						<?php endif; ?>
					<?php else: ?>

					    <?php if ( have_rows( 'fb__item', 'option' ) ):  ?>
						    <?php while( have_rows( 'fb__item', 'option' ) ): the_row();
								$link_alt = get_sub_field( 'fb_link_url' );
								$img_title = get_sub_field( 'fb__item_title' );
								$img_link = get_sub_field( 'fb__item_img_url' );
								$link_target = get_sub_field( 'fb__item_link_target' );
								$rel_alt = get_sub_field( 'fb__item_xfn' );
								$bg_color = get_sub_field( 'fb__item_img_bg_color' );
								$shadow_color = get_sub_field( 'fb__item_img_shadow' );

								$rel_text = '';
								if ( empty( $link_alt ) ) { $link_alt = esc_url( home_url('/') ); }
								if ( $link_target === true ) {
									$target = '_blank';
								}else{
									$target = '_self';
								}
								if ( $rel_alt ) { $rel_text = 'nofollow'; }
								if ( $float_layout == 'classic' ) {
									$link_class = 'qqgroup-item img-responsive';
								}else{
									$link_class = 'img-responsive';
								}  
								$item_link = '<a href="' . do_shortcode("$link_alt") . ' " title="' .  $img_title . '" target="' . esc_attr( $target ) . '" rel="' . esc_attr( $rel_text ) . '">';
									$item_link .= '<img src="' .  $img_link . '" class="' . $link_class . '" title="' . esc_html( $img_title ) . '" alt="' . esc_html( $img_title ) . '" >';
								$item_link .= '</a>';?>
								<div><?php echo $item_link; ?></div>

							<?php endwhile; // slider?>
						<?php endif; // slider?>

					<?php endif; // slider?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php if ($layout == 'slider'): ?>
		</div>
	<?php endif; ?>
</section><!--Desktop-->

<?php if ( $layout == 'float' ): ?>
	<?php if ( have_rows('fb_layout_settings', 'option') ): ?>
		 <?php while ( have_rows('fb_layout_settings', 'option') ): the_row();
		 	$float_layout = get_sub_field( 'fb__layout', 'option' );
			if ( $float_layout == 'classic' ) {
				$class = ' m-qqgroup-ads';
				$m_class = 'm-float_classic';
			}else{
				$class = 'm-ads-' . $theme_color;
				$m_class = '';
			}

		 	?>

			<section class="<?php echo $m_classs . $m_class; ?> m-banner d-sm-block d-md-none d-lg-none">
			    <div class="m-button-ad <?php echo $class; ?>">
			    	<i class="fa fa-chevron-down"></i>
			    	<h3 class="m-title text-center"><?php the_field('fb_banner_title','option'); ?></h3>
			    </div>
			     <div class="m-banner-ad m-banner-flex">
			     	<?php if ( have_rows('fb__item', 'option') ): ?>
				     	<?php while( have_rows('fb__item', 'option' ) ) : the_row();
							$link_alt = get_sub_field( 'fb_link_url' );
							$img_title = get_sub_field( 'fb__item_title' );
							$img_link = get_sub_field( 'fb__item_img_url' );
							$link_target = get_sub_field( 'fb__item_link_target' );
							$rel_alt = get_sub_field( 'fb__item_xfn' );
							$bg_color = get_sub_field( 'fb__item_img_bg_color' );
							$shadow_color = get_sub_field( 'fb__item_img_shadow' );

							$rel_text = '';
							if ( empty( $link_alt ) ) { $link_alt = esc_url( home_url('/') ); }
							if ( $link_target === true ) {
								$target = '_blank';
							}else{
								$target = '_self';
							}
							if ( $rel_alt == 1 ) { $rel_text = 'nofollow'; }

				     		?>
				        	<div class="m-ads">
				        		<a href="<?php echo do_shortcode( $link_alt ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo $rel_text; ?>" class="link-alternative-<?php echo $theme_color; ?>">
				        			<img src="<?php echo $img_link; ?>" title="<?php echo esc_html( $img_title ); ?>" alt="<?php echo esc_html( $img_title ); ?>" class="img-responsive">
				        		</a>
				        	</div>
			        	<?php endwhile; ?><!--Mobile Float-->
		        	<?php endif; ?><!--Mobile Float-->

			     </div>
			</section>

		<?php endwhile; ?><!--Mobile Float-->
	<?php endif; ?><!--Mobile Float-->
<?php endif; ?><!--Mobile Float-->