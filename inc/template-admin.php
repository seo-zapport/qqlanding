<?php
/**
 *
 *
 * @package QQLanding
 */

function qqlanding_admin_func(){
	/**#Video Admin Page*/
	add_menu_page( 'Videos', 'Videos & Matches', 'manage_options', 'vm_settings', 'qqLand_vid_func', 'dashicons-playlist-video', 12 );
	/**##Video Sub admin Page*/
	/*add_submenu_page( 'vm_settings', 'Videos Settings', 'Add Videos', 'manage_options', 'vm_settings', 'videos_add_item_settings' );*/

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
	// register_setting( 'match-settings-group', 'match_link' , 'qqlanding_vid_sanitize_url' );
	// register_setting( 'match-settings-group', 'match_desc', 'qqlanding_vid_sanitize_html' );

	add_settings_section( 'qqlanding-match-options', 'Match Timer', 'qqlanding_match_a_options', 'vm_settings' );
	//add_settings_section( 'qqlanding-match-options', 'Match B', 'qqlanding_match_b_options', 'vm_settings' );
	//add_settings_section( 'qqlanding-match-options', 'Match Timer', 'qqlanding_video_options', 'vm_settings' );

	add_settings_field( 'match-logo-a', 'Logo A', 'qqlanding_match_logo_a', 'vm_settings', 'qqlanding-match-options' );
	add_settings_field( 'match-logo-b', 'Logo B', 'qqlanding_match_logo_b', 'vm_settings', 'qqlanding-match-options' );

	add_settings_field( 'match-title-a', 'Title A', 'qqlanding_match_title_a', 'vm_settings', 'qqlanding-match-options' );
	add_settings_field( 'match-title-b', 'Title B', 'qqlanding_video_title_b', 'vm_settings', 'qqlanding-match-options' );
	
	add_settings_field( 'match-date-a', 'Date A', 'qqlanding_video_date_a', 'vm_settings', 'qqlanding-match-options' );
	add_settings_field( 'match-date-b', 'Date B', 'qqlanding_video_date_b', 'vm_settings', 'qqlanding-match-options' );
	// add_settings_field( 'match-link', 'Link', 'qqlanding_video_link', 'vm_settings', 'qqlanding-match-options' );
	// add_settings_field( 'match-desc', 'Description', 'qqlanding_video_desc', 'vm_settings', 'qqlanding-match-options' );
}

function qqlanding_match_a_options(){
	//echo 'customize settings';
}

function qqlanding_match_logo_a(){
	$logo_a = esc_attr( get_option('match_logo_a') );
	echo '<input type="button" value="Upload Logo A" id="upload_logo_a" class="button button-secondary"><input type="hidden" id="match_logo_a" name="match_logo_a" value="' . $logo_a . '" />';
}
function qqlanding_match_logo_b(){
	$logo_b = esc_attr( get_option('match_logo_b') );
	echo '<input type="button" value="Upload Logo b" id="upload_logo_b" class="button button-secondary"><input type="hidden" id="match_logo_b" name="match_logo_b" value="' . $logo_b . '" />';
}

function qqlanding_match_title_a(){
	$title = esc_attr( get_option('match_title_a') );
	echo '<input type="text" name="match_title_a" value="' . $title . '" />';
}
function qqlanding_video_title_b(){
	$title = esc_attr( get_option('match_title_b') );
	echo '<input type="text" name="match_title_b" value="' . $title . '" />';
}

function qqlanding_video_date_a(){
	$date = esc_attr( get_option('match_date_a') );
	//echo '<input type="datetime-local" name="match_date_a" value="' . $date . '" />';
	echo '<input type="date" name="match_date_a" value="' . $date . '" />';
}

function qqlanding_video_date_b(){
	$date = esc_attr( get_option('match_date_b') );
	echo '<input type="date" name="match_date_b" value="' . $date . '" />';
}


/*function qqlanding_video_link(){
	$url = esc_url( get_option('match_link') );
	echo '<input type="url" name="match_link" value="' . $url . '" />';
}

function qqlanding_video_desc(){
	$desc = esc_url( get_option('match_desc') );
	echo '<textarea name="match_desc" id="match_desc">' . $desc . '</textarea>';
}*/


function qqLand_vid_func(){
	require_once (get_template_directory() . '/inc/admin-template/dashboard.php' );
}

function videos_add_item_settings(){ 
	require_once (get_template_directory() . '/inc/admin-template/create-video.php' );
	//require_once (get_template_directory() . '/inc/admin-template/videos.php' );
}

//Sanitization
require_once (get_template_directory() . '/inc/admin-template/vid-sanitize.php' );