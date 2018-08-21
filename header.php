<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package QQLanding
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<<<<<<< HEAD

	<?php wp_head(); ?>
	<?php $layout = get_field( 'th_color_scheme', 'option' );?>
</head>

<body <?php body_class( 'qqlanding-sites qqland-' . qqlanding_schema( $layout ) ); ?>>
<div id="page" class="site container<?php echo ( get_field( 'th_layout', 'option' ) == 'wide' ) ? '-full' : ''; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'qqlanding' ); ?></a>
	
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="container">
				<?php echo $layout; ?>
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$qqlanding_description = get_bloginfo( 'description', 'display' );
				if ( $qqlanding_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $qqlanding_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		</div>

		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'qqlanding' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location'	=> 'primary',
				'container'			=> 'div',
				'container_id'		=> 'primary-menu',
				'container_class'	=> 'collapse navbar-collapse container',
				'menu_class'		=> 'navbar-nav',
				'fallback_cb'		=> 'wp_navwalker::fallback',
				'walker'			=> new wp_navwalker()
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<?php 
		//bry
			get_template_part( 'section-parts/section', 'slider' );

		//end bry
	?>

=======
	<?php wp_head(); ?>
	<?php 
		$layout = get_field( 'th_color_scheme', 'option' );
		$template = get_field( 'header_template', 'option' );
		switch ($template) {
			case 'bare': $nav_class = "qqlanding-bare"; break;
			case 'overlay': $nav_class = "qqlanding-overlay"; break;
			default: $nav_class = "qqlanding-default"; break;
		}
	?>
</head>
<body <?php body_class( 'qqlanding-sites qqland-' . qqlanding_schema( $layout ) ); ?>>
<div id="page" class="site container<?php echo ( get_field( 'th_layout', 'option' ) == 'wide' ) ? '-full' : ''; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'qqlanding' ); ?></a>
	<header id="masthead" class="site-header <?php echo $nav_class; ?>">
		<div class="site-top-info">
			<div class="container">
				<ul id="social_media" class="float-md-right">
					<li><a href="#"><i class=" fab fa-facebook-square"></i></a></li><!--facebook-->
					<li><a href="#"><i class=" fab fa-twitter-square"></i></a></li><!--twitter-->
					<li><a href="#"><i class=" fab fa-linkedin"></i></a></li><!--linkedin-->
					<li><a href="#"><i class=" fab fa-youtube-square"></i></a></li><!--youtube-->
					<li><a href="#"><i class=" fab fa-google-plus-square"></i></a></li><!--googleplus-->
					<li><a href="#"><i class=" fab fa-pinterest-square"></i></a></li><!--pinterest-->
					<li><a href="#"><i class=" fab fa-rss-square"></i></a></li><!--rss-->
					<li><a href="#"><i class=" fab fa-flickr"></i></a></li><!--flickr-->
				</ul>
				<span class="clearfix"></span>
			</div>
		</div>
		<?php qqlanding_header_set(); ?>
	</header><!-- #masthead -->

>>>>>>> 6eedb7e33fed81627fc5e71554e1754b0b749547
	<div id="content" class="site-content container">
		<div class="row">
