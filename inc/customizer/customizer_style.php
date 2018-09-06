<?php
/**
 * Customizer Site Colors
 */

function theme_site_colors(){
	$theme_custom_style = '';
	$theme_layout = get_field( 'th_layout', 'option' );

	//echo $theme_layout;

	$theme_wrap_color = get_theme_mod( 'qqLanding_wrap_color', '#f7f8f9');
	$theme_text_color = get_theme_mod( 'qqLanding_theme_text_color', '#222222');

	$theme_wrap_color = esc_attr( $theme_wrap_color );
	$theme_text_color = esc_attr( $theme_text_color );

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

	if ( is_page_template( 'template-page.php' ) ) {
		$theme_custom_style .= '.qqlanding-sites .site-content{padding-top: 0;}';
	}

	if ( ! empty($theme_custom_style) ) : ?>
		<style type="text/css">
			<?php echo $theme_custom_style; ?>
		</style>
	<?php endif;
}
add_action( 'wp_head', 'theme_site_colors');