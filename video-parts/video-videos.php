<?php
$disable = get_field( 'vm_match_enable_section', 'option' ); //Content Enable/Disable
if ( acf_selective_refresh($disable) ) return $disable = false;
if ($disable) : ?>
	<section id="videoWrap" class="py-5">
		<div class="container">
			<!-- Start of Embeded Videos -->
			<div class="row aritcle-content-img mb-5" id="appendItem">
			<?php
				$args = array(
					'post_type'			=> 'video',
					'post_status'		=> 'post',
					'posts_per_page'	=> 3,
				);
				$video = new WP_Query($args);

				if ( $video->have_posts() ):
					$counter = 0;
					while ( $video->have_posts() ) : $video->the_post();
					$counter++;
					endwhile;
				endif;
				//if ( $counter > 1 ):
					// check if the repeater field has rows of data
					if ( $video->have_posts() ): $checker = 1;

					 	// loop through the rows of data
					    while ( $video->have_posts() ) : $video->the_post();
					    	if ( $checker <= 6 ) :
						    		# code...
						    	if ( $counter > 1 && $counter < 3) {
						    		$grid_class = 'col-md-6 col-xl-6';
						    		$card_class = 'vgrid-2';
						    	}else if ($counter >= 3) {
						    		$grid_class = 'col-md-4 col-xl-4';
						    		$card_class = 'vgrid-3';
						    	}else{
						    		$grid_class = '';
						    		$card_class = 'vgrid-1';
						    	}
					    	?>
								<div class="col-12 <?php /*echo ( $counter > 1 ) ? 'col-12 col-xl-4' : 'col-12 col-xl-12';*/ echo $grid_class; ?> mb-4">
									<!-- <div class="row"> -->
									<div class="vid-card <?php echo $card_class; ?>">
										<div class="vid-img-wrap">
											<a href="<?php echo get_the_permalink(); ?>" rel="nofollow" target="_blank">
												<span id="vid-oflow"><i class="far fa-play-circle fa-7x"></i></span>
												<?php if ( has_post_thumbnail()) :
													the_post_thumbnail( 'fp-featured', array('class' => 'img-fluid vid-img') );
												else : ?>
													<img src="<?php echo get_first_image(); ?>" class="img-fluid vid-img">
												<?php endif; ?>
											</a>
										</div>
										<div class="position-absolute w-100 vid-pos-abs">
											<div class="vid-body">
												<h3 class="vid-title"><a href="<?php echo get_the_permalink(); ?>" rel="nofollow" target="_blank"><?php the_title(); ?></a></h3>
												<?php //echo custom_field_excerpt(); ?>
											</div>
											<div class="vid-footer">
												<i class="far fa-clock"></i><small class="muted"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></small>
											</div>
										</div>
								
									</div>
								</div>
					    <?php
						endif; //checker
					    $checker++;
					endwhile;
   	 				wp_reset_postdata(); ?>
					<div class="col-12 d-block text-center mb-5">
						<button id="qqlandingLoadMoreVideo" class="btn btn-block btn-lg btn-danger">Please Load new Things here</button>
					</div>
				<?php endif; ?>
			</div><!-- End of Embeded Videos -->
		</div>
	</section>
<?php endif; ?>