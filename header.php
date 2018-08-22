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
<div id="page" class="site container<?php echo ( get_field( 'th_layout', 'option' ) == 'wide' ) ? '-full qqland-site-full' : ' qqland-site-box'; ?>">
	<?php if (get_field( 'th_layout', 'option' ) == 'box'): ?>
		<div class="row">
	<?php endif;?> <!--if wide/box only-->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'qqlanding' ); ?></a>
	<header id="masthead" class="site-header <?php echo $nav_class; ?>">
		<?php if ( get_field( 'header_top_menu', 'option' ) === true): ?>
			<div class="site-top-info">
				<div class="container">
					<?php qqlanding_social_media(); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php qqlanding_header_set(); ?>
	</header><!-- #masthead -->

	<?php if ( is_front_page() && ! is_home() ) qqlanding_load_section('slider'); ?>
=======

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
>>>>>>> b6d2702... initial commit

	<div id="content" class="site-content container">
		<div class="row">
