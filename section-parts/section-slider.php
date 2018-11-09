<?php
// Section Slider
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) die;
$disable = get_field('slider_enable_section', 'options');
$layout = get_field( 'th_color_scheme', 'option' );
$slider_layout = get_field('slider_layout', 'options');
$slider_app = get_field('slider_appearance_group', 'options');
$skew_opt = get_field('slider_skew', 'options');
if ( acf_selective_refresh($disable) ) return $disable = false;
if ($disable) : ?>
<section id="banner">
	
	<?php if ( $slider_layout == 'static' ): ?>
		<?php if (  have_rows('slider_item_static','option') ) : ?>
			<?php while ( have_rows('slider_item_static','option') ): the_row();
				$filters = get_field( 'filter_fields', 'option' );
				$hide_mob = content_img_hide(get_sub_field('slide_hide_image', 'option'));
				$con_settings = get_sub_field('content_settings', 'option');
				$text_align = $con_settings['slider_text_align'];
				$format = get_sub_field('content_format_type', 'option');
				$video = get_sub_field('content_slider_video', 'option');
				switch ($text_align) {
					case 'center': $txt_class = 'center';break;
					case 'right': $txt_class = 'right';break;
					default: $txt_class = 'left';break;
				}
				if ( ! empty($filters) ): ?>
					<div class="slider-filters"></div>
				<?php endif; ?>

				<div id="banner-static" <?php echo ( $skew_opt !== true )? '' : 'class="banner-skew"'; ?>>
					<div class="banner-static-content container text-<?php echo $txt_class; ?> d-flex">
						<?php if ( $con_settings['slider_content_size'] == 'full' ): ?>
							<div class="col-12 col-md-12 col-lg-12 text-white">
								<?php
									echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'));
									if (have_rows('enter_site_button','option')) :
										while (have_rows('enter_site_button','option')) : the_row();
											$esite_type = get_sub_field('btn_type','option');
											$esite_link = get_sub_field('btn_link','option');
											$esite_img = get_sub_field('btn_image','option');
											$esite_txt = get_sub_field('btn_text','option');
											//$esite_xfn = get_sub_field('btn_xfn','option');
											$esite_xfn = get_sub_field('btn_xfn_r','option');
											$esite_trget = get_sub_field('btn_target','option');
											$esite_dev = get_sub_field('btn_device','option');

											//var_dump( $esite_xfn );

											echo qqlanding_btn_entersite($esite_type,$esite_link,$esite_img,$esite_txt,$esite_xfn,$esite_trget,$esite_dev);
										endwhile;
									endif;
								?>
							</div> <!--Full-width-->
						<?php else: ?>
							<div class="row">
								<?php $slider_post = $con_settings['slider_content_position']; ?>
								<?php if ( $slider_post == 'left' ): ?>
									<div class="<?php echo ( $format == 'image' ) ?  $hide_mob : ''; ?> col-12 col-lg-6 text-white align-self-center align-items-center">
										<?php if ( $format == 'image' ): ?>
											<?php echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider'); ?>
										<?php else: 
											echo fpv_video_settings($video, 'video');
										endif ?>
									</div>
								<?php endif; //left?>
								<div class="col-12 col-lg-6 text-white align-self-center align-items-center">
									<?php
										//echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'));
										echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'));
										if (have_rows('enter_site_button','option')) :
											while (have_rows('enter_site_button','option')) : the_row();

												$esite_type = get_sub_field('btn_type','option');
												$esite_link = get_sub_field('btn_link','option');
												$esite_img = get_sub_field('btn_image','option');
												$esite_txt = get_sub_field('btn_text','option');
												$esite_xfn = get_sub_field('btn_xfn_r','option');
												$esite_trget = get_sub_field('btn_target','option');
												$esite_dev = get_sub_field('btn_device','option');
												echo qqlanding_btn_entersite($esite_type,$esite_link,$esite_img,$esite_txt,$esite_xfn,$esite_trget,$esite_dev);

											endwhile;
										endif;
									?>
								</div>
								<?php if ( $slider_post == 'right' ): ?>
									<div class="<?php echo ( $format == 'image' ) ?  $hide_mob : ''; ?> col-12 col-lg-6 text-white align-self-center align-items-center">
										<?php if ( $format == 'image' ): 
											echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider');
										else:
											//var_dump($video);
											echo fpv_video_settings($video, 'video');
										endif ?>
									</div>
								<?php endif; //rigth?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<div class="no-slider full-wh">
				<div class="full-wrap">
					<p class="h3 text-center bold <?php echo qqlanding_text_color($layout); ?>">No Slider Available</p>
				</div>
			</div>
		<?php endif; ?>
	<?php else: ?>
		<div id="banner-slider">
			<?php 
			$animation = get_field( 'slider_animations_group', 'option' );
			if ( $animation ):
				$fade = ( $animation['slider_animation_fade'] === true ) ? 'carousel-fade' : ''; 
			endif; ?>
			<?php if ( have_rows('slider_appearance_group', 'options') ): the_row();
					$autoplay = ( $slider_app['slider_autoplay'] == true ) ? '' : 'data-interval="false"'; /*--autoplay*/
					$dots = $slider_app['slider_nav_dots']; /*--Dots*/
					$nav = $slider_app['slider_arrows']; /*--Nav*/
				?>
				<div id="carousel" class="carousel slide <?php echo $fade; ?>" data-ride="carousel" <?php echo $autoplay; ?> >
					<!--Indicators-->
					<?php if ( $dots == true): ?>
						<ol class="carousel-indicators">
							<?php if ( have_rows( 'slider_item_r', 'option' ) ): $count = 0; ?>
								<?php while ( have_rows( 'slider_item_r', 'option' ) ): the_row();
									$active = ( $count == 0 ) ? 'class="active"': '';
									?>
									<li data-target="#carousel" data-slide-to="<?php echo $count; ?>" <?php echo $active; ?>></li>
								<?php $count++; endwhile; ?>
							<?php endif; ?>
						</ol>
					<?php endif; ?>
					<!--/.Indicators-->
					<div class="carousel-inner">
						<?php if ( have_rows( 'slider_item_r', 'option' ) ): $count = 0;?>
							<?php while ( have_rows( 'slider_item_r', 'option' ) ): the_row();
								$active = ( $count == 0 ) ? 'active': '';
								$filters = get_field( 'filter_fields', 'option' );
								$filter_class = ( !empty($filters) ) ? 'slider-filter' : '';
								$hide_mob = content_img_hide(get_sub_field('slide_hide_image', 'option'));
								$con_settings = get_sub_field('content_settings', 'option');
								$text_align = $con_settings['slider_text_align'];?>
								<div class="carousel-item slider-views-<?php echo $count; ?> <?php echo $active; ?> <?php echo $filter_class; ?>">
									<div class="carousel-caption container">
										<?php if ( $con_settings['slider_content_size'] == 'full' ): ?>
											<div class="col-12 col-md-12 col-lg-12 text-white">
												<?php
													echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'));
													if (have_rows('enter_site_button','option')) :
														while (have_rows('enter_site_button','option')) : the_row();
															$esite_type = get_sub_field('btn_type','option');
															$esite_link = get_sub_field('btn_link','option');
															$esite_img = get_sub_field('btn_image','option');
															$esite_txt = get_sub_field('btn_text','option');
															$esite_xfn = get_sub_field('btn_xfn_r','option');
															$esite_trget = get_sub_field('btn_target','option');
															$esite_dev = get_sub_field('btn_device','option');

															echo qqlanding_btn_entersite($esite_type,$esite_link,$esite_img,$esite_txt,$esite_xfn,$esite_trget,$esite_dev);
														endwhile;
													endif;
												?>
											</div>
										<?php else: ?>
											<div class="row d-flex">
												<?php $slider_post = $con_settings['slider_content_position']; ?>
												<?php if ( $slider_post == 'left' ): ?>
													<div class="<?php echo $hide_mob; ?> col-12 col-lg-6 text-white align-self-center">
														<?php echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider'); ?>
													</div>
												<?php endif;?>
												<div class="col-12 col-lg-6 text-white align-self-center">
													<?php
														echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'));
														if (have_rows('enter_site_button','option')) :
															while (have_rows('enter_site_button','option')) : the_row();

																$esite_type = get_sub_field('btn_type','option');
																$esite_link = get_sub_field('btn_link','option');
																$esite_img = get_sub_field('btn_image','option');
																$esite_txt = get_sub_field('btn_text','option');
																$esite_xfn = get_sub_field('btn_xfn_r','option');
																$esite_trget = get_sub_field('btn_target','option');
																$esite_dev = get_sub_field('btn_device','option');
																echo qqlanding_btn_entersite($esite_type,$esite_link,$esite_img,$esite_txt,$esite_xfn,$esite_trget,$esite_dev);

															endwhile;
														endif;
													?>
												</div>
												<?php if ( $slider_post == 'right' ): ?>
													<div class="<?php echo $hide_mob; ?> col-12 col-lg-6 text-white align-self-center">
														<?php echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider'); ?>
													</div>
												<?php endif;?>
											</div>
										<?php endif; ?>
									</div>
								</div>
								
							<?php $count++; endwhile; ?>
						<?php else: ?>
							<div class="no-slider full-wh">
								<div class="full-wrap">
									<p class="h3 text-center bold <?php echo qqlanding_text_color($layout); ?>">No Slider Available</p>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<?php if ( $nav == true ): ?>
						<!--.Controls-->
						<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<!--/.Controls-->
					<?php endif; ?>
				</div>
			<?php endif; //end of slider appearance ?>
		</div>
	<?php endif; //end of slider layout ?>
	<?php if ( empty( get_field('slider_item_static','option') ) ) : ?>
		<div id="banner-no-item">
			<div class="text-center">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default/slider-default.jpg">
				<div class="slider-img-overlay">
					<h5>No item found.</h5>
					<p>It's seems that you need to have a hero section, why not try to create a new one <a href="<?php echo home_url( '/' ); ?>wp-admin/admin.php?page=acf-options-slider">click here</a></p>
				</div>
			</div>
		</div>
	<?php endif; //end of default ?>
</section>
<?php endif;?>