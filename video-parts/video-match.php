<?php
$disable = get_field( 'vm_match_enable_section', 'option' ); //Content Enable/Disable
if ( acf_selective_refresh($disable) ) return $disable = false;
if ($disable) : ?>
	<section id="matchWrap" class="py-5">
		<div id="matchTimerWrap" class="mb-3 container">
			<h2 id="matchTitle" class="text-center col-12 match-entry-title">Next Match Countdown</h2>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-6  d-md-flex d-lg-flex">
					<div class="col-12 col-md-3 col-lg-3 px-0">
						<figure class="matchLogoWrap">
							<img src="<?php echo esc_attr( get_option( 'match_logo_a' ) ); ?>" class="m-auto">
						</figure>
					</div>
					<div class="col-12 col-md-9 col-lg-9 px-0">
						<h3 class="match-entry-title match-italic"><?php echo get_option( 'match_title_a' ); ?></h3>
						<span id="dateAStrtoInteger" data-dateA="<?php echo strtotime(get_option( 'match_date_a' )); ?>"></span>
						<div id="timeWRapA">
							<?php //echo get_option( 'match_date_a' ); ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-6  d-md-flex d-lg-flex">
					<div class="col-12 col-md-9 col-lg-9 px-0">
						<h3 class="match-entry-title match-italic"><?php echo get_option( 'match_title_b' ); ?></h3>
						<span id="dateBStrtoInteger" data-dateB="<?php echo strtotime(get_option( 'match_date_b' )); ?>"></span>
						<div id="timeWRapB">
							<?php echo get_option( 'match_date_b' ); ?>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3 px-0">
						<figure class="matchLogoWrap">
							<img src="<?php echo esc_attr( get_option( 'match_logo_b' ) ); ?>" class="m-auto">
						</figure>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<?php 
			$match_args_a = array(
				'post_type' 		=> 'qqlanding-matches',
				'post_status'		=> 'post',
				'posts_per_page'	=> 6,
				'meta_key'			=>  '_type_matches_key',
				'meta_value'		=>  'match_a',
				'meta_compare' 		=> '=',
			);
			$match_args_b = array(
				'post_type' 		=> 'qqlanding-matches',
				'post_status'		=> 'post',
				'posts_per_page'	=> 6,
				'meta_key'			=>  '_type_matches_key',
				'meta_value'		=>  'match_b',
				'meta_compare' 		=> '=',
			);
			$match_a = new WP_Query($match_args_a);
			$match_b = new WP_Query($match_args_b);?>
			<div class="row mb-4">
				<h2 class="text-center col-12 match-entry-title">Date of away match as below (2018-2019)</h2>
				<?php if ( $match_a->have_posts() ) : ?>
					<div class="col-12 col-lg-6">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th scope="col">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_a->have_posts()) : $match_a->the_post(); ?>
								<tr class="text-center text-white">
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_date_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_home_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_away_matches_key', true ) ); ?></td>
								</tr>
								<?php endwhile;
				    			wp_reset_postdata(); ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Match A end ?>
				<?php if ($match_b->have_posts()) : ?>
					<div class="col-12 col-lg-6">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th scope="col">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_b->have_posts()) : $match_b->the_post(); ?>
								<tr class="text-center text-white">
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_date_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_home_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_away_matches_key', true ) ); ?></td>
								</tr>
								<?php endwhile;
				    			wp_reset_postdata(); ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Match B end ?>
			</div>
			<!-- Start of Embeded Videos -->
		</div>
	</section>
<?php endif; ?>