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
		'name'          => esc_html__( 'Right Sidebar', 'qqlanding' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in the right side of your site.', 'qqlanding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s" itemprop="mainEntity">',
		'after_widget'  => '</section>',
<<<<<<< HEAD
		'before_title'  => '<div class="widget-title-container"><h4 class="widget-title" itemprop="name">',
		'after_title'   => '</h4></div>',
=======
		'before_title'  => '<div class="widget-title-container"><h3 class="widget-title" itemprop="name">',
		'after_title'   => '</h3></div>',
>>>>>>> b6d2702... initial commit
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Left Sidebar', 'qqlanding' ),
		'id'			=> 'left-sidebar',
		'description'	=> esc_html__( 'Add widgets here to appear in the left side of your site', 'qqlanding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s" itemprop="mainEntity">',
		'after_widget'  => '</section>',
<<<<<<< HEAD
		'before_title'  => '<div class="widget-title-container"><h4 class="widget-title" itemprop="name">',
		'after_title'   => '</h4></div>',
=======
		'before_title'  => '<div class="widget-title-container"><h3 class="widget-title" itemprop="name">',
		'after_title'   => '</h3></div>',
>>>>>>> b6d2702... initial commit
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'QQLanding: Right Footer Sidebar', 'qqlanding' ),
		'id'            => 'right-footer-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in the right footer side of your site.', 'qqlanding' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'QQLanding: Middle Footer Sidebar', 'qqlanding' ),
		'id'            => 'middle-footer-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in the middle footer side of your site.', 'qqlanding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'QQLanding: Left Footer Sidebar', 'qqlanding' ),
		'id'            => 'left-footer-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in the left footer side of your site.', 'qqlanding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title-container"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
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

/**
 * load the sections for the front page
 */
if( ! function_exists( 'qqlanding_load_section' ) ):

    /**
     * Load section
     * @since 1.0.0
     * @param $section_id
     */
    
	function qqlanding_load_section( $section_id ){
        /**
         * Hook before section
         */
        
        do_action( 'qqlanding_before_section_', $section_id );
        do_action( 'qqlanding_before_section_part_', $section_id );

        get_template_part( 'section-parts/section' , $section_id );

        /**
         * Hook after section
         */
        do_action( 'qqlanding_after_section_part_', $section_id );
        do_action( 'qqlanding_after_section_', $section_id );
	}

endif;

/**
 * Load the slider
 */
if( ! function_exists( 'qqlanding_load_slider' ) ):

	function qqlanding_load_slider(){
		if ( is_page_template( 'template-page.php' ) ) {
			qqlanding_load_slider('slider');
		}
	}

endif;

if ( ! function_exists( 'qqlanding_is_selective_refresh' ) ) :
    function qqlanding_is_selective_refresh() {
        return isset($GLOBALS['qqlanding_is_selective_refresh']) && $GLOBALS['qqlanding_is_selective_refresh'] ? true : false;
    }
endif;

<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> c973dc4... Update Slide
/**
 * Display the Grid item
 */
if ( ! function_exists( 'qqlanding_grid_sets' ) ) :

	function qqlanding_grid_sets( $grid_sets = 'both', $sets = 'blog' ){
		if ( $sets == 'page' ) { $sets = 'page'; }
		elseif ( $sets == 'single' ) { $sets = 'single'; }
		else{ $sets = 'blog'; }

		$layout = get_theme_mod( 'qqlanding_' . $sets . '_sidebar_layout', $grid_sets );


		switch ( $layout ) {
			case 'right': $grid_sets = 'col-12 col-md-12 col-lg-9'; $grid_side_sets = 'col-12 col-md-12 col-lg-3'; break;
			case 'left': $grid_sets = 'col-12 col-md-12 col-lg-9';  $grid_side_sets = 'col-12 col-md-12 col-lg-3';break;
			case 'none': $grid_sets = 'col-md-12';  $grid_side_sets = '';break;
			default: $grid_sets = 'col-12 col-md-12 col-lg-8';  $grid_side_sets = 'col-12 col-md-12 col-lg-2';break;
		}

		$grid_args = array( 'grid_sets' => $grid_sets, 'grid_side_sets' => $grid_side_sets );
		return apply_filters( 'qqlanding_grid_sets',$grid_args, $grid_sets );
	}

endif;


/**
 * Display the first image of the featured post,
 * if they don't have the featured post input
 */
<<<<<<< HEAD
=======
>>>>>>> b6d2702... initial commit
=======

>>>>>>> c973dc4... Update Slide

function get_first_image($src = null) {
   global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all( '/<img .+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
    if ( empty( $matches[1][0] ) || is_null( $matches[1][0] ) ) :
        // defines a fallback image
        $first_img = $matches[1]; 
        if ( empty( $matches[1][0] ) || is_null( $matches[1][0] ) ):
            $first_img = get_template_directory_uri() . "/assets/images/default.jpg";
        endif;
    else:
        $first_img = $matches[1][0]; 
    endif;

    return $first_img;
}

function if_file_exists( $image ){
  stream_context_set_default(
  	array(
  		'http' => array('method' => 'HEAD')
  ));
  $headers = get_headers($image, 1);
  return stristr($headers[0], '200');
}

/**
 * Custom Posts Navigations
 * Display navigation to next/previous set of posts when applicable.
 */
if ( ! function_exists('qqlanding_post_navigations') ) :

	function qqlanding_post_navigations(){

	    // Don't print empty markup if there's only one page.
	    if ( $GLOBALS[ 'wp_query' ]->max_num_pages < 2 ) {
	      return;
	    }
	    
	    $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	    $pagenum_link = html_entity_decode( get_pagenum_link() );
	    $query_args = array();
	    $url_parts = explode( '?', $pagenum_link  );

	    if ( isset( $url_parts[1] ) ) {
	      wp_parse_str( $url_parts[1], $query_args );
	    }

	    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	    /*Setup pagination nav*/
	    $links = paginate_links( array( 
	      'base'  => $pagenum_link,
	      'format' => $format,
	      'total' => $GLOBALS[ 'wp_query' ]->max_num_pages,
	      'mid_size' => 3,
	      'add_args' => array_map( 'urlencode', $query_args ),
	      'prev_text' => __( '<span class="meta-nav-prev"></span> Previous', 'qqlanding' ),
	      'next_text' => __( 'Next <span class="meta-nav-next"></span>', 'qqlanding' ),
	      'type'      => 'list'
	    ));
	    ?>
	    <nav class="navigation paging-navigation" role="navigation"  itemscope itemtype="http://schema.org/SiteNavigationElement">
	      <h1 class="screen-reader-text"><?php _e( 'Posts Navigation','qqlanding' ); ?></h1>
	      <?php echo $links; ?>
	    </nav>
	    <?php
  }

endif;