<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package QQLanding
 */
if ( ! defined('ABSPATH')) exit;

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
		'before_title'  => '<div class="widget-title-container"><h4 class="widget-title" itemprop="name">',
		'after_title'   => '</h4></div>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Left Sidebar', 'qqlanding' ),
		'id'			=> 'left-sidebar',
		'description'	=> esc_html__( 'Add widgets here to appear in the left side of your site', 'qqlanding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s" itemprop="mainEntity">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title-container"><h4 class="widget-title" itemprop="name">',
		'after_title'   => '</h4></div>',
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
 * Load the video sections for the front page
 */
if ( ! function_exists('qqlanding_load_vsections') ) :
    /**
     * Load section
     * @since 1.0.0
     * @param $video_id
     */
    
	function qqlanding_load_vsections( $video_id ){
        /**
         * Hook before section
         */
        
        do_action( 'qqlanding_before_video_', $video_id );
        do_action( 'qqlanding_before_video_part_', $video_id );

        get_template_part( 'video-parts/video' , $video_id );

        /**
         * Hook after video
         */
        do_action( 'qqlanding_after_video_part_', $video_id );
        do_action( 'qqlanding_after_video_', $video_id );
	}
endif;

/**
 * Load the slider
 */
if( ! function_exists( 'qqlanding_load_slider' ) ):

	function qqlanding_load_slider(){
		if ( is_page_template( 'template-page.php' ) || is_page_template( 'template-videos.php' ) ) {
			qqlanding_load_slider('slider');
		}
	}

endif;

if ( ! function_exists( 'qqlanding_is_selective_refresh' ) ) :
    function qqlanding_is_selective_refresh() {
        return isset($GLOBALS['qqlanding_is_selective_refresh']) && $GLOBALS['qqlanding_is_selective_refresh'] ? true : false;
    }
endif;


function QQLanding_site_identity(){

	$site_branding_output = '';
	$title_option = get_theme_mod( 'site_title_option', 'text-only' );
	$logo = get_theme_mod( 'site_logo', '' );

	//check weather the page is front
	if ( is_front_page() || is_home() ) {
		$before_title = '<h1 class="site-title" itemprop="headline">';
		$after_title = '</h1>';
		$before_desc = '<h2 class="site-description" itemprop="description">';
		$after_desc = '</h2>';
	}else{
		$before_title = '<h2 class="site-title" itemprop="headline">';
		$after_title = '</h2>';
		$before_desc = '<h3 class="site-description" itemprop="description">';
		$after_desc = '</h3>';
	}

	if ( $title_option == 'logo-only' && ! empty( $logo ) ) :
		$site_branding_output .= $before_title . '<a class="navbar-brand " href="' . esc_url( home_url( '/' ) ) . '" rel="home" itemprop="url"><img src="' . esc_url( $logo ) . '" alt="' . get_bloginfo( 'name' ) . '" itemprop="image"></a><span class="sr-only">' . get_bloginfo('name') . '</span>' . $after_title;
	endif;
	if ( $title_option == 'text-logo' && ! empty( $logo ) ) :
		$site_branding_output .= '<div class="site-logo">';
			$site_branding_output .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" itemprop="url"><img src="' . esc_url( $logo ) . '" alt="' . get_bloginfo( 'name' ) .'" itemprop="image"></a>';
		$site_branding_output .= '</div>';
	endif;
	if ( $title_option == 'text-only' ):
		$site_branding_output .= $before_title . '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" itemprop="url">' . get_bloginfo( 'name' ) . '</a>' . $after_title;
		$site_branding_output .= $before_desc . get_bloginfo( 'description' ) . $after_desc;
	endif;

	return $site_branding_output;
}


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

if ( ! function_exists( 'qqLanding_post_thumbnails' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function qqLanding_post_thumbnails() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		
		$file 				= wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
		$html_meta_output		= '';  ?>

		<figure class="blogs-featured-image" itemprop="image" itemscope itemType="http://schema.org/ImageObject">
			<?php if ( is_singular() ) : ?>
				<link itemprop="url" href="<?php the_permalink(); ?>">
					<div class="post-thumbnail">
				<?php 
					if ( get_theme_mod( 'qqLanding_single_featured_img_display', true ) ):
						if( has_post_thumbnail() ) :
							if ( if_file_exists($file) ) :
								list($width, $height, $type, $attr) = getimagesize($file);
								$html_meta_output .= '<meta itemprop="width" content="' . $width . '">';
								$html_meta_output .= '<meta itemprop="height" content="' . $height . '">';
							endif;
						else:
							$file = get_first_image();
							if ( if_file_exists($file) ) :
								list($width, $height, $type, $attr) = getimagesize($file);
								$html_meta_output .=  '<meta itemprop="url" content="' . get_first_image(). '">';
								$html_meta_output .= '<meta itemprop="width" content="' . $width . '">';
								$html_meta_output .= '<meta itemprop="height" content="' . $height . '">';
							endif;
						endif;

						the_post_thumbnail('featured-slider', array( 'itemprop' => 'image', 'class' => 'category-list-post-img img-responsive' ) );
						echo $html_meta_output;
					else:
						echo '<img class="sr-only" src="' . get_first_image(). '" itemprop="image">';
					endif; ?>
					</div><!-- .post-thumbnail -->
			<?php else : ?>
				<a href="<?php echo esc_url( get_permalink( ) ); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url" >
					<?php if( has_post_thumbnail() ) : ?>
						<link itemprop="url" href="<?php the_post_thumbnail_url(); ?>">
					<?php 
						if ( if_file_exists($file) ) :
							the_post_thumbnail( 'featured', array( 'itemprop' => 'contentUrl', 'class' => 'category-list-post-img img-responsive' ) );
							list($width, $height, $type, $attr) = getimagesize($file);
							$html_meta_output .= '<meta itemprop="width" content="' . $width . '">';
							$html_meta_output .= '<meta itemprop="height" content="' . $height . '">';
						endif;
					else:
						$html_meta_output .= '<meta itemprop="url" content="' . get_first_image() . '">';
						$file = get_first_image();
						if (if_file_exists($file)) :
							list($width, $height, $type, $attr) = getimagesize($file);
							$html_meta_output .= '<meta itemprop="width" content="' . $width . '">';
							$html_meta_output .= '<meta itemprop="height" content="' . $height . '">';

						endif;
					endif;
					echo $html_meta_output;
					?>
      			</a>
			<?php endif; // End is_singular(). ?>
		</figure>
	<?php }
endif;

if ( ! function_exists( 'qqLanding_post_img' )) {
	function qqLanding_post_img(){ ?>
		<figure class="blogs-featured-image" itemprop="image" itemscope itemType="http://schema.org/ImageObject">
			<?php
				$file 				= wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
				$meta_width 		= __( '<meta itemprop="width" content="292">', 'qqLanding' );
				$meta_height 		= __( '<meta itemprop="height" content="180">', 'qqLanding' );
				$html_meta_output		= '';
			?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<link itemprop="url" href="<?php the_permalink(); ?>">
				<?php 
				if( has_post_thumbnail() ) : 
					$file = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
					if ( if_file_exists($file) ) :?>
						<?php
						if ( is_page_template( 'template-page.php' ) ) {
							$size = 'fp-featured';
						}else{
							$size = 'small-featured';
						}
						the_post_thumbnail( $size, array(
								'alt' => the_title_attribute( array(
									'echo' => false,
								) ),
								'itemprop' => 'image'
							));
						list($width, $height, $type, $attr) = getimagesize($file);
						$html_meta_output .= '<meta itemprop="width" content="' . $width . '">';
						$html_meta_output .= '<meta itemprop="height" content="' . $height . '">';
					endif;
				else:
					$file = get_first_image();
					if (if_file_exists($file)) :
						list($width, $height, $type, $attr) = getimagesize($file);
					endif;
						$html_meta_output .= '<img src="' . get_first_image() . '" class="responsive-img category-list-post-img" itemprop="image" alt="qqLanding-no-thumbnail">';
						$html_meta_output .= $meta_width;
						$html_meta_output .= $meta_height;
				endif;
				echo $html_meta_output; ?>
			</a>
		</figure>
	<?php }
}

/**
 * Display the first image of the featured post,
 * if they don't have the featured post input
 */

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
            $first_img = get_template_directory_uri() . "/assets/images/default/thumbnail-default.png";
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

//Excerpt for frontpage
if ( ! function_exists('qqlanding_excerpt_length') ) {
	function qqlanding_excerpt_length( $length ){
		$fp_excerpt = get_theme_mod( 'qqlanding_excerpt_lenght', 85 );
		return $fp_excerpt;
	}
	add_filter( 'excerpt_length', 'qqlanding_excerpt_length', 999 );
}

function qqlanding_excerpt_max_charlength( $length, $allias ){
	$excerpt = get_the_excerpt(); //Retrieves the post excerpt.
	$length++;

	if ( mb_strlen( $excerpt ) > $length) :
		$subs = mb_substr( $excerpt, 0, $length - 5 );
		$exwords = explode( ' ', $subs );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		
		if ( $excut < 0 ) :
			$excerpt = mb_substr( $subs, 0, $excut );
		else:
			$excerpt = $subs;
		endif;
		$excerpt .= $allias;
	endif;

	echo $excerpt;
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

/* Blog URL */
function force_relative_url(){
	// get host name from URL
	preg_match("/^(http:\/\/)?([^\/]+)/i",home_url(), $matches);
	$host = $matches[2];
	// get last two segments of host name
	preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
	return strtoupper($matches[0]);
}

function qqlanding_footer_socket_class($footer_option, $has_nav){
	
	if ( $footer_option == 1 && $has_nav == true ) {
		$footer_class = 'col-12 col-md-6 col-lg-6';
		$has_nav_class = 'col-12 col-md-6 col-lg-6';
	}elseif (  $footer_option != 1 && $has_nav == true ) {
		$footer_class = '';
		$has_nav_class = 'col-12 col-md-12 col-lg-12';
	}elseif (  $footer_option == 1 && $has_nav == false) {
		$footer_class = 'col-12 col-md-12 col-lg-12';
		$has_nav_class = '';
	}else{
		$footer_class = '';
		$has_nav_class = '';
	}

	$footer_socket_args = array( 'footer_class' => $footer_class, 'has_nav_class' => $has_nav_class );

	return $footer_socket_args;
}

function wp_customizer_footer_script(){
	if ( ! empty( get_theme_mod( 'custom_script' ) ) ) {
		echo get_theme_mod( 'custom_script', '' );
	}
}
add_action( 'wp_footer', 'wp_customizer_footer_script');


/*ACF Videos*/
function custom_field_excerpt() {
	global $post;
	$text = get_sub_field('description'); //Replace 'your_field_name'
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 50; // 20 words
		$permalink = get_sub_field('video_url', false, false);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '<a href="'.$permalink.'" rel="nofollow" target="_blank">[Read more...]</a>');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

/**
 * Footer Extend script in video page template
 */
function qqlanding_video_script(){

	if ( is_page_template( 'template-videos.php' ) ) : ?>
		<script type="text/javascript">
			var urlBase = '<?= get_bloginfo("template_url"); ?>';
		</script>
	<?php endif;
}
add_action( 'wp_footer','qqlanding_video_script' );

