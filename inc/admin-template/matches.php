<?php
/**
 * 
 */

add_action( 'init', 'qqlanding_matches_custom_post_type' );
add_filter( 'manage_qqlanding-matches_posts_columns', 'qqlanding_set_matches_columns' );
add_action( 'manage_qqlanding-matches_posts_custom_column', 'qqlanding_matches_custom_column', 10, 2 );
add_action( 'add_meta_boxes', 'qqlanding_matches_add_meta_box' );
add_action( 'save_post', 'qqlanding_save_matches_data' );

function qqlanding_matches_custom_post_type(){
	$match_args = array(
		'description'		=> '',
		'public'			=> true,
		'show_ui'			=> true,
		'show_in_menu'		=> false,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'supports'			=> array( 'title', 'author' ),
	);
	register_post_type( 'qqlanding-matches', $match_args );
}

function qqlanding_set_matches_columns($columns){
	$newColumns['cb']		= $columns['cb'];
	$newColumns['title']	= __( 'Matches Title', 'qqLanding' );
	$newColumns['home']		= __( 'Home Team', 'qqLanding' );
	$newColumns['away']		= __( 'Away Team', 'qqLanding' );
	$newColumns['type_matches']		= __( 'Matches Type', 'qqLanding' );
	$newColumns['date_matches']		= __( 'Date Matches', 'qqLanding' );
	$newColumns['date']		= __( 'Date', 'qqLanding' );
	return $newColumns;
}

function qqlanding_matches_custom_column($column, $post_id){
	switch ($column) {
		case 'home':
			echo get_post_meta( $post_id, '_home_matches_key', true );
			break;
		case 'away':
			echo get_post_meta( $post_id, '_away_matches_key', true );
			break;
		case 'date_matches':
			echo get_post_meta( $post_id, '_date_matches_key', true );
			break;
		case 'type_matches':
			if (get_post_meta( $post_id, '_type_matches_key', true ) === 'match_a') {
				$sample =  'Match A';
			}else if(get_post_meta( $post_id, '_type_matches_key', true ) === 'match_b'){
				$sample =  'Match B';
			}else{
				$sample =  '';
			}
			echo $sample;
			break;
	}
}

/*Meta Boxes*/


function qqlanding_matches_add_meta_box(){
	add_meta_box( 'matches', __( 'Matches','qqLanding' ), 'qqlanding_matches_callback', 'qqlanding-matches', 'normal', 'high' );
}

function qqlanding_matches_callback( $post ){
	wp_nonce_field( 'qqlanding_save_matches_data', 'qqlanding_matches_meta_box_nonce' );
	$home_val = get_post_meta( $post->ID, '_home_matches_key', true );
	$away_val = get_post_meta( $post->ID, '_away_matches_key', true );
	$date_val = get_post_meta( $post->ID, '_date_matches_key', true );
	$type_val = get_post_meta( $post->ID, '_type_matches_key', true );
	?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col" style="width:25%;">Home Team</th>
				<th scope="col" style="width:25%;">Away Team</th>
				<th scope="col" style="width:25%;">Match Type</th>
				<th scope="col" style="width:25%;">Date Matches</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width:25%;">
					<!-- <label for="matches_home">Home</label> -->
					<input type="text" id="matches_home" name="matches_home" value="<?php echo esc_attr( $home_val ); ?>">
				</td>
				<td style="width:25%;">
					<!-- <label for="matches_away">Away</label> -->
					<input type="text" id="matches_away" name="matches_away" value="<?php echo esc_attr( $away_val ); ?>">
				</td>
				<td style="width:25%;">
					<!-- <label for="matches_status">Type</label> -->
					<select name="matches_status" id="matches_status">
						<option value="match_a" <?php echo selected( $type_val, 'match_a' ); ?> >Match A</option>
						<option value="match_b" <?php echo selected( $type_val, 'match_b' ); ?> >Match B</option>
					</select>
					<div class="desc">*Select your match type</div>
				</td>
				<td style="width:25%;">
					<!-- <label for="matches_date">Date</label> -->
					<input type="date" id="matches_date" name="matches_date" value="<?php echo esc_attr( $date_val ); ?>">
				</td>
			</tr>
		</tbody>
	</table>
<?php }

function qqlanding_save_matches_data( $post_id ){
	if ( ! isset( $_POST['qqlanding_matches_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['qqlanding_matches_meta_box_nonce'], 'qqlanding_save_matches_data' ) ) {
		return;
	}
	if ( defined("DOING_AUTOSAVE") && DOING_AUTOSAVE ){
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( ! isset($_POST['matches_home']) ||  ! isset($_POST['matches_away']) ||  ! isset($_POST['matches_date']) ||  ! isset($_POST['matches_status']) ) {
		return;
	}

	$matches_fields = array(
		'_home_matches_key' => 'matches_home',
		'_away_matches_key' => 'matches_away',
		'_date_matches_key' => 'matches_date',
		'_type_matches_key' => 'matches_status'
	);

	foreach ($matches_fields as $fields_key => $fields_value) {
		update_post_meta( $post_id, $fields_key, sanitize_text_field( $_POST[$fields_value] ) );
	}


	// $home_val = sanitize_text_field( $_POST['matches_home'] );
	// $away_val = sanitize_text_field( $_POST['matches_away'] );
	// $date_val = sanitize_text_field( $_POST['matches_date'] );

	// update_post_meta( $post_id, '_home_matches_key', $home_val );
	// update_post_meta( $post_id, '_away_matches_key', $home_val );
	// update_post_meta( $post_id, '_date_matches_key', $home_val );
}


