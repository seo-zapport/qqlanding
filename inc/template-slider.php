<?php
/**
 * This is the slider template
 *
 * @package QQLanding
 */
function qqlanding_slider_func(){
	/**#Video Admin Page*/
	add_menu_page( 'Slider', 'Slider', 'manage_options', 'slider_settings', 'qqslider_func', 'dashicons-slides', 14 );

	//add_menu_page( 'Slider', 'Slider', 'manage_options', 'slider_settings', 'edit.php?post_type=slider', 'dashicons-slides', 14 );
	add_submenu_page( 'slider_settings', 'All Slider', 'All Slider', 'edit_posts', 'edit.php?post_type=slider' );
	//add_submenu_page( 'slider_settings', 'Settings', 'Settings', 'manage_options', 'qqslider-settings', 'qqslider_settings' );

	//Activate custom settings
	$add_init = array('qqlanding_app_custom_settings','qqlanding_nav_custom_settings','qqlanding_msc_custom_settings');
	foreach ($add_init as $init_val) { add_action( 'admin_init', $init_val ); }
	
}
add_action( 'admin_menu', 'qqlanding_slider_func' );

function qqlanding_app_custom_settings(){

	$app_args = array(
		'option_group' => array(
			'slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group','slider-appearance-group',
		),
		'option_name' => array(
			'preset','image_position','repeat_image','scroll','image_size','m_top','m_left','m_bottom','m_right','p_top','p_left','p_bottom','p_right','layout',
		),
		'sanitize' => array(
			'','','','','','','','','','','','','','',
		)
	);
	$count = count($app_args['option_group']);

	for($i = 0; $i < $count; $i++ ){	    
		register_setting( $app_args['option_group'][$i] , $app_args['option_name'][$i],$app_args['sanitize'][$i] );
	}
	add_settings_section( 'qqlanding-slider-app-options', 'Appearance', 'qqlanding_slider_app', 'slider_app_settings' );
	add_settings_field( 'slider-app', 'Text', 'qqlanding_slider_text', 'slider_app_settings', 'qqlanding-slider-app-options' );
}

function qqlanding_nav_custom_settings(){
	$app_args = array(
		'option_group' => array(
			'slider-nav-group','slider-nav-group','slider-nav-group','slider-nav-group','slider-nav-group','slider-nav-group',
		),
		'option_name' => array(
			'autoplay','auto_delay','auto_hover','arrows','dots','fade'
		),
		'sanitize' => array(
			'','','','','','',
		)
	);
	$count = count($app_args['option_group']);

	for($i = 0; $i < $count; $i++ ){	    
		register_setting( $app_args['option_group'][$i] , $app_args['option_name'][$i],$app_args['sanitize'][$i] );
	}
	add_settings_section( 'qqlanding-slider-nav-options', 'Navigation', 'qqlanding_slider_nav', 'slider_nav_settings' );
	add_settings_field( 'slider-nav', 'Text', 'qqlanding_nav_text', 'slider_nav_settings', 'qqlanding-slider-nav-options' );
}

function qqlanding_slider_app(){
	echo 'Slider basic setup.';
}

function qqlanding_slider_text(){
	$layout = esc_attr( get_option('layout') );
	$preset = esc_attr( get_option('preset') );
	$image_position = esc_attr( get_option('image_position') );
	$repeat_image = esc_attr( get_option('repeat_image') );
	$scroll = esc_attr( get_option('scroll') );
	$image_size = esc_attr( get_option('image_size') );
	$m_top = esc_attr( get_option('m_top') );
	$m_left = esc_attr( get_option('m_left') );
	$m_bottom = esc_attr( get_option('m_bottom') );
	$m_right = esc_attr( get_option('m_right') );
	$p_top = esc_attr( get_option('p_top') );
	$p_left = esc_attr( get_option('p_left') );
	$p_bottom = esc_attr( get_option('p_bottom') );
	$p_right = esc_attr( get_option('p_right') );

	$layouts = ( !empty($layout) ) ? $layout : 'static';

	switch ($preset) {
		case 'default':
			$post_attr = 'sr-only'; $repeat_attr = 'sr-only'; $scroll_attr = 'sr-only'; $size_attr = 'sr-only'; break;
		case 'fill_screen':
			$post_attr = ''; $repeat_attr = 'sr-only'; $scroll_attr = 'sr-only'; $size_attr = 'sr-only'; break;
		case 'fit_screen':
			$post_attr = ''; $repeat_attr = ''; $scroll_attr = 'sr-only'; $size_attr = 'sr-only'; break;
		case 'repeat':
			$post_attr = ''; $repeat_attr = 'sr-only'; $scroll_attr = ''; $size_attr = 'sr-only'; break;
		default:
			$post_attr = ''; $repeat_attr = ''; $scroll_attr = ''; $size_attr = ''; break;
	}
	?>
	<div class="input_slider_wrap">
		<label for="layout">layout</label>
		<label><input type="radio" name="layout" value="static" <?php checked($layouts, 'static'); ?> >Static</label>
		<label><input type="radio" name="layout" value="slider" <?php checked($layouts, 'slider'); ?> >Slider</label>
		<span class="clearfix"></span>
	</div>
	<div class="input_slider_wrap">
		<label for="preset">Preset</label>
		<select id="preset" name="preset">
			<option value="default" <?php selected($preset,'default'); ?> >Default</option>
			<option value="fill-screen" <?php selected($preset,'fill-screen'); ?> >Fill to screen</option>
			<option value="fit-to-screen" <?php selected($preset,'fit-to-screen'); ?> >Fit to screen</option>
			<option value="repeat" <?php selected($preset,'repeat'); ?> >Repeat</option>
			<option value="custom" <?php selected($preset,'custom'); ?> >Custom</option>
		</select>
	</div>
	<div id="image_post_wrap" class="input_slider_wrap <?php echo $post_attr; ?>">
		<label for="image_position">Position</label>
		<select id="image_position" name="image_position">
			<option value="left top" <?php selected($image_position,'left top'); ?> >Left top</option>
			<option value="center top" <?php selected($image_position,'center top'); ?> >Center top</option>
			<option value="right top" <?php selected($image_position,'right top'); ?> >Right top</option>
			<option value="left center" <?php selected($image_position,'left center'); ?> >Left center</option>
			<option value="center center" <?php selected($image_position,'center center'); ?> >Center center</option>
			<option value="right center " <?php selected($image_position,'right center '); ?> >Right center</option>
			<option value="left bottom" <?php selected($image_position,'left bottom'); ?> >Left bottom</option>
			<option value="center bottom" <?php selected($image_position,'center bottom'); ?> >Center bottom</option>
			<option value="right bottom" <?php selected($image_position,'right bottom'); ?> >Right bottom</option>
		</select>
	</div>
	<div id="repeat_image_wrap" class="input_slider_wrap <?php echo $repeat_attr; ?>">
		<label for="repeat_image">Repeat Img</label>
		<input type="checkbox" id="repeat_image" name="repeat_image" value="1"<?php checked($repeat_image,1); ?> >
	</div>
	<div id="scroll_wrap" class="input_slider_wrap <?php echo $scroll_attr; ?>">
		<label for="scroll">Scroll Page</label>
		<input type="checkbox" id="scroll" name="scroll" value="1"<?php checked($scroll, 1); ?> >
	</div>
	<div id="image_size_wrap" class="input_slider_wrap <?php echo $size_attr; ?>">
		<label for="image_size">Image Size</label>
		<select id="image_size" name="image_size">
			<option value="auto"<?php selected($image_size,'auto'); ?> >Original</option>
			<option value="contain"<?php selected($image_size,'contain'); ?> > Fit to screen</option>
			<option value="cover"<?php selected($image_size,'cover'); ?> >Fill screen</option>
		</select>
	</div>
	<div class="input_slider_wrap">
		<label for="margin">Margin</label>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="m_top" name="m_top" value="<?php echo esc_attr($m_top); ?>"></div></div>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="m_left" name="m_left" value="<?php echo esc_attr($m_left); ?>"></div></div>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="m_bottom" name="m_bottom" value="<?php echo esc_attr($m_bottom); ?>"></div></div>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="m_right" name="m_right" value="<?php echo esc_attr($m_right); ?>"></div></div>
	</div>
	<div class="input_slider_wrap">
		<label for="padding">Padding</label>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="p_top" name="p_top" value="<?php echo esc_attr($p_top); ?>"></div></div>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="p_left" name="p_left" value="<?php echo esc_attr($p_left); ?>"></div></div>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="p_bottom" name="p_bottom" value="<?php echo esc_attr($p_bottom); ?>"></div></div>
		<div class="qqInput_group"><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="p_right" name="p_right" value="<?php echo esc_attr($p_right); ?>"></div></div>
	</div>
	<?php
	
}
function qqlanding_slider_nav(){
	echo 'Setup the sidebar with this some functionality.';
}

function qqlanding_nav_text(){
	$autoplay = esc_attr( get_option('autoplay') );
	$auto_delay = esc_attr( get_option('auto_delay') );
	$auto_hover = esc_attr( get_option('auto_hover') );
	$arrows = esc_attr( get_option('arrows') );
	$dots = esc_attr( get_option('dots') );
	$fade = esc_attr( get_option('fade') ); ?>

	<div class="input_slider_wrap">
		<label for="autoplay">Autoplay</label>
		<input type="checkbox" id="autoplay" name="autoplay" value="1"<?php checked($autoplay,1) ?> >
	</div>
	<div class="input_slider_wrap">
		<label for="auto_delay">Auto Delay</label>
		<input type="number" id="auto_delay" name="auto_delay" value="<?php echo ( !empty($auto_delay) ) ? $auto_delay: '5000'; ?>" >
	</div>
	<div class="input_slider_wrap">
		<label for="auto_hover">Auto on Hover</label>
		<select id="auto_hover" name="auto_hover">
			<option value="hover" <?php echo selected( $auto_hover, 'hover' ); ?>>Hover</option>
			<option value="false" <?php echo selected( $auto_hover, 'false' ); ?>>Stop</option>
		</select>
	</div>
	<div class="input_slider_wrap">
		<label for="arrows">Arrows</label>
		<input type="checkbox" id="arrows" name="arrows" value="1" <?php checked($arrows,1) ?> >
	</div>	
	<div class="input_slider_wrap">
		<label for="dots">Dots</label>
		<input type="checkbox" id="dots" name="dots" value="1" <?php checked($dots,1) ?> >
	</div>	
	<div class="input_slider_wrap">
		<label for="fade">fade</label>
		<input type="checkbox" id="fade" name="fade" value="1" <?php checked($fade,1) ?> >
	</div>	
<?php
}

function qqlanding_msc_custom_settings(){
	$app_args = array(
		'option_group' => array(
			'slider-ms-group','slider-ms-group','slider-ms-group','slider-ms-group',
		),
		'option_name' => array(
			'desk_h','tab_h','phone_h','slider_skew'
		),
		'sanitize' => array(
			'','','','',
		)
	);
	$count = count($app_args['option_group']);

	for($i = 0; $i < $count; $i++ ){	    
		register_setting( $app_args['option_group'][$i] , $app_args['option_name'][$i],$app_args['sanitize'][$i] );
	}
	add_settings_section( 'qqlanding-slider-msc-options', 'Miscellaneous', 'qqlanding_slider_msc', 'slider_msc_settings' );
	add_settings_field( 'slider-msc', 'Text', 'qqlanding_slider_msc_wrap', 'slider_msc_settings', 'qqlanding-slider-msc-options' );
}

function qqlanding_slider_msc(){
	echo 'Indicate the device height.';
}

function qqlanding_slider_msc_wrap(){
	$desk_h = (  !empty( get_option('desk_h') ) ) ? get_option('desk_h') : '820';
	$tab_h = ( !empty( get_option('tab_h') ) ) ? get_option('tab_h') : '520';
	$phone_h = ( !empty( get_option('phone_h') ) ) ? get_option('phone_h') : '40';
	$slider_skew = get_option('slider_skew'); ?>

	<div class="input_slider_wrap">
		<label for="margin">Desktop</label>
		<div class="qqInput_group"><span class="muted-text">Height</span><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="desk_h" name="desk_h" value="<?php echo esc_attr($desk_h); ?>"></div></div>
	</div>
	<div class="input_slider_wrap">
		<label for="margin">Tablet</label>
		<div class="qqInput_group"><span class="muted-text">Height</span><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="tab_h" name="tab_h" value="<?php echo esc_attr($tab_h); ?>"></div></div>
	</div>
	<div class="input_slider_wrap">
		<label for="margin">Mobile</label>
		<div class="qqInput_group"><span class="muted-text">Height</span><div class="qqInput_append">px</div><div class="qqInput_append_wrap"><input type="number" id="phone_h" name="phone_h" value="<?php echo esc_attr($phone_h); ?>"></div></div>
	</div>
	<div class="input_slider_wrap">
		<label for="slider_skew">Skew</label>
		<input type="checkbox" id="slider_skew" name="slider_skew" value="1" <?php checked($slider_skew,1) ?> >
		<span class="muted-text">Indicate whether you want to enable the skew or not.</span>
	</div>	
<?php 
}

function qqslider_func(){
	require_once (get_template_directory() . '/inc/admin-slider/dashboard.php' );
}
function qqslider_settings(){
	require_once (get_template_directory() . '/inc/admin-slider/settings.php' );
}


//Sanitization
//require_once (get_template_directory() . '/inc/admin-template/vid-sanitize.php' );