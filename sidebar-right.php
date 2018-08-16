<?php
if ( !defined( 'ABSPATH' ) ) : exit; endif;
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package QQLanding
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
} ?>
<aside id="secondary-right" class="widget-area col-md-2" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<meta itemprop="author" content="<?php the_author();?>">
	<meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
	<meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- #secondary -->