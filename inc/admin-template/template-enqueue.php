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
	if ('toplevel_page_vm_settings' == $hook ) {
		/** Style -------*/
		wp_register_style( 'admin-style', get_template_directory_uri() . '/inc/admin-template/assets/css/admin-style.css', array() , '0.0.1', 'all' );
		wp_enqueue_style( 'admin-style' );

		wp_register_style( 'flipclock-style', get_template_directory_uri() . '/assets/css/flipclock.css', array() , '0.0.1', 'all' );
		wp_enqueue_style( 'flipclock-style' );



		/** Script -------*/
		wp_enqueue_media();
		wp_register_script( 'admin-script', get_template_directory_uri() . '/inc/admin-template/assets/js/admin-script.js', array('jquery'), '0.0.1', true);
		wp_enqueue_script( 'admin-script' );
		
		wp_enqueue_script("jquery");
		wp_register_script( 'flipclock-script', get_template_directory_uri() . '/assets/js/flipclock.js', array('jquery'), '0.0.1', true);
		wp_enqueue_script( 'flipclock-script' );

	}
	else if( 'post.php' == $hook ){

		/** Style -------*/
		wp_register_style( 'admin-style', get_template_directory_uri() . '/inc/admin-template/assets/css/admin-style.css', array() , '0.0.1', 'all' );
		wp_enqueue_style( 'admin-style' );
		
	} else{
		return;
	}	
}
add_action( 'admin_enqueue_scripts', 'qqlanding_load_admin_scripts' );