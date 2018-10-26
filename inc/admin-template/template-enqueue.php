<?php
/**
 *
 *
 * @package QQLanding
 */

function qqlanding_load_admin_scripts( $hook ){
	//$bodyClass = get_admin_body_class();
	//var_dump( $classes );
	//
	$array = apply_filters( 'admin_body_class', $hook );
	//echo $hook;
	if ('toplevel_page_videos_settings' == $hook || 'post.php' == $hook ) {
			wp_register_style( 'video-admin', get_template_directory_uri() . '/inc/admin-template/assets/css/video-css.css', array() , '1.0.0', 'all' );
			wp_enqueue_style( 'video-admin' );
	}else{
		return;
	}

	
}
add_action( 'admin_enqueue_scripts', 'qqlanding_load_admin_scripts' );