<?php
if ( ! defined( 'ABSPATH' ) ) die;
//$layout = get_field( 'th_color_scheme', 'option' );
$disable = get_field( 'slider_enable_sections', 'option' );
$slider_app = get_field('slider_appearance_group', 'option');
$animation = get_field('slider_animations_group', 'option');
$skew_opt = get_field('slider_skew', 'option');
$heading_settings = get_field('slider_heading_settings', 'option');

if ( acf_selective_refresh($disable) ) return $disable = false;

if ($disable) : ?>
<?php
	$args = array(
		'post_type'			=> 'slider',
		'post_status'		=> array( 'post','publish' ),
	);
	$newSlider = new WP_Query($args);
	if ( $newSlider->have_posts() ) :  ?>
		<section id="banner">
			<?php if ( $animation ) : $fade = ( $animation['slider_animation_fade'] === true ) ? 'carousel-fade' : ''; endif;
			if ( $slider_app ) {
				$autoplay = ( $slider_app['slider_autoplay'] == true ) ? '' : 'data-interval="false"'; /*--autoplay*/
				$dots = $slider_app['slider_nav_dots']; /*--Dots*/
				$nav = $slider_app['slider_arrows']; /*--Nav*/
			}
			?>
			<div id="banner-static" class="carousel slide <?php echo ( $skew_opt == true )? 'banner-skew ' : ''; echo $fade; ?>" data-ride="carousel" <?php echo $autoplay; ?>>
				<div class="carousel-inner">
				<?php while ( $newSlider->have_posts() ) : $newSlider->the_post(); 
					if ( have_rows('slider_item') ) : $count = 1;
						if ( function_exists('pll_register_string') ) {
							$language = wp_get_post_terms( $post->ID, 'language' )[0]->slug;
						}else{
							$language = 'en';
						} ?>

						<?php if( $dots == true ) : $item = 0; ?>
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
							$filters = get_sub_field('filter_fields');
							$filter_class = ( !empty($filters) ) ? 'slider-filters': '';
							// 	'class'			=> 'py-5 sec-entry-title m-0 text-center'
							?>
							<?php if ( $con_settings['slider_content_size'] == 'full' ): ?>
								<div class="carousel-item sliders-country-<?php echo $language;?> slider-views-<?php echo $count; ?> <?php echo ( $count <= 1 ) ? 'active' : ''; ?>" style="overflow:hidden;">
									<div class="container"><!--col-12-col-md-12-col-lg-12-->
										<?php echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'), $heading_settings);
											if (have_rows('enter_site_button')) :
												while (have_rows('enter_site_button')) : the_row();
													$btn_args = array(
														'type' => get_sub_field('btn_type'),
														'link' => get_sub_field('btn_link'),
														'image' => get_sub_field('btn_image'),
														'text' => get_sub_field('btn_text'),
														'xfn' => get_sub_field('btn_xfn_r'),
														'target' => get_sub_field('btn_target'),
														'device' => get_sub_field('btn_device'),
														'class' => get_sub_field('btn_custom_class'),
														'id' => get_sub_field('btn_custom_id')
													);
													echo qqlanding_btn_entersite( $btn_args );
												endwhile;
											endif; ?>
									</div>
								</div><!--Full-width-->
							<?php else: ?>
								<div class="carousel-item  sliders-country-<?php echo $language;?> slider-views-<?php echo $count; ?> <?php echo ( $count <= 1 ) ? 'active' : ''; ?>" style="overflow:hidden;">
									<?php echo ( ! empty($filter_class) ) ? '<div class="slider-filters"></div>' : ''; ?>
									<div class="banner-static-content container d-flex">
										<div class="row">
											<?php $slider_post = $con_settings['slider_content_position']; ?>
											<?php if ( $slider_post == 'left' ): ?>
												<div class="<?php echo $hide_mob ; ?> col-12 col-lg-6  align-self-center align-items-center">
													<?php if ( $format == 'image' ): ?>
														<?php echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider'); ?>
													<?php else: 
														echo fpv_video_settings($video, 'video');
													endif ?>
												</div>
											<?php endif; //left?>
											<div class="col-12 col-lg-6 align-self-center align-items-center">
												<?php echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'), $heading_settings);
													if (have_rows('enter_site_button')) :
														while (have_rows('enter_site_button')) : the_row();
															$btn_args = array(
																'type' => get_sub_field('btn_type'),
																'link' => get_sub_field('btn_link'),
																'image' => get_sub_field('btn_image'),
																'text' => get_sub_field('btn_text'),
																'xfn' => get_sub_field('btn_xfn_r'),
																'target' => get_sub_field('btn_target'),
																'device' => get_sub_field('btn_device'),
																'class' => get_sub_field('btn_custom_class'),
																'id' => get_sub_field('btn_custom_id')
															);
															echo qqlanding_btn_entersite( $btn_args );
														endwhile;
													endif; ?>
											</div>
											<?php if ( $slider_post == 'right' ): ?>
												<div class="<?php echo $hide_mob; ?> col-12 col-lg-6 text-white align-self-center align-items-center">
													<?php if ( $format == 'image' ): 
														echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider');
													else:
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
					<?php if( $nav == true ) : ?>
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
		</section>
	<?php endif; ?>
<?php endif;?>