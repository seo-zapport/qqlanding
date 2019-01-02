<?php
/**
 * Prevent wp_kses from removing iframe embeds.
 * 
 * @since     1.0.0
 * @param     array    $allowed_tags    Allowed HTML Tags
 * @return    array                     Iframe included.
 */
function qqlanding_allow_iframes_filter( $allowed_tags ) {

	// Only change for users who has "unfiltered_html" capability
	if ( ! current_user_can( 'unfiltered_html' ) ) return $allowed_tags;
	
	// Allow iframes and the following attributes
	$allowed_tags['iframe'] = array(
		'align'        => true,
		'width'        => true,
		'height'       => true,
		'frameborder'  => true,
		'name'         => true,
		'src'          => true,
		'id'           => true,
		'class'        => true,
		'style'        => true,
		'scrolling'    => true,
		'marginwidth'  => true,
		'marginheight' => true,
	);
	
	return $allowed_tags;
	
}


function qqlanding_video_get_default_settings(){
	$args = array(
		'qqlanding_general_settings' => array(
			'enable'          => array( 
				'css' => 'css'
			),
		),
		'qqlanding_player_settings' => array(
			'autoplay'		=> 1,
			'loop'			=> 0,
			'preload'		=> 'metadata',
			'controls' => array(
				'playpause'  => 'playpause',
				'current'    => 'current',
				'progress'   => 'progress', 
				'duration'   => 'duration',
				'tracks'     => 'tracks',
				'volume'     => 'volume', 
				'fullscreen' => 'fullscreen'					
			)
		),
		'qqlanding_brand_settings'	=> array(
			'show_logo'		=> 1
		),
		'qqlanding_videos_settings' => array(
			'columns'        => 3,
			'limit'          => 10,
			'orderby'        => 'date',
			'order'          => 'desc',
			'display'        => array(
				'count'    => 'count',
				'category' => 'category',
				'date'     => 'date',
				'user'     => 'user',
				'views'    => 'views',
				'duration' => 'duration',
				'excerpt'  => 'excerpt'
			),
			'excerpt_length' => 75
		),
		'qqlanding_front_page_settings'	=> array(
			'qqfront_page'	=> 1
		),
		'qqlanding_single_video_settings'	=> array(
			'display'        => array(
				'category' => 'category', 
				'date'     => 'date', 
				'user'     => 'user', 
				'views'    => 'views',
			),
		),
	);
	return $args;
}

/*
 * Get image from the Iframe Embed Code.
 *
 * @since     1.0.0
 * @param     string    $embedcode    Iframe Embed Code.
 * @return    string    $url          Image URL.
 */
function qqlanding_get_embedcode_image_url( $embedcode ) {
	
	$document = new DOMDocument();
  	$document->loadHTML( $embedcode );
	
	$iframes = $document->getElementsByTagName( 'iframe' ); 
	$src = $iframes->item(0)->getAttribute( 'src' );

	// YouTube
	$url = qqlanding_youtube_image_url( $src );
    	
	// Return image url
	return $url;
	
}

function qqlanding_sanitize_array($value){
	return ! empty( $value ) ? array_map('esc_attr', $value) : array();
}

function qqlanding_sanitize_int($value){
	$value = intval($value);
	return (0 == $value) ? '' : $value;
}

function qqlanding_video_get_type(){
	$types = array(
		'default'		=> __( 'Self Hosted', 'qqlanding' ),
		'youtube'		=> __( 'Youtube', 'qqlanding' ),
		'embedcode'		=> __( 'Iframe Embed Code', 'qqlanding' )
	);

	return apply_filters( 'qqlanding_video_source_types', $types );
}

/**
 * Get attachment ID of the given URL.
 * 
 * @since     1.0.0
 * @param     string    $url      Media file URL.
 * @param     string    $media    "image" or "video". Type of the media. 
 * @return    int                 Attachment ID on success, 0 on failure.
 */
function qqlanding_get_attachment_id( $url, $media = 'image' ) {

	$attachment_id = 0;
	
	if ( empty( $url ) ) {
		return $attachment_id;
	}	
	
	if ( 'image' == $media ) {

		$dir = wp_upload_dir();
	
		if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
	
			$file = basename( $url );
	
			$query_args = array(
				'post_type'   => 'attachment',
				'post_status' => 'inherit',
				'fields'      => 'ids',
				'meta_query'  => array(
					array(
						'value'   => $file,
						'compare' => 'LIKE',
						'key'     => '_wp_attachment_metadata',
					),
				)
			);
	
			$query = new WP_Query( $query_args );
	
			if ( $query->have_posts() ) {
	
				foreach ( $query->posts as $post_id ) {
	
					$meta = wp_get_attachment_metadata( $post_id );
	
					$original_file       = basename( $meta['file'] );
					$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
	
					if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
						$attachment_id = $post_id;
						break;
					}
	
				}
	
			}
	
		}
	
	} else {

		$url = wp_make_link_relative( $url );
		
		if ( ! empty( $url ) ) {
			global $wpdb;
			
			$query = $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid RLIKE %s", $url );
			$attachment_id = $wpdb->get_var( $query );
		}
		
	}

	return $attachment_id;
	
}

/*
 * Get YouTube ID from URL.
 *
 * @since     1.0.0
 * @param     string    $url    YouTube page URL.
 * @return    string    $id     YouTube video ID.
 */
function qqlanding_get_youtube_id_from_url( $url ) {
	
	$id  = '';
    $url = parse_url( $url );
		
    if ( 0 === strcasecmp( $url['host'], 'youtu.be' ) ) {
       	$id = substr( $url['path'], 1 );
    } elseif ( 0 === strcasecmp( $url['host'], 'www.youtube.com' ) ) {
       	if ( isset( $url['query'] ) ) {
       		parse_str( $url['query'], $url['query'] );
           	if ( isset( $url['query']['v'] ) ) {
           		$id = $url['query']['v'];
           	}
       	}
			
       	if ( empty( $id ) ) {
           	$url['path'] = explode( '/', substr( $url['path'], 1 ) );
           	if ( in_array( $url['path'][0], array( 'e', 'embed', 'v' ) ) ) {
               	$id = $url['path'][1];
           	}
       	}
    }
    	
	return $id;
	
}

/*
 * Get YouTube image from URL.
 *
 * @since     1.0.0
 * @param     string    $url    YouTube page URL.
 * @return    string    $url    YouTube image URL.
 */
function qqlanding_youtube_image_url( $url ) {
	
	$id  = qqlanding_get_youtube_id_from_url( $url );
	$url = '';

	if ( ! empty( $id ) ) {
		$url = "https://img.youtube.com/vi/$id/0.jpg"; 
	}
	   	
	return $url;
	
}

/*
 * Inserts a new key/value after the key in the array.
 *
 * @since     1.0.0
 * @param     string    $key          The key to insert after.
 * @param     array     $array        An array to insert in to.
 * @param     array     $new_array    An array to insert.
 * @return                            The new array if the key exists, FALSE otherwise.
 */
function qqlanding_insert_array_after( $key, $array, $new_array ) {

	if ( array_key_exists( $key, $array ) ) {
    	$new = array();
    	foreach ( $array as $k => $value ) {
      		$new[ $k ] = $value;
      		if ( $k === $key ) {
				foreach ( $new_array as $new_key => $new_value ) {
        			$new[ $new_key ] = $new_value;
				}
      		}
    	}
    	return $new;
  	}
		
  	return $array;
  
}

function qqlanding_delete_video_attachment( $post_id ){
	$mp4_id = get_post_meta( $post_id, 'mp4_id', true );
	if ( ! empty( $mp4_id ) ) wp_delete_attachment( $mp4_id, true );

	$image_id = get_post_meta( $post_id, 'image_id', true );
	if ( ! empty( $image_id ) ) wp_delete_attachment( $image_id, true );
	
}



function qqlanding_remove_query_arg( $key, $query = false ) {

	if ( is_array( $key ) ) { // removing multiple keys
		foreach ( $key as $k ) {
			$query = str_replace( '#038;', '&', $query );
			$query = add_query_arg( $k, false, $query );
		}
		
		return $query;
	}
		
	return add_query_arg( $key, false, $query );
	
}

function qqlanding_get_page_number(){
	global $paged;

	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	}elseif( get_query_var( 'page' ) ){
		$paged = get_query_var('page');
	}else{
		$paged = 1;
	}

	return $paged;	
}

function the_qqlanding_video_pagination( $numpages = '', $pagerange = '', $paged = '' ){

	if ( $numpages == '' ) {
		global $wp_query;

		$numpages = $wp_query->max_num_pages;
		if ( ! $numpages ) {
			$numpages = 1;
		}
	}

	if ( empty( $pagerange ) ) {
		$pagerange = 2;
	}

	if( empty( $paged ) ){
		$paged = qqlanding_get_page_number();
	}

	$args_params = array( 'lang' );

	$base = qqlanding_remove_query_arg( $args_params, get_pagenum_link( 1 ) );

	if ( ! get_option( 'permalink_structure' ) || isset( $_GET['qqvideos']) ) {
		$prefix = strpos( $base, '?' ) ? '&' : '?';
		$format = $prefix.'paged=%#%';
	}else{
		$prefix = ( '/' == substr( $base, -1 ) ) ? '' : '/';
		$format = $prefix.'page/%#%';
	}

	$args = array(
		'base'			=> $base . '%_%',
		'format'		=> $format,
		'total'			=> $numpages,
		'current'		=> $paged,
		'show_all'		=> false,
		'end_size'		=> 1,
		'mid_size'		=> $pagerange,
		'prev_next'		=> true,
    	'prev_text'    	=> __( '&laquo;' ),
    	'next_text'    	=> __( '&raquo;' ),
    	'type'         => 'array',
    	'add_args'     => false,
    	'add_fragment' => ''
	);
	$page_links = paginate_links( $args );

	var_dump($page_links);

}