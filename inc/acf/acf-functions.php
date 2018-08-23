<?php
/**
 * This is were all of the functions for the 
 * ACF settings are created.
 */

if ( function_exists( 'acf_add_options_page' ) ) :
	acf_add_options_page( array(
		'page_title' 	=> __( 'General Theme Settings.', 'qqlanding' ),
		'menu_title' 	=> __( 'General Theme', 'qqlanding' ),
		'menu_slug'		=> 'general-theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	) ); //General Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Slider Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Slider', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Front Page Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Front Page Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Front Page', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Front Page Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Promo Banners Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Promo Banners', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Promo Banners Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( '404 Page Settings', 'qqlanding' ),
		'menu_title' 	=> __( '404 Page', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //404 Page Settings

endif;

/**
 * This will add some class to your body
 */
function qqlanding_schema( $class ){
	$add_affix = ( get_field('th_nav_settings','option') == true ) ? 'qqland-affix' : 'qqland-no-affix';

	$template = get_field( 'header_template', 'option' );
	switch ($template) {
		case 'bare': $new_class = "qqlayout-bare"; break;
		case 'overlay': $new_class = "qqlayout-overlay"; break;
		default: $new_class = "qqlayout-default"; break;
	}

	switch ( $class ) {
		case 'qq188': $class = 'qq188 ' . $add_affix . ' ' . $new_class; break;
		case 'qq101': $class = 'qq101 ' . $add_affix . ' ' . $new_class; break;
		case 'qq1x2': $class = 'qq1x2 ' . $add_affix . ' ' . $new_class; break;
		case 'qq724': $class = 'qq724 ' . $add_affix . ' ' . $new_class; break;
		case 'qqfortuna': $class = 'qqfortuna ' . $add_affix . ' ' . $new_class; break;
		case 'qq801': $class = 'qq801 ' . $add_affix . ' ' . $new_class; break;
		case 'qq882': $class = 'qq882 ' . $add_affix . ' ' . $new_class; break;
		case 'qq808': $class = 'qq808 ' . $add_affix . ' ' . $new_class; break;
		case 'qq828': $class = 'qq828 ' . $add_affix . ' ' . $new_class; break;
		case 'custom': $class = 'custom ' . $add_affix . ' ' . $new_class; break;
		default: $class = 'qq288 ' . $add_affix . ' ' . $new_class; break;
	}
	return $class;
}