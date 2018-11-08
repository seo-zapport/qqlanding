<?php
/**
 * This is the videos post type
 * 
 * @package QQLanding
 */

add_action( 'init', 'qqlanding_video_custom_post_type' );
add_filter( 'manage_video_posts_columns', 'qqlanding_set_video_columns');
add_action( 'manage_video_posts_custom_column', 'qqlanding_video_custom_column' , 10, 2);

function qqlanding_video_custom_post_type(){
	$args = array(
		'description'		=> '',
		'public'			=> true,
		'show_ui'			=> true,
		'show_in_menu'		=> false,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'supports'			=> array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes' ),
	);

	register_post_type( 'video', $args );
}
function qqlanding_set_video_columns($columns){
	$newColumns['cb']		= $columns['cb'];
	$newColumns['title']	= __( 'Video Title', 'qqLanding' );
	$newColumns['thumb']	= __( 'Video Thumbnail', 'qqLanding' );
	$newColumns['date']		= __( 'Date ', 'qqLanding' );

	return $newColumns;
}

function qqlanding_video_custom_column($column, $post_id){
	switch ($column) {
		case 'thumb':
			//thumbnail column
			echo get_the_post_thumbnail( $post_id, array(80, 80) );
			break;
	}
	
}