<?php
global $post;
$disable = get_field( 'match_enable_section', 'option' );
$table_settings = get_field( 'table_heading_settings', 'option' );
$columns = get_field('table_columns', 'option');
$order = get_field('table_order', 'option');
$limit = get_field('table_limit', 'option');
$class_col_container = 'col-md-' . floor( 12 / get_field('table_columns', 'option') );
$current_date = date( 'Y-m-d' );

if ( acf_selective_refresh($disable) ) return $disable = false;
if( $disable ): ?>
<section id="matchWrap" class="py-5"itemscope itemtype="http://schema.org/Table">
	<?php echo acf_the_header_tag_injection( get_field('table_header_title', 'option'), $table_settings );
		$timer_args = array(
			'post_type'			=> 'qqlanding-matchx',
			'post_status'		=> 'publish',
			'posts_per_page'	=> (int)$columns,
		);

		$query = new WP_Query($timer_args); ?>
	<?php if ( $query->have_posts() ): ?>
		<div class="mb-3 container container-lg-14x5w">
			<div class="row">
			<?php 
			$timer_count = 0;
			while ( $query->have_posts() ): $query->the_post();

					$display = get_post_meta( get_the_ID(), 'display', true );
					$timer = get_post_meta( get_the_ID(), 'display_timer', true );
					$logo = get_post_meta( get_the_ID(), 'display_timer_logo', true );
					$image = get_post_meta( get_the_ID(), 'image', true );

					if( $timer == 1 && $logo == 0 ){
						//echo 'Timer is on but logo is off';
						$timer_class = 'col-md-12 col-lg-12';
						$logo_class = '';
						
					}else if( $timer == 0 && $logo == 1 ){
						$timer_class = '';
						$logo_class = 'col-md-12 col-lg-12';
						
					}else if( $timer == 1 && $logo == 1 ){
						$timer_class = 'col-md-3 col-lg-3';
						$logo_class = 'col-md-9 col-lg-9';
					}else{
						$timer_class = '';
						$logo_class = '';
					}
				if( $display == 1 || $display == true ) : ?>
					<div class="<?php echo $class_col_container . ' d-md-flex d-lg-flex'; ?>">
						<?php if ( $logo == 1 ): ?>
							<div class="col-12 <?php echo $timer_class; ?> px-0">
								<figure class="matchLogoWrap m-0">
									<img src="<?php echo esc_url( $image ); ?>" alt="" class="m-auto">
								</figure>
								<?php if ( $timer == 0 ): ?>
									<h3 class="match-entry-title match-italic match-timer-title"><?php echo get_the_title(); ?></h3>
								<?php endif; ?>
							</div>
						<?php endif; //LOGO?>

						<?php if ( $timer == 1 ): ?>
							<div class="col-12 <?php echo $logo_class; ?> px-0">
								<h3 class="match-entry-title match-italic match-timer-title"><?php echo get_the_title(); ?></h3>
								<?php
									$repeatable_fields = get_post_meta( get_the_ID(), 'repeatable_fields', true);
									
									foreach ($repeatable_fields as $key => $row) $vc_array_date[$key] = $row['dateMatch'];

									array_multisort($vc_array_date, SORT_ASC, $repeatable_fields);

									$id = '';
									foreach ($repeatable_fields as $value) :
										$new_date = $value['dateMatch'];

										if ($current_date <= $new_date) :
											if ($id != get_the_ID() ) : ?>
												<span id="date_<?php echo $timer_count; ?>_StrtoInteger" data-date="<?php echo strtotime($new_date); ?>"></span>
												<div id="timeWrap_<?php echo $timer_count; ?>" class="grid-timer-2"></div>
											<?php $id = get_the_ID(); //checking the ID of post
											endif;
										endif; //checking the date
									endforeach; //Loop the post meta
								?>
							</div>
						<?php endif; //TIMER?>
					</div>
			<?php endif; //Display in front page
			$timer_count++;
			endwhile;
			wp_reset_postdata(); ?>
			</div>
		</div> <!--/*End-of-Timer-field-->

		<div class="mb-3 container container-lg-16w">
			<div class="row mb-4">
				<?php while ( $query->have_posts() ): $query->the_post();
					$display = get_post_meta( get_the_ID(), 'display', true );
					if( $display == 1 || $display == true ) : ?>
					<div class="<?php echo $class_col_container . ' px-md-2 px-lg-2'; ?>">
						<table class="table table-striped table-custom">
							<thead>
								<tr class="text-center">
									<th scope="col" class="td-w100">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$repeatable_fields = get_post_meta( get_the_ID(), 'repeatable_fields', true);

								foreach ($repeatable_fields as $k => $r) $args_date[$k] = $r['dateMatch'];
								
								array_multisort($args_date, ( $order == 'asc' ) ? SORT_ASC : SORT_DESC , $repeatable_fields);

								$i = 1;
								foreach ($repeatable_fields as $fields): ?>
									<tr class="text-center">
										<td><?php echo $fields['dateMatch']; ?></td>
										<td><?php echo $fields['home']; ?></td>
										<td><?php echo $fields['away']; ?></td>
									</tr>
									<?php if ( $i++ == $limit ) break;?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Display in front page
				endwhile; wp_reset_postdata();  ?>
			</div>
		</div> <!--/*End-of-Table-field-->
	<?php endif; ?>

	<?php /*if ( $table_query->have_posts() ): ?>
	<?php endif; */?>
</section>
<?php endif;