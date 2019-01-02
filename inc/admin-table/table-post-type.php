<?php
/**
 * Table Custom Post Type
 *
 * @since 1.0.0
 * @package QQLanding
 */

//Is ABSPATH defined
if ( ! defined('ABSPATH')) exit;

/**
 * QQLandingTablePostType
 *
 * @since 1.0.0
 */
class QQLandingTablePostType {


	/**
	 * Registers a new post type
	 * @uses $wp_post_types Inserts new post type object into the list
	 *
	 * @param string  Post type key, must not exceed 20 characters
	 * @param array|string  See optional args description above.
	 * @return object|WP_Error the registered post type object, or an error object
	 */
	public function table_register_post_type() {

		$labels = array(
			'name'               => __( 'Matches', 'qqLanding' ),
			'singular_name'      => __( 'Match', 'qqLanding' ),
			'add_new'            => _x( 'Add New Match', 'qqLanding', 'qqLanding' ),
			'add_new_item'       => __( 'Add New Match', 'qqLanding' ),
			'edit_item'          => __( 'Edit Match', 'qqLanding' ),
			'new_item'           => __( 'New Match', 'qqLanding' ),
			'view_item'          => __( 'View Match', 'qqLanding' ),
			'search_items'       => __( 'Search Matches', 'qqLanding' ),
			'not_found'          => __( 'No Matches found', 'qqLanding' ),
			'not_found_in_trash' => __( 'No Matches found in Trash', 'qqLanding' ),
			'parent_item_colon'  => __( 'Parent Match:', 'qqLanding' ),
			'menu_name'          => __( 'Matches', 'qqLanding' ),
		);

		$args = array(
			'label'               => __( 'Matches Table', 'qqLanding' ),
			'hierarchical'        => __( 'Matches Table Description', 'qqLanding' ),
			'labels'              => $labels,
			'description'         => 'description',
			'taxonomies'          => array(),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 12,
			'menu_icon'           => 'dashicons-editor-table',
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => false,
			'query_var'           => false,
			'can_export'          => true,
			'rewrite'             => false,
			'supports'            => array(
				'title',
				//'editor',
				'author',
				'custom-fields',
				'revisions',
			),
		);

		register_post_type( 'qqlanding-matchx', $args );
	}

	/**
	 * Remove 'Add Media' button from the WP Editor.
	 * @since 1.0.0
	 */
	public function remove_media_button(){
		global $current_screen;

		if('qqlanding-matchx' == $current_screen->post_type ) remove_action( 'media_buttons', 'media_buttons' );
	}

	public function add_meta_boxes(){
		add_meta_box( 'matchx',
			__( 'List of Match', 'default' ),
			array( $this, 'qqlanding_list_match' ),
			'qqlanding-matchx',
			'normal',
			'high'
		);

		add_meta_box( 'list-settings',
			__( 'List Settings', 'default' ),
			array( $this, 'qqlanding_list_settings' ),
			'qqlanding-matchx',
			'side',
			'default'
		);
	}

	public function qqlanding_list_match( $post ){
 
		$repeatable_fields = get_post_meta( $post->ID, 'repeatable_fields', true );

		if ( empty( $repeatable_fields ) ) {
			$repeatable_fields[] = array(
				'home' 		=> '',
				'away' 		=> '',
				'dateMatch' => '',
			);
		}

		require_once get_template_directory() . '/inc/admin-table/table-cpt-template.php';
	}

	public function qqlanding_list_settings( $post ){

		$post_meta = get_post_meta( $post->ID );

		$image 		= isset( $post_meta['image'] ) ? $post_meta['image'][0] : '';
		$display 	= isset( $post_meta['display'] ) ? $post_meta['display'][0] : '';
		$display_timer 	= isset( $post_meta['display_timer'] ) ? $post_meta['display_timer'][0] : '';
		$display_timer_logo 	= isset( $post_meta['display_timer_logo'] ) ? $post_meta['display_timer_logo'][0] : '';

		require_once get_template_directory() . '/inc/admin-table/table-cpt-settings-template.php';
	}

	public function qqlanding_save_meta_data( $post_id, $post ){
		
		//Check the post type 'qqlanding-matchx'
		if ( 'qqlanding-matchx' != $post->post_type ) {
			return;
		}

		if ( defined("DOING_AUTOSAVE") && DOING_AUTOSAVE ){
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['qqlanding_list_meta_box_nonce'] ) ) {

			if ( wp_verify_nonce( $_POST['qqlanding_list_meta_box_nonce'], 'qqlanding_save_list_data' ) ) {

				$clean = array();

				if ( isset ( $_POST['_list'] ) && is_array( $_POST['_list'] ) ) :
					
					foreach ( $_POST['_list'] as $i => $list ) {

						//skip the hidden 'to copy' div
						if( $i == '%s' ):
							continue;
						endif;

						$clean[] = array(
							'home' 		=> isset( $list['home'] ) ? sanitize_text_field( $list['home'] ) : null,
							'away' 		=> isset( $list['away'] ) ? sanitize_text_field( $list['away'] ) : null,
							'dateMatch' => isset( $list['dateMatch'] ) ? sanitize_text_field( $list['dateMatch'] ) : null,
						);
					}

				endif;

				//save list data
				if( ! empty( $clean ) ) :
					update_post_meta( $post_id, 'repeatable_fields', $clean);
				else:
					delete_post_meta( $post_id, 'repeatable_fields');
				endif;
			}
		}

		if ( isset( $_POST['qqlanding_settings_meta_box_nonce'] ) ) {

			if ( wp_verify_nonce( $_POST['qqlanding_settings_meta_box_nonce'], 'qqlanding_save_setting_data' ) ) {
				
				$image = isset( $_POST['image'] ) ?  sanitize_text_field(  $_POST['image']  ) : '';
				update_post_meta( $post_id, 'image', $image );
				
				$display = isset( $_POST['display'] ) ?  1 : 0;
				update_post_meta( $post_id, 'display', $display );

				$display_timer = isset( $_POST['display_timer'] ) ?  1 : 0;
				update_post_meta( $post_id, 'display_timer', $display_timer );
				
				$display_timer_logo = isset( $_POST['display_timer_logo'] ) ?  1 : 0;
				update_post_meta( $post_id, 'display_timer_logo', $display_timer_logo );
			}
		}

		//return $post_id;
	}

	public function qqlanding_list_set_columns( $columns ){

		$columns = array(
			'cb'				=> '<input type="checkbox">',
			'image'				=> __( 'Logo', 'qqLanding' ),
			'title'				=> __( 'Title', 'qqLanding' ),
			'item'				=> __( 'Match Item', 'qqLanding' ),
			'current_match'		=> __( 'Current Match', 'qqLanding' ),
			'upcoming_match'	=> __( 'Upcoming Match', 'qqLanding' ),
			'date'				=> __( 'Date', 'qqLanding' ),
		);

		return $columns;
	}

	public function qqlanding_list_custom_column($column, $post_id){

		switch ( $column ) {
			case 'image':
				echo '<img src="' .  get_post_meta( $post_id, 'image', true ) . '">';
				break;
			case 'item':
				$repeatable = get_post_meta( $post_id, 'repeatable_fields', true );
				$count_repeat = count($repeatable);
				echo $count_repeat;
				break;
			case 'current_match';
				echo  $this->qqlanding_current_match( $post_id ) ;
				break;
			case 'upcoming_match';
				//echo 'Not in the mood';
				echo $this->qqlanding_upcoming_match( $post_id );
				break;
		}
	}

	public function qqlanding_current_match( $post_id ){

		$repeatable = get_post_meta( $post_id, 'repeatable_fields', true );
		$cdate = date( 'Y-m-d' );

		foreach ($repeatable as $value ) {
			$date = $value['dateMatch'];
			if ( $cdate == $date  ) {
				$item = $value['home'] . ' vs ' . $value['away'];
			}

		}
		return ( ! empty( $item ) ) ? '<span class="warning-text">'. $item . '</span>' : '<span class="required-text">No Match Available</span>';
	}
	public function qqlanding_upcoming_match( $post_id ){
		$current_date = date( 'Y-m-d' );
		$repeatable_fields = get_post_meta( $post_id, 'repeatable_fields', true);
		foreach ($repeatable_fields as $key => $row) $vc_array_date[$key] = $row['dateMatch'];
		array_multisort($vc_array_date, SORT_ASC, $repeatable_fields);
		$id = '';
		foreach ($repeatable_fields as $value) :
			$new_date = $value['dateMatch'];
			if ($current_date <= $new_date) :
				if ($id != get_the_ID() ) :
					$output = $value['home'] . ' vs ' . $value['away'];
				endif;
			endif;
		endforeach; //Loop the post meta
		return ( ! empty( $output ) ) ? '<span class="primary-text">'. $output . '</span>' : '<span class="required-text">No Match Available</span>';
	}

}