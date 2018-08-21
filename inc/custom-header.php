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
		'default-text-color'     => '000000',
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
 * Header Settings
 */

function qqlanding_header_set(){

	$template = get_field( 'header_template', 'option' );
	$alignment = get_field( 'header_nav_alignment', 'option' );
	$logo = get_theme_mod( 'site_logo', '' );
	$title_option = get_theme_mod( 'site_title_option', 'text-only' );

	//check weather the page is front
	if ( is_front_page() || is_home() ) {
		$before_title = '<h1 class="site-title" itemprop="name">';
		$after_title = '</h1>';
		$before_desc = '<h2 class="site-description" itemprop="description">';
		$after_desc = '</h2>';
	}else{
		$before_title = '<h2 class="site-title" itemprop="name">';
		$after_title = '</h2>';
		$before_desc = '<h3 class="site-description" itemprop="description">';
		$after_desc = '</h3>';
	}
	switch ($template) {
		case 'bare': $nav_class = "qqlanding-bare"; break;
		case 'overlay': $nav_class = "qqlanding-overlay"; break;
		default: $nav_class = "qqlanding-default"; break;
	}

	if ( $template == 'default' ) : ?>
		<div class="site-branding">
			<div class="container">
				<div class="row">
					<div class="col-md-4 px-0">
						<?php if ( $title_option == 'logo-only' && ! empty( $logo ) ) : ?>
							<?php echo $before_title; ?><a class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"></a><span class="sr-only"><?php echo get_bloginfo('name'); ?></span><?php echo $after_title; ?>
						<?php endif; ?>
						<?php if ( $title_option == 'text-logo' && ! empty( $logo ) ) : ?>
							<div class="site-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
							</div>
							<?php echo $before_title; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php echo $after_title; ?>
							<?php echo $before_desc; ?><?php bloginfo( 'description' ); ?> <?php echo $after_desc; ?>
						<?php endif; ?>
						<?php if ( $title_option == 'text-only' ): ?>
							<?php echo $before_title; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php echo $after_title; ?>
							<?php echo $before_desc; ?><?php bloginfo( 'description' ); ?> <?php echo $after_desc; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div><!-- .site-branding -->
	<?php endif;?>

	<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light py-md-0" data-toggle="affix" >
		<?php if( $template == 'bare' || $template == 'overlay' ) : ?>
			<div class="container">
		<?php endif;?>
			<?php if( $template == 'bare' || $template == 'overlay' ) : ?>
				<div class="site-branding navbar-brand">
					<?php if ( $title_option == 'logo-only' && ! empty( $logo ) ) : ?>
						<?php echo $before_title; ?><a class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"></a><span class="sr-only"><?php echo get_bloginfo('name'); ?></span><?php echo $after_title; ?>
					<?php endif; ?>
					<?php if ( $title_option == 'text-logo' && ! empty( $logo ) ) : ?>
						<div class="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
						</div>
						<?php echo $before_title; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php echo $after_title; ?>
						<?php echo $before_desc; ?><?php bloginfo( 'description' ); ?> <?php echo $after_desc; ?>
					<?php endif; ?>
					<?php if ( $title_option == 'text-only' ): ?>
						<?php echo $before_title; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php echo $after_title; ?>
						<?php echo $before_desc; ?> <?php bloginfo( 'description' ); ?> <?php echo $after_desc; ?>
					<?php endif; ?>
				</div><!-- .site-branding -->
			<?php endif;?>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<?php if( $template == 'default' ) : ?>
			<div class="container">
			<?php endif;?>
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'primary',
					'container'			=> 'div',
					'container_id'		=> 'primary-menu',
					'container_class'	=> 'navbar-collapse collapse',
					'menu_class'		=> 'navbar-nav',
					'fallback_cb'		=> 'wp_navwalker::fallback',
					'walker'			=> new wp_navwalker()
				) );
				?>
			<?php if( $template == 'default' ) : ?>
			</div>
			<?php endif;?>
		<?php if( $template == 'default' ) : ?>
		</div>
		<?php endif;?>
	</nav><!-- #site-navigation -->
	<?php
}