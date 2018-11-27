<?php
/**
 * Appearance
 *
 * @package QQLanding
 */

add_action( 'admin_init', 'qqlanding_app_custom_settings' );
function qqlanding_app_custom_settings(){
	register_setting( 'slider-appearance-group', 'sample_text' );
	add_settings_section( 'qqlanding-slider-app-options', 'Appearance', 'sample_callback', 'slider_settings' );
	add_settings_field( 'sample-a', 'Text', 'qqlanding_slider_text', 'slider_settings', 'qqlanding-slider-app-options' );
}


function sample_callback(){
	echo 'descriptions';
}

function qqlanding_slider_text(){
	echo 'input tag here';
}