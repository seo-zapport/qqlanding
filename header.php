<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qqlanding
 */
if ( ! defined('ABSPATH')) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site container<?php echo ( get_field( 'th_layout', 'option' ) == 'wide' ) ? '-full qqland-site-full' : ' qqland-site-box'; ?>">
	<?php if ( th_layout() === 'box' ): ?>
		<div class="row">
	<?php endif;?> <!--if wide/box only-->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'qqlanding' ); ?></a>
	<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<?php if ( get_field( 'sm_header', 'option' ) === true): ?>
		<?php //if ( get_field( 'header_top_menu', 'option' ) === true): ?>
			<div class="site-top-info">
				<div class="container">
					<?php qqlanding_pll_sets(); ?>
					<?php qqlanding_social_media(); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php qqlanding_header_set(); ?>
	</header><!-- #masthead -->
	<?php if ( is_front_page() && ! is_home() ) qqlanding_load_section('slider'); ?>
	<div id="content" class="site-content <?php echo ( ! is_page_template( 'template-page.php' ) && ! is_page_template( 'template-videos.php' ) ) ? 'container' : ''; ?>">
		<?php 
			qqlanding_breadcrumb_list(); //breadcrumbs
			if ( ! is_page_template( 'template-page.php' ) && ! is_page_template( 'template-videos.php' ) && ! is_singular( 'video' ) || is_home() ): ?>
			<div class="row">
		<?php endif; ?>