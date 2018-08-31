<?php
/**
 * QQLanding functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package QQLanding
 */

if ( ! function_exists( 'qqlanding_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function qqlanding_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on QQLanding, use a find and replace
		 * to change 'qqlanding' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'qqlanding', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'default', 724, 410, true );
		//add_image_size( 'featured-slider', 752, 440, true );
		add_image_size( 'featured', 388, 220, true );
		add_image_size( 'fp-featured', 381, 251, true );
		add_image_size( 'small-featured', 292, 180, true );
		add_image_size( 'small-thumb', 120,85, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'qqlanding' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'qqlanding_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		/*add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );*/
	}
endif;
add_action( 'after_setup_theme', 'qqlanding_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function qqlanding_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'qqlanding_content_width', 640 );
}
add_action( 'after_setup_theme', 'qqlanding_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function qqlanding_scripts() {

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css', 'v4.1.1', true);

	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/css/fontawesome-all.css', 'v5.0.9', true);

	wp_enqueue_style( 'qqlanding-acf-style', get_template_directory_uri() . '/assets/css/acf-style-editor.css', 'v1.0.0' );

	wp_enqueue_style( 'qqlanding-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', 'v2.3.4' );

	wp_enqueue_style( 'qqlanding-style', get_stylesheet_uri() );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), 'v2.3.4' );

	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.1.1', true );

	wp_enqueue_script( 'general-script', get_template_directory_uri() . '/assets/js/general.js', array('jquery'), 'v0.1.1', true );

	//wp_enqueue_script( 'qqlanding-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'qqlanding-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qqlanding_scripts' );

/**
 * Custom Navigation
 */
require get_template_directory() . '/inc/wp_menu_nav.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Extra Functions 
 */
require get_template_directory() . '/inc/extra.php';

/**
 * load Customizer Sanitization.
 */
require get_template_directory() . '/inc/customizer/sanitizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer custom styles.
 */
require get_template_directory() . '/inc/customizer/customizer_style.php';

/**
 * ACF Functions.
 */
require get_template_directory() . '/inc/acf/acf-functions.php';

/**
 * TGM Plugins.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Require.
 */
require_once get_template_directory() . '/inc/require.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}