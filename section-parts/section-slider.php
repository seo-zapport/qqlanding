<?php
if ( ! defined( 'ABSPATH' ) ) die;
$disable = get_field('slider_enable_section', 'option' );
$layout = get_field( 'th_color_scheme', 'option' );
$slider_layout = get_option('layout');
$skew_opt = get_option('slider_skew');
$fade = ( get_option('fade') == 1 ) ? ' carousel-fade' : ''; /*--fade*/
$autoplay = ( get_option('autoplay') == 1 ) ? '' : 'data-interval="false"'; /*--autoplay*/

if ( acf_selective_refresh($disable) ) return $disable = false;
if ($disable) : ?>
<section id="banner">
	<?php
		$args = array(
			'post_type'			=> 'slider',
			'post_status'		=> array( 'post','publish' ),
		);
		$newSlider = new WP_Query($args);
		if ( $newSlider->have_posts() ) : ?>
			<div id="banner-static" class="carousel carousel-fade slide <?php echo ( $skew_opt == 1 )? 'banner-skew' : ''; echo $fade; ?>" data-ride="carousel" <?php echo $autoplay; ?>>
				<div class="carousel-inner">
				<?php while ( $newSlider->have_posts() ) : $newSlider->the_post(); 
					if ( have_rows('slider_item') ) : $count = 1;
						$language = wp_get_post_terms( $post->ID, 'language' )[0]->slug; ?>

						<?php if( $slider_layout === 'slider' && get_option( 'dots' ) == 1 ) : $item = 0; ?>
							<ol class="carousel-indicators">
								<?php while( have_rows('slider_item') ) : the_row();
									$active = ( $item == 0 ) ? 'class="active"': '';
									?>
								<li data-target="#banner-static" data-slide-to="<?php echo $item; ?>" <?php echo $active; ?>></li>
								<?php $item++;  endwhile; ?>
							</ol>
						<?php endif; /*-/.Indicators*/?>

						<?php while( have_rows('slider_item') ) : the_row();
							$con_settings = get_sub_field('content_settings');
							$hide_mob = content_img_hide(get_sub_field('slide_hide_image'));
							$format = get_sub_field('content_format_type');
							$video = get_sub_field('content_slider_video');
							?>
							<?php if ( $con_settings['slider_content_size'] == 'full' ): ?>
								<div class="carousel-item slider-views-<?php echo $count; ?> <?php echo ( $count <= 1 ) ? 'active' : ''; ?>">
									<div class="col-12 col-md-12 col-lg-12">
										<?php echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images')) ; ?>
									</div>
								</div><!--Full-width-->
							<?php else: ?>
								<div class="carousel-item sliders-country-<?php echo $language; ?> slider-views-<?php echo $count; ?> <?php echo ( $count <= 1 ) ? 'active' : ''; ?>">
									<div class="banner-static-content container d-flex">
										<div class="row">
											<?php $slider_post = $con_settings['slider_content_position']; ?>
											<?php if ( $slider_post == 'left' ): ?>
												<div class="<?php echo ( $format == 'image' ) ?  $hide_mob : ''; ?> col-12 col-lg-6  align-self-center align-items-center">
													<?php if ( $format == 'image' ): ?>
														<?php echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider'); ?>
													<?php else: 
														echo fpv_video_settings($video, 'video');
													endif ?>
												</div>
											<?php endif; //left?>
											<div class="col-12 col-lg-6 align-self-center align-items-center">
												<?php echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'));
													if (have_rows('enter_site_button')) :
														while (have_rows('enter_site_button')) : the_row();

															$esite_type = get_sub_field('btn_type');
															$esite_link = get_sub_field('btn_link');
															$esite_img = get_sub_field('btn_image');
															$esite_txt = get_sub_field('btn_text');
															$esite_xfn = get_sub_field('btn_xfn_r');
															$esite_trget = get_sub_field('btn_target');
															$esite_dev = get_sub_field('btn_device');
															echo qqlanding_btn_entersite($esite_type,$esite_link,$esite_img,$esite_txt,$esite_xfn,$esite_trget,$esite_dev);

														endwhile;
													endif; ?>
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
											<?php endif; //left?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php $count++;  endwhile;
					endif; //Start of acf-repeater ?>
					<?php if( $slider_layout === 'slider' && get_option( 'arrows' ) == 1 ) : ?>
					<!--.Controls-->
					  <a class="carousel-control-prev" href="#banner-static" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#banner-static" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					<!--/.Controls-->
					<?php endif; ?>
				<?php endwhile;
				wp_reset_postdata();?>
				</div>
			</div>
		<?php endif; ?>
</section>
<?php endif;?>