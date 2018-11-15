<?php
$disable = get_field( 'vm_match_enable_section', 'option' ); //Content Enable/Disable
if ( acf_selective_refresh($disable) ) return $disable = false;
$current_date = date( 'Y-m-d' );

/*-Group-A--**/
$get_item_a = array(
	'post_type'			=> 'qqlanding-matches',
	'post_status'		=> array( 'post','publish' ),
	'posts_per_page'	=> 1,
	'meta_query'		=> array(
		array(
			'relation'	=> 'OR',
			array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '=='),
			'upcoming_date_a' => array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '>' ),
		),
		array( 'key' => '_type_matches_key','value' => 'match_a','compare' => '==')
	),
	'orderby'			=> 'upcoming_date_a',
	'order'				=> 'ASC'
);
/*-Group-B--**/
$get_item_b = array(
	'post_type'		=> 'qqlanding-matches',
	'post_status'	=> array( 'post','publish' ),
	'posts_per_page'	=> 1,
	'meta_query'	=> array(
		array(
			'relation'	=> 'OR',
			array( 'key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '==' ),
			'upcoming_date_b' => array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '>' ),
		),
		array( 'key' => '_type_matches_key','value' => 'match_b','compare' => '==' )
	),
	'orderby'	=> 'upcoming_date_b',
	'order'		=> 'ASC'
);
/*-Group-C--**/
$get_item_c = array(
	'post_type'			=> 'qqlanding-matches',
	'post_status'		=> array( 'post','publish' ),
	'posts_per_page'	=> 1,
	'meta_query'		=> array(
		array(
			'relation'	=> 'OR',
			array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '==' ),
			'upcoming_date_c' => array('key' => '_date_matches_key','value' => $current_date,'type' => 'date','compare' => '>' ),
		),
		array( 'key' => '_type_matches_key','value' => 'match_c','compare' => '==' )
	),
	'orderby'	=> 'upcoming_date_c',
	'order'		=> 'ASC'
);
$query_match_a = new WP_Query($get_item_a);
$query_match_b = new WP_Query($get_item_b);
$query_match_c = new WP_Query($get_item_c);

if ( empty( $query_match_a->have_posts() ) && ! empty( $query_match_b->have_posts() ) && ! empty( $query_match_c->have_posts() ) ) {
	$container_class = '14x5w';
	$grid_class = 'col-lg-6';
	$grid_timer_class = 'grid-timer-2';
}elseif( ! empty( $query_match_a->have_posts() ) && empty( $query_match_b->have_posts() ) && ! empty( $query_match_c->have_posts() )  ){
	$container_class = '14x5w';
	$grid_class = 'col-lg-6';
	$grid_timer_class = 'grid-timer-2';
}elseif( ! empty( $query_match_a->have_posts() ) && ! empty( $query_match_b->have_posts() ) && empty( $query_match_c->have_posts() )  ){
	$container_class = '14x5w';
	$grid_class = 'col-lg-6';
	$grid_timer_class = 'grid-timer-2';
}else{
	$container_class = '16w';
	$grid_class = 'col-lg-4';
	$grid_timer_class = 'grid-timer-3';
}
if ($disable) : ?>
	<section id="matchWrap" class="py-5">
		<div id="matchTimerWrap" class="mb-3 container container-lg-<?php echo $container_class; ?>">
			<h2 id="matchTitle" class="text-center col-12 match-entry-title">Next Match Countdown</h2>
			<div class="row">
				<?php
					if ( $query_match_a->have_posts() ) {
						while( $query_match_a->have_posts() ) : $query_match_a->the_post();
							$set_new_date_a = get_post_meta(  get_the_ID(), '_date_matches_key', true ); /*get-the-date-in-meta-boxes-*/
							if ( $set_new_date_a == $current_date ) {$class_tags = 'm-0';$class_auto = 'm-auto';$class_col = ''; 
							}elseif($set_new_date_a <= $current_date){$class_tags = 'm-0';$class_auto = 'm-auto';$class_col = '';
							}else{$class_tags = '';$class_auto = '';$class_col = 'd-md-flex d-lg-flex';}
						?>
							<div class="col-12 col-md-12 <?php echo $grid_class . ' ' . $class_col; ?> px-2">
								<div class="col-12 col-md-3 col-lg-3 px-0 <?php echo $class_auto; ?>">
									<figure class="matchLogoWrap <?php echo $class_tags; ?>">
										<img src="<?php echo esc_attr( get_option( 'match_logo_a' ) ); ?>" class="m-auto">
									</figure>
								</div>
								<div class="col-12 col-md-9 col-lg-9 px-0 <?php echo $class_auto; ?>">
									<h3 class="match-entry-title match-italic match-timer-title <?php echo $class_tags; ?>"><?php echo get_option( 'match_title_a' ); ?></h3>
									<?php if ( $set_new_date_a == $current_date ) : ?>
										<p class="text-center text-white mt-1">Today's Match: <span class="match-entry-tdesc font-weight-bold"><?php echo ( ! empty( get_the_title() ) ) ? get_the_title() : ''; ?></span></p>
									<?php elseif ( $set_new_date_a <= $current_date ) : ?>
										<p class="text-center text-white mt-1">No Match Available</p>
									<?php else: ?>
										<span id="dateAStrtoInteger" data-dateA="<?php echo strtotime($set_new_date_a); ?>"></span>
										<div id="timeWRapA" class="<?php echo $grid_timer_class; ?>"></div>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					} /*End-of-Group-A*/

					if ( $query_match_b->have_posts() ) {
						while ( $query_match_b->have_posts() ) : $query_match_b->the_post();

							$set_new_date_b = get_post_meta(  get_the_ID(), '_date_matches_key', true ); /*get-the-date-in-meta-boxes-*/
							if ( $set_new_date_b == $current_date ) {$class_tags_b = 'm-0';$class_auto_b = 'm-auto test today b';$class_col_b = '';
							}elseif($set_new_date_b <= $current_date){$class_tags_b = 'm-0';$class_auto_b = 'm-auto test b';$class_col_b = '';
							}else{$class_tags_b = '';$class_auto_b = '';$class_col_b = 'd-md-flex d-lg-flex';} ?>
							<div class="col-12 col-md-12 <?php echo  $grid_class . ' ' . $class_col_b; ?> px-2">
								<div class="col-12 col-md-3 col-lg-3 px-0 <?php echo $class_auto_b; ?>">
									<figure class="matchLogoWrap <?php echo $class_tags_b; ?>">
										<img src="<?php echo esc_attr( get_option( 'match_logo_b' ) ); ?>" class="m-auto">
									</figure>
								</div>
								<div class="col-12 col-md-9 col-lg-9 px-0 <?php echo $class_auto_b; ?>">
									<h3 class="match-entry-title match-italic match-timer-title <?php echo $class_tags_b; ?>"><?php echo get_option( 'match_title_b' ); ?></h3>
									<?php if ( $set_new_date_b == $current_date ) : ?>
										<p class="text-center text-white mt-1">Today's Match: <span class="match-entry-tdesc font-weight-bold"><?php echo ( ! empty( get_the_title() ) ) ? get_the_title() : ''; ?></span></p>
									<?php elseif ( $set_new_date_b <= $current_date ) : ?>
										<p class="text-center text-white mt-1">No Match Available</p>
									<?php else: ?>
										<span id="dateBStrtoInteger" data-dateB="<?php echo strtotime($set_new_date_b); ?>"></span>
										<div id="timeWRapB" class="<?php echo $grid_timer_class; ?>"></div>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					} /*End-of-Group-B*/

					if ( $query_match_c->have_posts() ) {
						while( $query_match_c->have_posts() ) : $query_match_c->the_post();
							$set_new_date_c = get_post_meta(  get_the_ID(), '_date_matches_key', true ); /*get-the-date-in-meta-boxes-*/
							if ($set_new_date_c == $current_date ) {$class_tags_c = 'm-0';$class_auto_c = 'm-auto test today c';$class_col = '';
							}elseif($set_new_date_c <= $current_date){$class_tags_c = 'm-0';$class_auto_c = 'm-auto test c';$class_col_c = '';
							}else{$class_tags_c = '';$class_auto_c = '';$class_col_c = 'd-md-flex d-lg-flex';} ?>
							<div class="col-12 col-md-12 <?php echo  $grid_class . ' ' . $class_col_c; ?> px-2">
								<div class="col-12 col-md-3 col-lg-3 px-0 <?php echo $class_auto_c; ?>">
									<figure class="matchLogoWrap <?php echo $class_tags_c; ?>">
										<img src="<?php echo esc_attr( get_option( 'match_logo_c' ) ); ?>" class="m-auto">
									</figure>
								</div>
								<div class="col-12 col-md-9 col-lg-9 px-0 <?php echo $class_auto_c; ?>">
									<h3 class="match-entry-title match-italic match-timer-title <?php echo $class_tags_c; ?>"><?php echo get_option( 'match_title_c' ); ?></h3>
									<?php if ( $set_new_date_c == $current_date ) : ?>
										<p class="text-center text-white mt-1">Today's Match: <span class="match-entry-tdesc font-weight-bold"><?php echo ( ! empty( get_the_title() ) ) ? get_the_title() : ''; ?></span></p>
									<?php elseif ( $set_new_date_c <= $current_date ) : ?>
										<p class="text-center text-white mt-1">No Match Available</p>
									<?php else: ?>
										<span id="dateCStrtoInteger" data-dateC="<?php echo strtotime($set_new_date_c); ?>"></span>
										<div id="timeWRapC" class="<?php echo $grid_timer_class; ?>"></div>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					}/*End-of-Group-C*/
				?>
			</div>
		</div>

		<div class="container container-lg-<?php echo $container_class; ?>">
			<?php 
			$match_args_a = array(
				'post_type' 		=> 'qqlanding-matches',
				'post_status'		=> array('post','publish'),
				/*'posts_per_page'	=> 6,*/
				'meta_query'		=> array(
					array(
						'key' => '_type_matches_key',
						'value' => 'match_a',
						'compare' => '==',
					)
				),
				'suppress_filters' 		=> true,
				'orderby'			=> 'date',
				'order'				=> 'ASC',
			);
			$match_list_a = new WP_Query($match_args_a);?>
			<div class="row mb-4">
				<?php if ( $match_list_a->have_posts() ) : ?>
					<div class="col-12 <?php echo $grid_class; ?> px-md-2 px-lg-2">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th scope="col" class="td-w100">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_list_a->have_posts()) : $match_list_a->the_post();
									$set_ndate_a = get_post_meta(  get_the_ID(), '_date_matches_key', true );?>
								<tr class="text-center <?php echo ($set_ndate_a === $current_date) ? 'text-warning' : 'text-white'; ?>">
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_date_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_home_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_away_matches_key', true ) ); ?></td>
								</tr>
								<?php endwhile;
				    			wp_reset_postdata(); ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Match A end 
				$match_args_b = array(
					'post_type' 		=> 'qqlanding-matches',
					'post_status'		=> array('post','publish'),
					'meta_query'		=> array(
						array(
							'key' => '_type_matches_key',
							'value' => 'match_b',
							'compare' => '==',
						)
					),
					'suppress_filters' 		=> true,
					'orderby'			=> 'date',
					'order'				=> 'ASC',
				);
				$match_b = new WP_Query($match_args_b);
				if ( $match_b->have_posts() ) : ?>
					<div class="col-12 <?php echo $grid_class; ?> px-md-2 px-lg-2">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th scope="col" class="td-w100">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_b->have_posts()) : $match_b->the_post();
									$set_ndate_b = get_post_meta(  get_the_ID(), '_date_matches_key', true );?>
								<tr class="text-center <?php echo ($set_ndate_b === $current_date) ? 'text-warning' : 'text-white'; ?>">
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_date_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_home_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_away_matches_key', true ) ); ?></td>
								</tr>
								<?php endwhile;
				    			wp_reset_postdata(); ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Match B end 
				$match_args_c = array(
					'post_type' 		=> 'qqlanding-matches',
					'post_status'		=> array('post','publish'),
					'meta_query'		=> array(
						array(
							'key' => '_type_matches_key',
							'value' => 'match_c',
							'compare' => '=='
						),
					),
					'suppress_filters' 		=> true,
					'orderby'			=> 'date',
					'order'				=> 'ASC',
				);
				$match_c = new WP_Query($match_args_c);
				if ( $match_c->have_posts() ) : ?>
					<div class="col-12 <?php echo $grid_class; ?> px-md-2 px-lg-2">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th scope="col" class="td-w100">Date</th>
									<th scope="col">Home Team</th>
									<th scope="col">Away Team</th>
								</tr>
							</thead>
							<tbody>
								<?php while($match_c->have_posts()) : $match_c->the_post();
									$set_ndate_c = get_post_meta(  get_the_ID(), '_date_matches_key', true );?>
								<tr class="text-center <?php echo ($set_ndate_c === $current_date) ? 'text-warning' : 'text-white'; ?>">
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_date_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_home_matches_key', true ) ); ?></td>
									<td><?php echo esc_attr( get_post_meta( get_the_ID(), '_away_matches_key', true ) ); ?></td>
								</tr>
								<?php endwhile;
				    			wp_reset_postdata(); ?>
							</tbody>
						</table>
					</div>
				<?php endif; //Match C end ?>
			</div>
			<!-- Start of Embeded Videos -->
		</div>
	</section>
<?php endif; ?>