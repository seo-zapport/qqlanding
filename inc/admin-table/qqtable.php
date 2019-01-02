<?php
/**
 * QQLandingVideo - This is the main class file
 *
 * @since 1.0.0
 */
class QQLandingTable {

	public function init() {
		$this->load_dependencies();
		$this->register_init();
	}

	public function load_dependencies(){
		
		//All of the dependencies here
		
		require_once get_template_directory() . '/inc/admin/functions.php';
		require_once get_template_directory() . '/inc/admin-table/table-post-type.php';
		require_once get_template_directory() . '/inc/admin-table/table-settings.php';
	}

	public function register_init(){

		/**-Hooks common to all admin pages.*/
		$wp_enqueue = new QQLandingAdminFunc();
		add_action( 'admin_enqueue_scripts', array( $wp_enqueue, 'manage_wp_enqueue' ) );

		/**-Hooks specific to the admin.*/
		//$settings = new QQLanginTableSettings();
		//add_action( 'admin_init', array( $settings, 'admin_init' ) );
		//add_action( 'admin_menu', array( $settings, 'admin_menu_pages' ) );

		//All about registration here
		$post_type = new QQLandingTablePostType();
		add_action( 'init', array( $post_type, 'table_register_post_type' ) );
		add_action( 'admin_head', array( $post_type, 'remove_media_button' ) );
		add_action( 'add_meta_boxes', array( $post_type, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $post_type, 'qqlanding_save_meta_data' ), 10, 2 );
		add_action( 'manage_qqlanding-matchx_posts_columns', array( $post_type, 'qqlanding_list_set_columns' ) );
		add_action( 'manage_qqlanding-matchx_posts_custom_column', array( $post_type, 'qqlanding_list_custom_column' ), 10, 2 );



	}
}
$table = new QQLandingTable();
$table->init();