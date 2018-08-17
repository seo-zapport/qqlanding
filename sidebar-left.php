<?php
if ( !defined( 'ABSPATH' ) ) : exit; endif;
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package QQLanding
 */

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}
$blogs_sidebar_layout = qqlanding_grid_sets( 'both','blog'); ?>
<aside id="secondary-left" class="widget-area <?php echo $blogs_sidebar_layout['grid_side_sets'] ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<meta itemprop="author" content="<?php the_author();?>">
	<meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
	<meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
	<?php dynamic_sidebar( 'left-sidebar' ); ?>
</aside><!-- #secondary -->
