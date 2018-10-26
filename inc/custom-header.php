<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package QQLanding
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses qqlanding_header_style()
 */
function qqlanding_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'qqlanding_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'FFFFFF',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'qqlanding_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'qqlanding_custom_header_setup' );

if ( ! function_exists( 'qqlanding_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see qqlanding_custom_header_setup().
	 */
	function qqlanding_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;


/**
 * This function Contains All The scripts that Will be Loaded in the Theme Header including Custom Javascript, Custom CSS, etc.
 */
function QQLanding_initialize_header(){
	
	//CSS Begins
	echo "<style>";
		echo get_theme_mod( 'custom_css', '' );	
	echo "</style>";
	//CSS Ends
}
add_action( 'wp_head', 'QQLanding_initialize_header');


/**
 * Header Settings
 */

function qqlanding_header_set(){

	$template = get_field( 'header_template', 'option' );
	$alignment = get_field( 'header_nav_alignment', 'option' );
	$enabled = ( get_field( 'header_nav_en', 'option' ) == true) ? 'd-block' : 'd-none';

	$menu_class = ( $template == 'bare' || $template == 'overlay' ) ? 'navbar-nav justify-content-end' : 'navbar-nav';

	if ( empty( $template ) || $template == 'default' ):  ?>
		<div class="site-branding">
			<div class="container">
				<div class="row">
					<div class="col-md-4 px-0">
						<?php echo QQLanding_site_identity(); ?>
					</div>
				</div>
			</div>
		</div><!-- .site-branding -->
	<?php endif; ?>

	<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light py-md-0 <?php echo $enabled; ?>" data-toggle="affix" itemscope itemtype='http://schema.org/SiteNavigationElement'>
		<?php if( $template == 'bare' || $template == 'overlay' ) : ?>
			<div class="container">
		<?php endif;?>
			<?php if( $template == 'bare' || $template == 'overlay' ) : ?>
				<div class="site-branding navbar-brand">
					<?php echo QQLanding_site_identity(); ?>
				</div><!-- .site-branding -->
			<?php endif;?>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<?php /*if( $template == 'default' ) : ?>
			<div class="container">
			<?php endif;*/?>
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'primary',
					'container'			=> 'div',
					'container_id'		=> 'primary-menu',
					'container_class'	=> 'navbar-collapse collapse',
					'menu_class'		=> $menu_class,
					'fallback_cb'		=> 'wp_navwalker::fallback',
					'walker'			=> new wp_navwalker()
				) );
				?>
			<?php /*if( $template == 'default' ) : ?>
			</div>
			<?php endif;*/?>
		<?php if( $template == 'bare' || $template == 'overlay' ) : ?>
		</div>
		<?php endif;?>
	</nav><!-- #site-navigation -->
	<?php
}