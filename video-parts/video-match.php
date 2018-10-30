<?php
$disable = get_field( 'vm_match_enable_section', 'option' ); //Content Enable/Disable
if ( acf_selective_refresh($disable) ) return $disable = false;
if ($disable) : ?>
	<section id="matchWrap" class="py-5">
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
				<?php if ( $match_a->have_posts() ) : ?>
					<div class="col-12 col-lg-6">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_a->have_posts()) : $match_a->the_post(); ?>
								<tr>
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
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_b->have_posts()) : $match_b->the_post(); ?>
								<tr>
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