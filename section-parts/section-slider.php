<?php
// Section Slider
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) die;
$layout = get_field( 'th_color_scheme', 'option' );
$slider_layout = get_field('slider_layout', 'options');
$slider_app = get_field('slider_appearance_group', 'options');

?>

<<<<<<< HEAD
=======
<section id="banner">
<?php
	if(get_field('slider_layout', 'options') == "static") {
?>
	<div id="banner-static" >	
		<div id="banner-static-feature" class="site-content container">
				<div class="banner-static-content">	
					<?php if( have_rows('slider_item_r', 'option') ): the_row(); 
<<<<<<< HEAD
						
							$hidemob = content_img_hide(get_sub_field('slide_hide_image'));
					?>
=======
							$hidemob = content_img_hide(get_sub_field('slide_hide_image'));?>
>>>>>>> 6bdf7dd5a92ee5341e7e29bfd804b45be29e3ddc


						<?php if(get_sub_field('content_settings')['slider_content_size'] == 'full' ): ?>
						
								<div class="col-xs-12 col-sm-12 col-md-12 text-white">

								<?php echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images')); ?>
								
								<?php echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); ?>

								</div>
						
						<?php else: ?>

							<div class="row">
							<div class="<?php if(get_sub_field('content_settings')['slider_content_position'] == "left"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
								<?php 
									if(get_sub_field('content_settings')['slider_content_position'] == "left"):	
											echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider');
									else:
											 echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'));
											 echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); 
>>>>>>> 3a8908a5fda9e5f3ffdeffcdccf2b751aebe19da

<section id="banner">
	<?php if ( $slider_layout == 'static' ): ?>
		<?php if (  have_rows('slider_item_static','option') ) : ?>
			<?php while ( have_rows('slider_item_static','option') ): the_row();
				$filters = get_field( 'filter_fields', 'option' );
				$hide_mob = content_img_hide(get_sub_field('slide_hide_image', 'option'));
				$con_settings = get_sub_field('content_settings', 'option');
				$text_align = $con_settings['slider_text_align'];
				switch ($text_align) {
					case 'center': $txt_class = 'center';break;
					case 'right': $txt_class = 'right';break;
					default: $txt_class = 'left';break;
				}
				if ( ! empty($filters) ): ?>
					<div class="slider-filters"></div>
				<?php endif; ?>

				<div id="banner-static">
					<div class="banner-static-content container text-<?php echo $txt_class; ?>">
						<?php if ( $con_settings['slider_content_size'] == 'full' ): ?>
							<div class="col-12 col-md-12 col-lg-12 text-white">
								<?php
									echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content')); 
									if (have_rows('enter_site_button','option')) :
										while (have_rows('enter_site_button','option')) : the_row();
											$esite_type = get_sub_field('btn_type','option');
											$esite_link = get_sub_field('btn_link','option');
											$esite_img = get_sub_field('btn_image','option');
											$esite_txt = get_sub_field('btn_text','option');
											$esite_xfn = get_sub_field('btn_xfn','option');
											$esite_trget = get_sub_field('btn_target','option');
											$esite_dev = get_sub_field('btn_device','option');

											echo qqlanding_btn_entersite($esite_type,$esite_link,$esite_img,$esite_txt,$esite_xfn,$esite_trget,$esite_dev);
										endwhile;
									endif;
								?>
							</div>
<<<<<<< HEAD
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
										echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'));
										if (have_rows('enter_site_button','option')) :
											while (have_rows('enter_site_button','option')) : the_row();

												$esite_type = get_sub_field('btn_type','option');
												$esite_link = get_sub_field('btn_link','option');
												$esite_img = get_sub_field('btn_image','option');
												$esite_txt = get_sub_field('btn_text','option');
												$esite_xfn = get_sub_field('btn_xfn','option');
												$esite_trget = get_sub_field('btn_target','option');
												$esite_dev = get_sub_field('btn_device','option');
												echo qqlanding_btn_entersite($esite_type,$esite_link,$esite_img,$esite_txt,$esite_xfn,$esite_trget,$esite_dev);

											endwhile;
										endif;
=======
							<div class="<?php if(get_sub_field('content_settings')['slider_content_position'] == "right"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
									<?php 
										if(get_sub_field('content_settings')['slider_content_position'] == "left"):	
												 echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'banner',get_sub_field('content_slider_images'));
												 echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); 
										else:
												echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider');
										endif; 
>>>>>>> 3a8908a5fda9e5f3ffdeffcdccf2b751aebe19da
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
													echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content')); 
													if (have_rows('enter_site_button','option')) :
														while (have_rows('enter_site_button','option')) : the_row();
															$esite_type = get_sub_field('btn_type','option');
															$esite_link = get_sub_field('btn_link','option');
															$esite_img = get_sub_field('btn_image','option');
															$esite_txt = get_sub_field('btn_text','option');
															$esite_xfn = get_sub_field('btn_xfn','option');
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
														echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'));
														if (have_rows('enter_site_button','option')) :
															while (have_rows('enter_site_button','option')) : the_row();

																$esite_type = get_sub_field('btn_type','option');
																$esite_link = get_sub_field('btn_link','option');
																$esite_img = get_sub_field('btn_image','option');
																$esite_txt = get_sub_field('btn_text','option');
																$esite_xfn = get_sub_field('btn_xfn','option');
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
<<<<<<< HEAD
	<?php endif; //end of slider layout ?>
</section>
=======
	</div>
<?php 
	}elseif(get_field('slider_layout', 'options') == "slider"){		
?>
	<div id="banner-slider">

		<?php 
			if(have_rows('slider_animations_group','option')) : the_row(); 
				if(get_sub_field('slider_animation_fade') == "Yes"): 
					$fade = "carousel-fade";
				else:
					$fade = "";
				endif;
			endif;

		?>
		<?php  if(have_rows('slider_appearance_group','option')) : the_row(); 
		?>
		<!--Carousel Wrapper-->
		<div id="carousel" class="carousel slide <?php echo $fade; ?>" data-ride="carousel" <?php if(get_sub_field('slider_autoplay') != "Yes"): echo 'data-interval="false"'; endif; ?> >	
		    <?php if(get_sub_field('slider_nav_dots') == "Yes"): ?>
		    <!--Indicators-->
		    <ol class="carousel-indicators">	
		       	<?php 
					$count = "0";
					if( have_rows('slider_item_r', 'option') ): 
						while ( have_rows( 'slider_item_r', 'option' ) ) : the_row(); 
				?>
		        <li data-target="#carousel" data-slide-to="<?php echo $count; ?>"  <?php if($count=="0"){ echo " class='active'"; } ?>></li>
				<?php 
						$count++;
					endwhile;
				endif; ?>
		    </ol>
		    <!--/.Indicators-->
		    <?php 
		    	endif;  
		    ?>
		    <!--Slides-->
		    <div class="carousel-inner" role="listbox">
				<?php 
					$count = "0";
					if( have_rows('slider_item_r', 'option') ): 
						while ( have_rows( 'slider_item_r', 'option' ) ) : the_row(); 
						$background = get_sub_field('slide_image');	
						$hidemob = content_img_hide(get_sub_field('slide_hide_image'));

				?>
		       
		         <?php if(get_sub_field('content_settings')['slider_content_size'] == 'full' ): ?>


		        <div class="carousel-item<?php if($count == '0'){echo ' active';}else{echo '';} ?> view-<?php echo $count; ?>">
		            <div class="carousel-caption caro-slide-<?php echo $count; ?>">
		               	<div class="col-xs-12 col-sm-12 col-md-12 text-white">
								<?php echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'slide-'.$count,get_sub_field('content_slider_images')); ?>
								<?php echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); ?>
						</div>
		            </div>
		        </div>

			
				<?php else: ?>

				<div class="carousel-item<?php if($count == '0'){echo ' active';}else{echo '';} ?> view-<?php echo $count; ?>">
				    <div class="carousel-caption caro-slide-<?php echo $count; ?>">
				    	<div class="row">
				    	<div class="<?php if(get_sub_field('content_settings')['slider_content_position'] == "left"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
				    		<?php 
				    			if(get_sub_field('content_settings')['slider_content_position'] == "left"):	
				    					echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider');
				    			else:
				    					 echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'slide-'.$count,get_sub_field('content_slider_images'));
				    					 echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); 

				    			endif; 
				    		?>

				    	</div>
				    	<div class="<?php if(get_sub_field('content_settings')['slider_content_position'] == "right"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
				    			<?php 
				    				if(get_sub_field('content_settings')['slider_content_position'] == "left"):	
				    						 echo fpcontent_content_position(get_sub_field('slider_title'),get_sub_field('slider_content'),'slide-'.$count,get_sub_field('content_slider_images'));
				    						 echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); 
				    				else:
				    						echo fpcontent_img_position(get_sub_field('content_slider_images'),'slider');
				    				endif; 
				    			?>
				    	</div>
				    	</div>
				    </div>
				</div>    	
				<?php endif ?>



				<?php 
						$count++;
					endwhile;
				endif; ?>
		    </div>
		    <!--/.Slides-->
			<?php if(get_sub_field('slider_arrows') == "Yes"): ?>
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
		    <?php
		    	endif;  
		    ?>
		</div>
		<!--/.Carousel Wrapper-->	
	   	 <?php endif;  ?>
	</div>
<?php 
	}//end of if statement of slider layout
?>
</section>

>>>>>>> 3a8908a5fda9e5f3ffdeffcdccf2b751aebe19da
