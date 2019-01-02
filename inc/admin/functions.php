<?php

/**
 * 
 */
class QQLandingAdminFunc{

	public function manage_wp_enqueue($hook){
		global $post_type;
		//var_dump($hook);
		//var_dump($post_type);
		
		if ( 'post-new.php' == $hook || 'post.php' == $hook ) {

			wp_register_style( 'admin-new-general', get_template_directory_uri() . '/inc/admin/assets/css/admin-style.css', '1.0.0', 'all');
			wp_enqueue_style( 'admin-new-general');

			wp_enqueue_media();
			
			wp_register_script( 'admin-general-script', get_template_directory_uri() . '/inc/admin/assets/js/admin-general-js.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'admin-general-script');

		}

		if (  'qqlanding-matchx' == $post_type && 'edit.php' == $hook ) {

			wp_register_style( 'admin-new-general', get_template_directory_uri() . '/inc/admin/assets/css/admin-style.css', '1.0.0', 'all');
			wp_enqueue_style( 'admin-new-general');
		}
	}

	// public function manage_video(){

	// 	$defaults = qqlanding_video_get_default_settings();
		
	// 	foreach ($defaults as $option_name => $value) {
	// 		if ( false == get_option($option_name) ) {
	// 			add_option($option_name,$value);
	// 		}
	// 	}
		
	// }

	// public function qqvideo_pre_get_posts( $query ){

	// 	$new_query = ( isset( $query->query['post_type'] ) ) ? $query->query['post_type'] : '';

	// 	if ( is_post_type_archive( 'qqvideos' ) && ! empty( $new_query  === 'qqvideos' ) ) {
	// 		$this->add_rewrite();
	// 	}
	// }

	// public function add_rewrite(){

	// 	$id = get_the_ID();
	// 	$url = home_url();
	// 	//var_dump($id);

	// 	if ( $id > 0 ) {
	// 		$link = str_replace( $url, '', get_permalink($id) );
	// 		$link = trim($link, '/');
	// 		var_dump($link);
			
	// 		add_rewrite_rule( "$link/([^/]+)/page/?([0-9]{1,})/?$", 'index.php?page_id=535&videos=$matches[1]&paged=$matches[2]', $after = 'top' );
	// 		add_rewrite_rule( "$link/([^/]+)/?$", 'index.php?page_id=535&videos=$matches[1]', 'top' );
	// 	}


	// 	// Rewrite tags
	// 	add_rewrite_tag( 'videos', '([^/]+)' );
	// }
	
}