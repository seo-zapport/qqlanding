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
		'labels'			=> array(
			'name'			=> __( 'All QQslider','qqlanding' ),
			'singular_name'	=> __( 'QQslider','qqlanding' ),
			'add_new'		=> __( 'Add New','qqlanding' ),
			'add_new_item'	=> __( 'Add New','qqlanding' ),
			'edit_item'		=> __( 'Edit','qqlanding' ),
			'new_item'		=> __( 'Add new QQslider','qqlanding' ),
			'view_item'		=> __( 'View QQslider','qqlanding' ),
			'search_items'	=> __( 'Search QQslider','qqlanding' ),
			'not_found'		=> __( 'No QQslider found','qqlanding' ),
			'not_found_in_trash'	=> __( 'No QQslider found in trash','qqlanding' ),
			'menu_name'		=> __( 'Slider','qqlanding' ),
		),
		'description'		=> '',
		'public'			=> false,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'exclude_from_search' => true,
		'hierarchical'		=> false,
		'query_var'			=> false,
		// 'capabilities'		=> array(
		// 	'create_posts'       => false,
		// 	),
    	//'map_meta_cap'      => true,
		'rewrite'           => false,
		'menu_position' 	=> 120,
		'has_archive'       => false,
		'menu_icon'         => 'dashicons-slides',
		'supports'			=> array( 'title' ),
	);

	register_post_type( 'slider', $args );
}