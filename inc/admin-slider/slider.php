<?php

add_action( 'init', 'qqlanding_slider_custom_settings' );

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function qqlanding_slider_custom_settings() {

	$args = array(
		'description'		=> '',
		'public'			=> false,
		'show_ui'			=> true,
		'show_in_menu'		=> false,
		'capability_type'	=> 'post',
		'exclude_from_search' => true,
		'hierarchical'		=> false,
		'rewrite'             => false,
		'has_archive'         => false,
		'supports'			=> array( 'title' ),
	);

	register_post_type( 'slider', $args );
}