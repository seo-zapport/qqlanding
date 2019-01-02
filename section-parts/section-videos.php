<?php
$disable = get_field( 'video_enable_section', 'option' ); //Content Enable/Disable
$heading_settings = get_field( 'video_header_settings', 'option' ); //Content Enable/Disable
$card_settings = get_field( 'video_cards_settings', 'option' ); //Card Setting
$load_class = $card_settings['_load_class']; //Buttons

if ( acf_selective_refresh($disable) ) return $disable = false;
if ( function_exists( 'run_aiovg' ) && $disable ) : ?>
<section id="videoWrap" class="py-5">
	<div class="container">
	<?php if (! empty( get_field('video_title', 'option') ) ) echo acf_the_header_tag_injection( get_field('video_title', 'option'), $heading_settings );
		$args = array(
			'post_type'			=> 'aiovg_videos',
			'post_status'		=> 'publish',
			'posts_per_page'	=> 6,
		);
		$video = new WP_Query($args);
		if ( $video->have_posts() ):
			$counter = 0;
			while ( $video->have_posts() ) : $video->the_post();
			$counter++;
			endwhile;
		endif;
		if ( $video->have_posts() ) : $checker = 1; ?>
			<!-- Start of Embeded Videos -->
			<div class="row aritcle-content-img mb-5" id="appendItem">
				<?php while( $video->have_posts() ) : $video->the_post();
					if ( $checker <= 6 ) :
				    	if ( $counter > 1 && $counter < 3) {
				    		$grid_class = 'col-md-6 col-xl-6';
				    		$card_class = 'vgrid-2';
				    	}else if ($counter >= 3) {
				    		$grid_class = 'col-md-4 col-xl-4';
				    		$card_class = 'vgrid-3';
				    	}else{
				    		$grid_class = '';
				    		$card_class = 'vgrid-1';
				    	} ?>
						<div class="col-12 <?php echo $grid_class; ?> mb-4">
							<!-- <div class="row"> -->
							<div class="vid-card <?php echo $card_class; ?>">
								<div class="vid-img-wrap">
									<a href="<?php echo get_the_permalink(); ?>" rel="nofollow" target="_blank">
										<span id="vid-oflow"><i class="far fa-play-circle fa-7x"></i></span>
										<?php
										$image = get_post_meta( get_the_ID() , 'image', true );
										if ( $image ) :
											//the_post_thumbnail( 'fp-featured', array('class' => 'img-fluid vid-img') ); ?>
											<img src="<?php echo $image; ?>" class="img-fluid vid-img">
										<?php else : ?>
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
										<?php if ( $card_settings['_showhide_time'] == true ): ?>
											<span class="vid-clock"><i class="far fa-clock"></i><small class="muted"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></small></span>
										<?php endif; ?>
										<?php if ( $card_settings['_showhide_views'] == true ): ?>
											<span class="float-right vid-views"><i class="fa fa-eye" aria-hidden="true"></i>
											<?php $view_count = get_post_meta( get_the_ID(), 'views', true ); printf(__( '%d','qqlanding' ), $view_count ); ?></span>
										<?php endif; ?>
									</div>
								</div>
						
							</div>
						</div>
					<?php endif;
					$checker++;
				endwhile;
				wp_reset_postdata(); ?>
			</div><!-- End of Embeded Videos -->
			<?php if ( $counter >= 6 ): ?>
				<div class="col-12 d-block text-center mb-5 px-0">
					<button id="qqlandingLoadMoreVideo" class="btn btn-block btn-lg <?php echo ( $load_class == 'custom' ) ? $card_settings['_load_custom_class'] : 'btn-' . $load_class; ?>">Load more</button>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<p class="text-center text-white">No Videos Available</p>
		<?php endif; ?> 
	</div>
</section>
<?php endif; ?>