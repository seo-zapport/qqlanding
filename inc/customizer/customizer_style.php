<?php
/**
 * Customizer Site Colors
 */

function theme_site_colors(){
	$theme_custom_style = '';
	$preloader_custom_style = '';
	$theme_layout = get_field( 'th_layout', 'option' );

	//echo $theme_layout;

	$theme_wrap_color = get_theme_mod( 'qqLanding_wrap_color', '#f7f8f9');
	$theme_text_color = get_theme_mod( 'qqLanding_theme_text_color', '#222222');
	$theme_link_color = get_theme_mod( 'qqLanding_theme_link_color', '#02849c');
	$theme_link_hover_color = get_theme_mod( 'qqLanding_theme_link_hover_color', '#10aec7');

	$theme_wrap_color = esc_attr( $theme_wrap_color );
	$theme_text_color = esc_attr( $theme_text_color );
	$theme_link_color = esc_attr( $theme_link_color );
	$theme_link_hover_color = esc_attr( $theme_link_hover_color );

	/*-Pre-loader---**/
	$display_preloader = get_theme_mod( 'qqlanding_display_preloading_settings', true);
	$preloader_bg = get_theme_mod( 'qqlanding_bg_settings', 'color' );
	$preloader_bg_color = get_theme_mod( 'qqlanding_bg_color_settings', '#272525' );
	$preloader_bg_image = get_theme_mod( 'qqlanding_bg_image_settings' );
	$preloader_bg_opacity = get_theme_mod( 'qqlanding_range_settings', 0 );
	$preloader_item_color = get_theme_mod( 'qqlanding_vcolor_settings', '#ffffff' );

	if ( $theme_layout === 'wide' && ! is_front_page() || $theme_layout === 'wide' && is_home() ) {
		if ( $theme_wrap_color != '#f7f8f9' ) {
			$theme_custom_style .= '.site-content{
				background: '. $theme_wrap_color .';
			}';
		}
	}

	if ( $theme_layout === 'box' ) {
		if ( $theme_wrap_color != '#f7f8f9' ) {
			$theme_custom_style .= '.qqland-site-box.site{
				background: '. $theme_wrap_color .';
			}';
		}
	}

	if( $theme_text_color != '#222222'  ){
		$theme_custom_style .= '
		.qqlanding-sites{
			color: ' . $theme_text_color . ';
		}';
	}

	if( $theme_link_color != '#02849c' ){
		$theme_custom_style .= '.qqlanding-sites .widget a, .qqlanding-sites .entry-meta a, .qqlanding-sites .comments-link a, .qqlanding-sites .edit-link a{
			color: ' . $theme_link_color . ' !important;
		}';
	}

	if( $theme_link_hover_color != '#10aec7' ){
		$theme_custom_style .= '.qqlanding-sites .widget a:hover,.qqlanding-sites .widget a:focus,.qqlanding-sites .widget a:visited,
		.qqlanding-sites .entry-meta a:hover,.qqlanding-sites .entry-meta a:focus,.qqlanding-sites .entry-meta a:visited,.qqlanding-sites .comments-link a:hover,.qqlanding-sites .comments-link a:focus, .qqlanding-sites .comments-link a:visited, .qqlanding-sites .edit-link a:hover,.qqlanding-sites .edit-link a:focus, .qqlanding-sites .edit-link a:visited{
			color: ' . $theme_link_color . ' !important;
		}';
	}

	if ( is_page_template( 'template-page.php' ) ) {
		$theme_custom_style .= '.qqlanding-sites .site-content{padding-top: 0;}';
	}

	if ( $preloader_bg == 'image' ) {
		$preloader_custom_style .= '#qqpreload{background:url(' . $preloader_bg_image . ') no-repeat;background-color:#fff;background-position:top center;background-size:cover;opacity:' . $preloader_bg_opacity . ';}';
	}else{
		$preloader_custom_style .= '#qqpreload{background-color:' . $preloader_bg_color . ';opacity:' . $preloader_bg_opacity . ';}';
	}

	if ( $preloader_item_color != '#ffffff' ) {
		$preloader_custom_style .='.qqpreload_object{background-color:' . $preloader_item_color . ' !important;}';
	}

	$positions = get_field( 'vm_position_property' );
	$img_post = get_field( 'vm_img_position' );

	if ( ! empty($theme_custom_style) ) : ?>
		<style type="text/css">
			<?php echo $theme_custom_style; ?>#videoContent .content-vm-img{<?php echo content_img_postion($positions,$img_post['vm_position_top'],$img_post['vm_position_right'],$img_post['vm_position_left'],$img_post['vm_position_buttom']); ?>}
		</style>
	<?php endif;

	if ( $display_preloader && ! empty($preloader_custom_style) ) : ?>
		<style type="text/css">
			<?php echo $preloader_custom_style; ?>
		</style>
	<?php endif;
}
add_action( 'wp_head', 'theme_site_colors');