<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package QQLanding
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function qqlanding_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'qqlanding_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function qqlanding_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'qqlanding_pingback_header' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function qqlanding_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'qqlanding' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'qqlanding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'qqlanding_widgets_init' );


/**
 * Convert ACF functions to CSS
 */
function generate_css(){
	$dir = get_stylesheet_directory(); //Directory of the file
	ob_start(); //Capture all output into buffer
	require( $dir . '/inc/acf/acf-style-editor.php' ); //Grab the custom-css.php file
	$css = ob_get_clean(); //Store output in a variable, flush the buffer
	file_put_contents( $dir . '/assets/css/acf-style-editor.css', $css, LOCK_EX );
}
add_action( 'acf/save_post', 'generate_css', 20 );

/**
 * Call the acf style on admin
 */
function acf_admin_enqueue(){
	wp_enqueue_style( 'acf_styles', get_template_directory_uri() . '/inc/acf/acf-style.css');
}
add_action( 'admin_enqueue_scripts', 'acf_admin_enqueue');