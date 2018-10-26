<?php
/**
 *
 *
 * @package QQLanding
 */

function qqlanding_admin_func(){
	/**#Video Admin Page*/
	add_menu_page( 'Videos', 'Videos Settings', 'manage_options', 'videos_settings', 'qqLand_vid_func', 'dashicons-playlist-video', 12 );
	/**##Video Sub admin Page*/
	/*add_submenu_page( 'videos_settings', 'Videos Settings', 'Add Videos', 'manage_options', 'videos_settings', 'videos_add_item_settings' );*/

	add_submenu_page( 'videos_settings', 'Videos Settings', 'Videos', 'edit_posts', 'edit.php?post_type=video' );
	add_submenu_page( 'videos_settings', 'Matches Settings', 'Matches', 'edit_posts', 'edit.php?post_type=qqlanding-matches' );

	//Actovate custom settings
	add_action( 'admin_init', 'qqlanding_custom_settings' );
}
add_action( 'admin_menu', 'qqlanding_admin_func' );

function qqlanding_custom_settings(){
	register_setting( 'vid-settings-group', 'videos_title', 'qqlanding_vid_sanitize_text' );
	register_setting( 'vid-settings-group', 'videos_link' , 'qqlanding_vid_sanitize_url' );
	register_setting( 'vid-settings-group', 'videos_desc', 'qqlanding_vid_sanitize_html' );
	register_setting( 'vid-settings-group', 'videos_date' );

	add_settings_section( 'qqlanding-video-options', 'Video Options', 'qqlanding_video_options', 'videos_settings' );

	add_settings_field( 'video-title', 'Title', 'qqlanding_video_title', 'videos_settings', 'qqlanding-video-options' );
	add_settings_field( 'video-link', 'Link', 'qqlanding_video_link', 'videos_settings', 'qqlanding-video-options' );
	add_settings_field( 'video-desc', 'Description', 'qqlanding_video_desc', 'videos_settings', 'qqlanding-video-options' );
	add_settings_field( 'video-date', 'Publish Date', 'qqlanding_video_date', 'videos_settings', 'qqlanding-video-options' );
}

function qqlanding_video_options(){
	echo 'customize settings';
}

function qqlanding_video_title(){
	$title = esc_attr( get_option('videos_title') );
	echo '<input type="text" name="videos_title" value="' . $title . '" />';
}

function qqlanding_video_link(){
	$url = esc_url( get_option('videos_link') );
	echo '<input type="url" name="videos_link" value="' . $url . '" />';
}

function qqlanding_video_desc(){
	$desc = esc_url( get_option('videos_desc') );
	echo '<textarea name="videos_desc" id="videos_desc">' . $desc . '</textarea>';
}

function qqlanding_video_date(){
	$date = esc_attr( get_option('videos_date') );
	echo '<input type="date" name="videos_date" value="' . $date . '" />';
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
