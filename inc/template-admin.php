<?php
/**
 * This is the admin template
 *
 * @package QQLanding
 */

function qqlanding_admin_func(){
	/**#Video Admin Page*/
	add_menu_page( 'Videos', 'Videos & Matches', 'manage_options', 'vm_settings', 'qqLand_vid_func', 'dashicons-playlist-video', 12 );

	add_submenu_page( 'vm_settings', 'Videos List', 'Videos List', 'edit_posts', 'edit.php?post_type=video' );
	add_submenu_page( 'vm_settings', 'Matches List', 'Matches List', 'edit_posts', 'edit.php?post_type=qqlanding-matches' );

	//Actovate custom settings
	add_action( 'admin_init', 'qqlanding_custom_settings' );
}
add_action( 'admin_menu', 'qqlanding_admin_func' );

function qqlanding_custom_settings(){
	register_setting( 'match-settings-group', 'match_logo_a', 'qqlanding_vid_sanitize_text' );
	register_setting( 'match-settings-group', 'match_title_a', 'qqlanding_vid_sanitize_text' );
	register_setting( 'match-settings-group', 'match_date_a' );
	register_setting( 'match-settings-group', 'match_logo_b', 'qqlanding_vid_sanitize_text' );
	register_setting( 'match-settings-group', 'match_title_b', 'qqlanding_vid_sanitize_text' );
	register_setting( 'match-settings-group', 'match_date_b' );
	register_setting( 'match-settings-group', 'match_logo_c', 'qqlanding_vid_sanitize_text' );
	register_setting( 'match-settings-group', 'match_title_c', 'qqlanding_vid_sanitize_text' );
	register_setting( 'match-settings-group', 'match_date_c' );

	add_settings_section( 'qqlanding-match-options', 'Matches', 'qqlanding_match_options', 'vm_settings' );

	add_settings_field( 'match-a', 'Match A', 'qqlanding_match_a', 'vm_settings', 'qqlanding-match-options' );
	add_settings_field( 'match-b', 'Match B', 'qqlanding_match_b', 'vm_settings', 'qqlanding-match-options' );
	add_settings_field( 'match-c', 'Match C', 'qqlanding_match_c', 'vm_settings', 'qqlanding-match-options' );
	add_settings_field( 'match-d', 'Match D', 'qqlanding_match_d', 'vm_settings', 'qqlanding-match-options' );
}

function qqlanding_match_options(){
	echo 'This is the settings were you can edit/update your match time.';
}

function qqlanding_match_a(){
	$logo_a = esc_attr( get_option('match_logo_a') );
	$title = esc_attr( get_option('match_title_a') );
	$date = esc_attr( get_option('match_date_a') );
	$match_a = '<h3 class="vm-mt-title">Team A</h3>';
	$match_a .= '<p class="vm-small-desc">* Please fill up all of the fields.</p>';
	$match_a .= '<div class="input_wrapper">';
		$match_a .= '<input type="button" value="Upload Logo" id="upload_logo_a" class="button button-secondary"><input type="hidden" id="match_logo_a" name="match_logo_a" value="' . $logo_a . '" />';
	$match_a .= '</div>';
	$match_a .= '<div class="input_wrapper">';
		$match_a .= '<label for="match_title_a">Title</label>';
		$match_a .= '<input type="text" name="match_title_a" id="match_title_a" value="' . $title . '" />';
	$match_a .= '</div>';
	$match_a .= '<div class="input_wrapper">';
		$match_a .= '<label for="match_date_a">Date</label>';
		$match_a .= '<input type="date" name="match_date_a" id="match_date_a" value="' . $date . '" />';
	$match_a .= '</div>';
	echo $match_a;
}
function qqlanding_match_b(){
	$logo_b = esc_attr( get_option('match_logo_b') );
	$title_b = esc_attr( get_option('match_title_b') );
	$date_b = esc_attr( get_option('match_date_b') );

	$match_b = '<h3 class="vm-mt-title">Team B</h3>';
	$match_b .= '<p class="vm-small-desc">* Please fill up all of the fields.</p>';
	$match_b .= '<div class="input_wrapper">';
		$match_b .= '<input type="button" value="Upload Logo" id="upload_logo_b" class="button button-secondary"><input type="hidden" id="match_logo_b" name="match_logo_b" value="' . $logo_b . '" />';
	$match_b .= '</div>';
	$match_b .= '<div class="input_wrapper">';
		$match_b .= '<label for="match_title_b">Title</label>';
		$match_b .= '<input type="text" name="match_title_b" id="match_title_b" value="' . $title_b . '" />';
	$match_b .= '</div>';
	$match_b .= '<div class="input_wrapper">';
		$match_b .= '<label for="match_date_b">Date</label>';
		$match_b .= '<input type="date" name="match_date_b" id="match_date_b" value="' . $date_b . '" />';
	$match_b .= '</div>';

	echo $match_b;
}
function qqlanding_match_c(){
	$logo_c = esc_attr( get_option('match_logo_c') );
	$title_c = esc_attr( get_option('match_title_c') );
	$date_c = esc_attr( get_option('match_date_c') );

	$match_c = '<h3 class="vm-mt-title">Team C</h3>';
	$match_c .= '<p class="vm-small-desc">* Please fill up all of the fields.</p>';
	$match_c .= '<div class="input_wrapper">';
		$match_c .= '<input type="button" value="Upload Logo" id="upload_logo_c" class="button button-secondary"><input type="hidden" id="match_logo_c" name="match_logo_c" value="' . $logo_c . '" />';
	$match_c .= '</div>';
	$match_c .= '<div class="input_wrapper">';
		$match_c .= '<label for="match_title_c">Title</label>';
		$match_c .= '<input type="text" name="match_title_c" id="match_title_c" value="' . $title_c . '" />';
	$match_c .= '</div>';
	$match_c .= '<div class="input_wrapper">';
		$match_c .= '<label for="match_date_c">Date</label>';
		$match_c .= '<input type="date" name="match_date_c" id="match_date_c" value="' . $date_c . '" />';
	$match_c .= '</div>';

	echo $match_c;
}
function qqlanding_match_d(){
	echo '<div class="input_wrapper vm-wrapper-d item-no-avail">';
		echo '<div id="prev-details-wrap">';
			echo '<h2>No Time Available</h2>';
		echo '</div>';
	echo '</div>';
}


function qqLand_vid_func(){
	require_once (get_template_directory() . '/inc/admin-template/dashboard.php' );
}

function videos_add_item_settings(){ 
	require_once (get_template_directory() . '/inc/admin-template/create-video.php' );
	//require_once (get_template_directory() . '/inc/admin-template/videos.php' );
}

//Sanitization
require_once (get_template_directory() . '/inc/admin-template/vid-sanitize.php' );