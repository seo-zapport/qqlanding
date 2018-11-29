<?php
/**
 * This is were all of the functions for the 
 * ACF settings are created.
 */
if ( ! defined('ABSPATH')) exit;

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/';
    
    // return
    return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/plugins/advanced-custom-fields-pro/';
    
    // return
    return $dir;
}
// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/acf.php' );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5b87376114e45',
	'title' => 'Banner Ads Settings',
	'fields' => array(
		array(
			'key' => 'field_5b87a011b98b1',
			'label' => 'Notes',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<h4><i>UNLESS YOU ARE BRYAN, JEM OR R.C... PLEASE DO NOT DEACTIVATE OR DELETE OR DO ANYTHING WITH THIS PLUGIN. PLEASE ASK THOSE 3 PEOPLE BEFORE YOU DO ANYTHING WITH THIS PLUGIN. Thank you.</i></h4>',
			'new_lines' => '',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5b91db39376ff',
			'label' => '',
			'name' => 'fb_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fb_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b873d3e92c1f',
			'label' => 'Banner title',
			'name' => 'fb_banner_title',
			'type' => 'text',
			'instructions' => 'It will display the title of your banner but it won\'t show or display if you choose the floating layout.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'fb_banner_title',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b873deb92c22',
			'label' => 'Banner Layout',
			'name' => 'fb_banner_layout',
			'type' => 'radio',
			'instructions' => 'Indicate what layout of banner you want to appear in the front page.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'fb_banner_layout',
			),
			'choices' => array(
				'float' => 'Float',
				'slider' => 'Slider',
				'pop_up' => 'Pop up / Modal',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'float',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b873f2892c23',
			'label' => 'Layout settings',
			'name' => 'fb_layout_settings',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b87419192c24',
					'label' => 'Layout : floating selection',
					'name' => 'fb__layout',
					'type' => 'radio',
					'instructions' => 'Indicate whether you want the flat layout or the classic layout for floating banner.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'float',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fb__layout',
					),
					'choices' => array(
						'classic' => 'Classic',
						'flat' => 'Flat',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'flat',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b874d49a90e7',
					'label' => 'Layout : Slider',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'slider',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fb__slider',
					),
					'message' => 'Some settings for this layout is not yet released due to a tech issue. But you can use this slider layout.',
					'new_lines' => '',
					'esc_html' => 0,
				),
				array(
					'key' => 'field_5b874decf790c',
					'label' => 'Layout : Pop up',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'pop_up',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fb__popup',
					),
					'message' => 'This Pop-up Layout is coming soon.',
					'new_lines' => '',
					'esc_html' => 0,
				),
				array(
					'key' => 'field_5b87423892c25',
					'label' => 'Item',
					'name' => 'fb__item',
					'type' => 'repeater',
					'instructions' => 'Add the item of your banner here.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'float',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'fb__item',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 5,
					'layout' => 'table',
					'button_label' => 'Add Banner Item',
					'sub_fields' => array(
						array(
							'key' => 'field_5b87435092c26',
							'label' => 'Item Title',
							'name' => 'fb__item_title',
							'type' => 'text',
							'instructions' => 'Indicate the title of your item',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_title',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b87437d92c27',
							'label' => 'Image URL',
							'name' => 'fb__item_img_url',
							'type' => 'url',
							'instructions' => 'Indicate the image link of your image.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_img_url',
							),
							'default_value' => 'https://via.placeholder.com/150x160',
							'placeholder' => 'Eg: http://example.com/288/banner.gif',
						),
						array(
							'key' => 'field_5b8744e692c28',
							'label' => 'URL',
							'name' => 'fb__item_url',
							'type' => 'text',
							'instructions' => 'Indicate the link url of your ads.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_url',
							),
							'default_value' => '[link_alt ms=\'288\']',
							'placeholder' => 'ex : www.qq288rr.com',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b87458192c2a',
							'label' => 'Mobile URL',
							'name' => 'fb__item_mobile_url',
							'type' => 'text',
							'instructions' => 'Indicate the mobile link url of your ads.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_mobile_url',
							),
							'default_value' => '[link_alt ms=\'m288\']',
							'placeholder' => 'ex : www.qq288rr.com',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b8745e892c2b',
							'label' => 'Link Target',
							'name' => 'fb__item_link_target',
							'type' => 'true_false',
							'instructions' => 'Indicate whether you want to open the link in a new window or not.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_link_target',
							),
							'message' => 'Open link in a new window',
							'default_value' => 0,
							'ui' => 0,
							'ui_on_text' => '',
							'ui_off_text' => '',
						),
						array(
							'key' => 'field_5b87465392c2c',
							'label' => 'Link Relationship (XFN)',
							'name' => 'fb__item_xfn',
							'type' => 'text',
							'instructions' => 'Indicate the link relation of your ads.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_xfn',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b8747eb92c2d',
							'label' => 'Image BG Color',
							'name' => 'fb__item_img_bg_color',
							'type' => 'extended-color-picker',
							'instructions' => 'Indicate the background color of your image wrapper.',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b87419192c24',
										'operator' => '==',
										'value' => 'flat',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_img_bg_color',
							),
							'default_value' => '#272727',
							'color_palette' => '',
							'hide_palette' => 0,
						),
						array(
							'key' => 'field_5b8748fd92c30',
							'label' => 'Image Shadow',
							'name' => 'fb__item_img_shadow',
							'type' => 'extended-color-picker',
							'instructions' => 'Indicate the shadow of your image wrapper.',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b87419192c24',
										'operator' => '==',
										'value' => 'classic',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_img_shadow',
							),
							'default_value' => 'rgba(89,89,89,.82)',
							'color_palette' => '',
							'hide_palette' => 0,
						),
					),
				),
				array(
					'key' => 'field_5b88e14ff05a2',
					'label' => 'Items',
					'name' => 'fb__items',
					'type' => 'repeater',
					'instructions' => 'Add the item of your banner here.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'slider',
							),
						),
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'pop_up',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'fb__items',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 0,
					'layout' => 'table',
					'button_label' => 'Add Banner Item',
					'sub_fields' => array(
						array(
							'key' => 'field_5b88e14ff05a3',
							'label' => 'Item Title',
							'name' => 'fb__item_title',
							'type' => 'text',
							'instructions' => 'Indicate the title of your item',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_title',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b88e14ff05a4',
							'label' => 'Image URL',
							'name' => 'fb__item_img_url',
							'type' => 'url',
							'instructions' => 'Indicate the image link of your image.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_img_url',
							),
							'default_value' => 'https://via.placeholder.com/150x160',
							'placeholder' => 'Eg: http://example.com/288/banner.gif',
						),
						array(
							'key' => 'field_5b88e14ff05a5',
							'label' => 'URL',
							'name' => 'fb__item_url',
							'type' => 'text',
							'instructions' => 'Indicate the link url of your ads.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_url',
							),
							'default_value' => '[link_alt ms=\'288\']',
							'placeholder' => 'ex : www.qq288rr.com',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b88e14ff05a6',
							'label' => 'Mobile URL',
							'name' => 'fb__item_mobile_url',
							'type' => 'text',
							'instructions' => 'Indicate the mobile link url of your ads.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_mobile_url',
							),
							'default_value' => '[link_alt ms=\'m288\']',
							'placeholder' => 'ex : www.qq288rr.com',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b88e14ff05a7',
							'label' => 'Link Target',
							'name' => 'fb__item_link_target',
							'type' => 'true_false',
							'instructions' => 'Indicate whether you want to open the link in a new window or not.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_link_target',
							),
							'message' => 'Open link in a new window',
							'default_value' => 0,
							'ui' => 0,
							'ui_on_text' => '',
							'ui_off_text' => '',
						),
						array(
							'key' => 'field_5b88e14ff05a8',
							'label' => 'Link Relationship (XFN)',
							'name' => 'fb__item_xfn',
							'type' => 'text',
							'instructions' => 'Indicate the link relation of your ads.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_xfn',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b88e14ff05a9',
							'label' => 'Image BG Color',
							'name' => 'fb__item_img_bg_color',
							'type' => 'extended-color-picker',
							'instructions' => 'Indicate the background color of your image wrapper.',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b87419192c24',
										'operator' => '==',
										'value' => 'flat',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_img_bg_color',
							),
							'default_value' => '#272727',
							'color_palette' => '',
							'hide_palette' => 0,
						),
						array(
							'key' => 'field_5b88e14ff05aa',
							'label' => 'Image Shadow',
							'name' => 'fb__item_img_shadow',
							'type' => 'extended-color-picker',
							'instructions' => 'Indicate the shadow of your image wrapper.',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b87419192c24',
										'operator' => '==',
										'value' => 'classic',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_img_shadow',
							),
							'default_value' => 'rgba(89,89,89,.82)',
							'color_palette' => '',
							'hide_palette' => 0,
						),
					),
				),
				array(
					'key' => 'field_5b874a5c5693b',
					'label' => 'Item Side: BG Color',
					'name' => 'fb__item_side_bg_color',
					'type' => 'extended-color-picker',
					'instructions' => 'Indicate the background color of your side element.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'float',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => 'fb__item_side_bg_color',
					),
					'default_value' => 'transparent',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5b874b4e5693c',
					'label' => 'Item Side: Color',
					'name' => 'fb__item_side_color',
					'type' => 'extended-color-picker',
					'instructions' => 'Indicate the text color of your side element.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'float',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => 'fb__item_side_color',
					),
					'default_value' => '#FFFFFF',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5b874bb2f5b36',
					'label' => 'Item Side: Brand Logo',
					'name' => 'fb__item_side_brand_logo',
					'type' => 'repeater',
					'instructions' => 'Indicate the logo of each brand.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b873deb92c22',
								'operator' => '==',
								'value' => 'float',
							),
							array(
								'field' => 'field_5b87419192c24',
								'operator' => '==',
								'value' => 'flat',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fb__item_side_pv_logo',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 5,
					'layout' => 'table',
					'button_label' => 'Add brand logo',
					'sub_fields' => array(
						array(
							'key' => 'field_5b874c3cf5b37',
							'label' => '',
							'name' => 'fb__item_side_bl_logo',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'fb__item_side_bl_logo',
							),
							'return_format' => 'array',
							'preview_size' => 'medium',
							'library' => 'all',
							'min_width' => 41,
							'min_height' => '',
							'min_size' => '',
							'max_width' => 150,
							'max_height' => '',
							'max_size' => '',
							'mime_types' => 'jpg,png',
						),
					),
				),
			),
		),
		array(
			'key' => 'field_5b88e0efdbd78',
			'label' => 'Appearance Settings',
			'name' => 'fb_slider_appearance_group',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b873deb92c22',
						'operator' => '==',
						'value' => 'slider',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fb_slider_appearance_group',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5b88e0efdbd79',
					'label' => 'Autoplay',
					'name' => 'slider_autoplay',
					'type' => 'true_false',
					'instructions' => 'Indicate whether or not autoplay will enabled',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_autoplay',
					),
					'message' => 'Enable Autoplay ?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b88e0efdbd7a',
					'label' => 'Arrows',
					'name' => 'slider_arrows',
					'type' => 'true_false',
					'instructions' => 'Indicate whether the arrow buttons will be created.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_arrows',
					),
					'message' => 'Display Arrows?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b88e0efdbd7b',
					'label' => 'Navigation Dots',
					'name' => 'slider_nav_dots',
					'type' => 'true_false',
					'instructions' => 'Indicate whether the navigation dots will be created.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_nav_dots',
					),
					'message' => 'Display nav dots?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-banner-ads',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5b73e3337f7b7',
	'title' => 'Front Page',
	'fields' => array(
		array(
			'key' => 'field_5b834fa09a25f',
			'label' => 'Notes',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<h4><i>UNLESS YOU ARE BRYAN, JEM OR R.C... PLEASE DO NOT DEACTIVATE OR DELETE OR DO ANYTHING WITH THIS PLUGIN. PLEASE ASK THOSE 3 PEOPLE BEFORE YOU DO ANYTHING WITH THIS PLUGIN. Thank you.</i></h4>',
			'new_lines' => '',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5b8350050932f',
			'label' => 'Providers',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b91d85e88701',
			'label' => '',
			'name' => 'pvs_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'pvs_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b83501a09330',
			'label' => 'Section Title',
			'name' => 'pvs_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'pvs_title',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b83566409332',
			'label' => 'Providers Settings',
			'name' => 'pvs_settings',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5b83506f09331',
					'label' => 'Icons Colors',
					'name' => 'pvs_icons_colors',
					'type' => 'radio',
					'instructions' => 'You can choose between white or gray (default) to your provider\'s colors.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'pvs_icons_colors',
					),
					'choices' => array(
						'gray' => 'Default',
						'colored' => 'Colored',
						'white' => 'White',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'gray',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b8356bd09333',
					'label' => 'Background Color',
					'name' => 'pvs_bg_color',
					'type' => 'extended-color-picker',
					'instructions' => 'It will change the background color of your providers sections.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'pvs_bg_color',
					),
					'default_value' => 'transparent',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5b83576a57371',
					'label' => 'Border Color',
					'name' => 'pvs_border_color',
					'type' => 'color_picker',
					'instructions' => 'It will change the border color of your provider items.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'pvs_bg_color',
					),
					'default_value' => '#ffffff',
				),
			),
		),
		array(
			'key' => 'field_5b8358251ffc4',
			'label' => 'Providers Items',
			'name' => 'pvs_items',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'pvs_items',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'row',
			'button_label' => 'Add Items',
			'sub_fields' => array(
				array(
					'key' => 'field_5b8358691ffc5',
					'label' => 'Title',
					'name' => 'pvs_pi_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'pvs_pi_title',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5b8358cc1ffc6',
					'label' => 'Max Width',
					'name' => 'pvs_pi_max_width',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'pvs_pi_max_width',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '%',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b835969fd61c',
					'label' => 'Icon Items',
					'name' => 'pvs_pi_icon_item',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'pvs_pi_icon_item',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => 'Add Icons',
					'sub_fields' => array(
						array(
							'key' => 'field_5b8359b8fd61d',
							'label' => 'Icons Title',
							'name' => 'pvs__icons_title',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'pvs__icons_title',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b8359d0fd61e',
							'label' => 'Logo',
							'name' => 'pvs__icons_logo',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'pvs__icons_title',
							),
							'choices' => array(
								'bet368' => '368bet',
								'allbet' => 'Allbet',
								'ag' => 'Asia Gaming',
								'betsoft' => 'Betsoft',
								'ebet' => 'Ebet',
								'gameplay' => 'GAMEPLAY',
								'gd' => 'Gold Deluxe',
								'gp' => 'Gudang Poker',
								'habanero' => 'Habanero',
								'idn' => 'IDNPLAY',
								'isin4d' => 'Isin4D',
								'lottery' => 'Lottery',
								'mg' => 'Microgaming',
								'onework' => 'oneworks',
								'opus' => 'OPUSGAMING',
								'og' => 'Oriental Gaming',
								'ok368' => 'Ok368',
								'playtech' => 'Playtech',
								'pragmaticplay' => 'Pragmatic Play',
								'royal' => 'Royal Online',
								'spadegaming' => 'Spadegaming',
								'thegamingplatform' => 'The Gaming Platform',
								'ttg' => 'Top Trend Gaming',
								'txbet' => 'TXTBET',
								'txbet4d' => 'TXTBET4D',
								'txbet6d' => 'TXTBET6D',
							),
							'default_value' => array(
								0 => 'bet368',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'return_format' => 'value',
							'ajax' => 0,
							'placeholder' => '',
						),
					),
				),
			),
		),
		array(
			'key' => 'field_5b836877c7a83',
			'label' => 'Featured Post',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b91d8ae88702',
			'label' => '',
			'name' => 'fp_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b83697ac7a85',
			'label' => 'Display Item',
			'name' => 'fp_display_item',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'fp_display_item',
			),
			'choices' => array(
				'top' => 'Top of Post Content',
				'bottom' => 'Bottom of Post Content',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'top',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b836c79c7a87',
			'label' => 'Layout',
			'name' => 'fp_layout',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'fp_layout',
			),
			'choices' => array(
				'static' => 'Static',
				'slider' => 'Slider',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'static',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b836bd4c7a86',
			'label' => 'Background Attributes',
			'name' => 'fp_bg_attr',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'fp_bg_attr',
			),
			'choices' => array(
				'bg-color' => 'Background Color',
				'bg-image' => 'Background Image',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'bg-color',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b836e7fd5ac8',
			'label' => 'Color',
			'name' => 'fp_bg_color',
			'type' => 'extended-color-picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836bd4c7a86',
						'operator' => '==',
						'value' => 'bg-color',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'fp_bg_color',
			),
			'default_value' => '#FFFFFF',
			'color_palette' => '',
			'hide_palette' => 0,
		),
		array(
			'key' => 'field_5b836fc7658dd',
			'label' => 'Image',
			'name' => 'fp_bg_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836bd4c7a86',
						'operator' => '==',
						'value' => 'bg-image',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'fp_bg_image',
			),
			'return_format' => 'url',
			'preview_size' => 'large',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => 'jpg,png',
		),
		array(
			'key' => 'field_5b88c9b8337ad',
			'label' => 'Presets Settings',
			'name' => 'th_presets',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836bd4c7a86',
						'operator' => '==',
						'value' => 'bg-image',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'th_presets',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b88c94b337ac',
					'label' => 'Presets',
					'name' => 'fp_presets',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'fp_presets',
					),
					'choices' => array(
						'default' => 'Default',
						'fill-screen' => 'Fill Screen',
						'fit-to-screen' => 'Fit to Screen',
						'repeat' => 'Repeat',
						'custom' => 'Custom',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b88c9cf337b1',
					'label' => 'Image Position',
					'name' => 'fp_image_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'fill-screen',
							),
						),
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_image_position',
					),
					'choices' => array(
						'left top' => 'Left Top',
						'center top' => 'Center Top',
						'right top' => 'Right Top',
						'left center' => 'Left Center',
						'center center' => 'Center Center',
						'right center' => 'Right Center',
						'left bottom' => 'Left Bottom',
						'center bottom' => 'Center Bottom',
						'right-bottom' => 'Right Bottom',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'left top',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b88c9ce337b0',
					'label' => 'Repeat Background Image',
					'name' => 'fp_repeat_bg_img',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_repeat_bg_img',
					),
					'message' => 'Enable Repeat Background Image',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b88c9ca337af',
					'label' => 'Scroll with Page',
					'name' => 'fp_scroll_with_page',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_scroll_with_page',
					),
					'message' => 'Enable Scroll Page',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b88c9c0337ae',
					'label' => 'Image Size',
					'name' => 'fp_image_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b836bd4c7a86',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b88c94b337ac',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_image_size',
					),
					'choices' => array(
						'auto' => 'Original',
						'contain' => 'Fit to Screen',
						'cover' => 'Fill Screen',
					),
					'default_value' => array(
						0 => 'auto',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b83721f771a6',
			'label' => 'Item Layout',
			'name' => 'fp_ts_layout',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'static',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'fp_ts_layout',
			),
			'choices' => array(
				'card' => 'Card',
				'flat-colors' => 'Flat Colors',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'card',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b8380f412cef',
			'label' => 'Cards Themes',
			'name' => 'fp_ts_cards_layout',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'static',
					),
					array(
						'field' => 'field_5b83721f771a6',
						'operator' => '==',
						'value' => 'card',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'fp_ts_cards_layout',
			),
			'choices' => array(
				'default' => 'Default',
				'overlay' => 'Overlay',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'default',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b83820012cf0',
			'label' => 'Enabled Items',
			'name' => 'fp_ts_enabled_items',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'static',
					),
					array(
						'field' => 'field_5b83721f771a6',
						'operator' => '==',
						'value' => 'flat-colors',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'fp_ts_enabled_items',
			),
			'message' => 'Indicate weather you want to show / hide the item.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b83838ef8d24',
			'label' => 'Flat Colors',
			'name' => 'fp_flat_colors',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'static',
					),
					array(
						'field' => 'field_5b83721f771a6',
						'operator' => '==',
						'value' => 'flat-colors',
					),
					array(
						'field' => 'field_5b83820012cf0',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_flat_colors',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add flat colors',
			'sub_fields' => array(
				array(
					'key' => 'field_5b8383e6f8d25',
					'label' => 'Background Color',
					'name' => 'fp_fc_color',
					'type' => 'extended-color-picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_fc_color',
					),
					'default_value' => 'transparent',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5ba872705674b',
					'label' => 'Text Color',
					'name' => 'fp_fc_txt_color',
					'type' => 'extended-color-picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_fc_txt_color',
					),
					'default_value' => '#ffffff',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5ba873bd3b490',
					'label' => 'Hover Color',
					'name' => 'fp_fc_txt_hover',
					'type' => 'extended-color-picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_fc_txt_hover',
					),
					'default_value' => 'transparent',
					'color_palette' => '',
					'hide_palette' => 0,
				),
			),
		),
		array(
			'key' => 'field_5b8389c1f40ab',
			'label' => 'Padding',
			'name' => 'fp_padding',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'static',
					),
					array(
						'field' => 'field_5b83721f771a6',
						'operator' => '==',
						'value' => 'flat-colors',
					),
					array(
						'field' => 'field_5b83820012cf0',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_padding',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b8389e4f40ad',
					'label' => '',
					'name' => 'fp_padding_top',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_padding_top',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => 'Top',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b838a2b892fe',
					'label' => '',
					'name' => 'fp_padding_left',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_padding_left',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => 'Left',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b838a3d892ff',
					'label' => '',
					'name' => 'fp_padding_bottom',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_padding_bottom',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => 'Bottom',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b838a4f89300',
					'label' => '',
					'name' => 'fp_padding_right',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_padding_right',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => 'Right',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
			),
		),
		array(
			'key' => 'field_5b838ab6bc198',
			'label' => 'Border\'s',
			'name' => 'fp_border',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'static',
					),
					array(
						'field' => 'field_5b83721f771a6',
						'operator' => '==',
						'value' => 'flat-colors',
					),
					array(
						'field' => 'field_5b83820012cf0',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_border',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5ba87cec28a5e',
					'label' => 'Color',
					'name' => 'fp_border_color',
					'type' => 'extended-color-picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_border_color',
					),
					'default_value' => 'rgba(0, 0, 0, 0.125)',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5b838ab6bc19a',
					'label' => 'Width',
					'name' => 'fp_border_width',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_border_width',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b838ab6bc19b',
					'label' => 'Style',
					'name' => 'fp_border_style',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_border_style',
					),
					'choices' => array(
						'dotted' => 'Dotted',
						'dashed' => 'Dashed',
						'initial' => 'Initial',
						'solid' => 'Solid',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b838ab6bc19c',
					'label' => 'Radius',
					'name' => 'fp_border_radius',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_border_radius',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
			),
		),
		array(
			'key' => 'field_5b838d0e3c41a',
			'label' => 'Hover Transitions',
			'name' => 'fp_hover_trans',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'static',
					),
					array(
						'field' => 'field_5b83721f771a6',
						'operator' => '==',
						'value' => 'flat-colors',
					),
					array(
						'field' => 'field_5b83820012cf0',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_hover_trans',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b838d0e3c41b',
					'label' => '',
					'name' => 'fp_ht_enabled',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'fp_border_color',
					),
					'message' => 'Indicate to show/hide hover transitions',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b838d0e3c41c',
					'label' => '',
					'name' => 'fp_ht_hover',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b838d0e3c41b',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '75',
						'class' => '',
						'id' => 'fp_ht_hover',
					),
					'choices' => array(
						'hvr-bob' => 'Bob',
						'hvr-bounce-in' => 'Bounce In',
						'hvr-float' => 'Float',
						'hvr-grow' => 'Grow',
					),
					'default_value' => array(
						0 => 'hvr-float',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b83950339c4b',
			'label' => 'Appearance Settings',
			'name' => 'fp_slider_appearance_group',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b836c79c7a87',
						'operator' => '==',
						'value' => 'slider',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_slider_appearance_group',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5b83950339c4e',
					'label' => 'Autoplay',
					'name' => 'slider_autoplay',
					'type' => 'true_false',
					'instructions' => 'Indicate whether or not autoplay will enabled',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_autoplay',
					),
					'message' => 'Enable Autoplay ?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b83950339c4f',
					'label' => 'Arrows',
					'name' => 'slider_arrows',
					'type' => 'true_false',
					'instructions' => 'Indicate whether the arrow buttons will be created.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_arrows',
					),
					'message' => 'Display Arrows?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b83950339c50',
					'label' => 'Navigation Dots',
					'name' => 'slider_nav_dots',
					'type' => 'true_false',
					'instructions' => 'Indicate whether the navigation dots will be created.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_nav_dots',
					),
					'message' => 'Display nav dots?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
			),
		),
		array(
			'key' => 'field_5b850324a4bc1',
			'label' => 'Content',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b91d8c588703',
			'label' => '',
			'name' => 'content_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'content_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b92071bacb16',
			'label' => 'Content Attributes',
			'name' => 'content_item_a',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'content_item_a',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b92071cacb17',
					'label' => 'Content Position',
					'name' => 'fp_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'default' => 'Default',
						'left' => 'Left',
						'right' => 'Right',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'default',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5b92071cacb18',
					'label' => 'Content Images',
					'name' => 'fp_images',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb17',
								'operator' => '!=',
								'value' => 'default',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_images',
					),
					'return_format' => 'array',
					'preview_size' => 'default',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5b92071cacb19',
					'label' => 'Appearance Settings',
					'name' => 'fp_app_set',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'table',
					'sub_fields' => array(
						array(
							'key' => 'field_5b92071cacb1a',
							'label' => 'Height',
							'name' => 'ca_height',
							'type' => 'text',
							'instructions' => 'Set Min and Max Height of the Article',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => 'ca_height',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b92071cacb1b',
							'label' => 'Hide Image',
							'name' => 'ca_hide_image',
							'type' => 'true_false',
							'instructions' => 'Hide Image when it\'s Mobile Platform',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => 'ca_hide_image',
							),
							'message' => '',
							'default_value' => 0,
							'ui' => 1,
							'ui_on_text' => 'Yes',
							'ui_off_text' => 'No',
						),
					),
				),
				array(
					'key' => 'field_5b92071cacb1c',
					'label' => 'Images Position Property',
					'name' => 'images_pos_prop',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb17',
								'operator' => '!=',
								'value' => 'default',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5bd7f122311c3',
					'label' => 'Position',
					'name' => 'fp_img_position',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb1c',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_img_position',
					),
					'layout' => 'table',
					'sub_fields' => array(
						array(
							'key' => 'field_5bd7f122311c4',
							'label' => 'Top',
							'name' => 'fp_position_top',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5bd7f122311c5',
							'label' => 'Left',
							'name' => 'fp_position_left',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5bd7f122311c6',
							'label' => 'Right',
							'name' => 'fp_position_right',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5bd7f122311c7',
							'label' => 'Buttom',
							'name' => 'fp_position_buttom',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
					),
				),
				array(
					'key' => 'field_5b92071cacb22',
					'label' => 'Background',
					'name' => 'ci_bg',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'bg-image' => 'Background Images',
						'bg-color' => 'Background Color',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'bg-color',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5b92071cacb23',
					'label' => 'Background Image',
					'name' => 'ci_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '!=',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'ci_image',
					),
					'return_format' => 'array',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5b92071cacb24',
					'label' => 'Background Color',
					'name' => 'ci_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '==',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'ci_color',
					),
					'default_value' => '#000000',
				),
				array(
					'key' => 'field_5b92071cacb25',
					'label' => 'Presets',
					'name' => 'ci_presets',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'ci_presets',
					),
					'choices' => array(
						'default' => 'Default',
						'fill-screen' => 'Fill Screen',
						'fit-to-screen' => 'Fit to Screen',
						'repeat' => 'Repeat',
						'custom' => 'Custom',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b92071cacb26',
					'label' => 'Image Position',
					'name' => 'ci_image_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '!=',
								'value' => 'default',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_image_position',
					),
					'choices' => array(
						'left top' => 'Left Top',
						'center top' => 'Center Top',
						'right top' => 'Right Top',
						'left center' => 'Left Center',
						'center center' => 'Center Center',
						'right center' => 'Right Center',
						'left bottom' => 'Left Bottom',
						'center bottom' => 'Center Bottom',
						'right bottom' => 'Right Bottom',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'left top',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b92071cacb27',
					'label' => 'Repeat Background Image',
					'name' => 'ci_repeat_bg_img',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '!=',
								'value' => 'default',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '!=',
								'value' => 'fill-screen',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '!=',
								'value' => 'repeat',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_repeat_bg_img',
					),
					'message' => 'Enable Repeat Background Image',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b92071cacb28',
					'label' => 'Scroll with Page',
					'name' => 'ci_scroll_with_page',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_scroll_with_page',
					),
					'message' => 'Enable Scroll Page',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b92071cacb29',
					'label' => 'Image Size',
					'name' => 'ci_image_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b92071cacb22',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_image_size',
					),
					'choices' => array(
						'auto' => 'Original',
						'contain' => 'Fit to Screen',
						'cover' => 'Fill Screen',
					),
					'default_value' => array(
						0 => 'auto',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b9240eceeec4',
			'label' => 'Filter Fields',
			'name' => 'filter_fields_a',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'filter_fields_a',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Css Filter',
			'sub_fields' => array(
				array(
					'key' => 'field_5b9240eceeec5',
					'label' => 'Selection',
					'name' => 'filter_selection',
					'type' => 'select',
					'instructions' => 'Choose your filter elements.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'filter_selection',
					),
					'choices' => array(
						'blur' => 'Blur',
						'brightness' => 'Brightness',
						'contrast' => 'Contrast',
						'grayscale' => 'Grayscale',
						'hue-rotate' => 'Hue rotate',
						'invert' => 'Invert',
						'opacity' => 'Opacity',
						'saturate' => 'Saturate',
						'sepia' => 'Sepia',
					),
					'default_value' => array(
						0 => 'blur',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b9240eceeec6',
					'label' => 'Values',
					'name' => 'filter_values',
					'type' => 'number',
					'instructions' => 'Indicate number only',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'filter_values',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b9240eceeec7',
					'label' => 'Dimension',
					'name' => 'filter_dimension',
					'type' => 'select',
					'instructions' => 'Choose your dimension property.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'filter_dimension',
					),
					'choices' => array(
						'none' => 'No Value',
						'%' => 'Percentage',
						'deg' => 'Degree',
						'px' => 'Pixel',
					),
					'default_value' => array(
						0 => 'none',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b922fba63aeb',
			'label' => 'Content B',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b922fc563aec',
			'label' => '',
			'name' => 'content_enable_section_b',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'content_enable_section_b',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b922f9663ad7',
			'label' => 'Content Attributes',
			'name' => 'content_item_b',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'content_item_b',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b922f9663ad8',
					'label' => 'Content Position',
					'name' => 'fp_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'default' => 'Default',
						'left' => 'Left',
						'right' => 'Right',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'default',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5b922f9663ad9',
					'label' => 'Content Images',
					'name' => 'fp_images',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ad8',
								'operator' => '!=',
								'value' => 'default',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_images',
					),
					'return_format' => 'array',
					'preview_size' => 'default',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5b922f9663ada',
					'label' => 'Appearance Settings',
					'name' => 'fp_app_set',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'table',
					'sub_fields' => array(
						array(
							'key' => 'field_5b922f9663adb',
							'label' => 'Height',
							'name' => 'ca_height',
							'type' => 'text',
							'instructions' => 'Set Min and Max Height of the Article',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => 'ca_height',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b922f9663adc',
							'label' => 'Hide Image',
							'name' => 'ca_hide_image',
							'type' => 'true_false',
							'instructions' => 'Hide Image when it\'s Mobile Platform',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => 'ca_hide_image',
							),
							'message' => '',
							'default_value' => 0,
							'ui' => 1,
							'ui_on_text' => 'Yes',
							'ui_off_text' => 'No',
						),
					),
				),
				array(
					'key' => 'field_5b922f9663add',
					'label' => 'Images Position Property',
					'name' => 'images_pos_prop',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ad8',
								'operator' => '!=',
								'value' => 'default',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5b922f9663ade',
					'label' => 'Position',
					'name' => 'fp_img_position',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663add',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'table',
					'sub_fields' => array(
						array(
							'key' => 'field_5b922f9663adf',
							'label' => 'Top',
							'name' => 'fp_position_top',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b922f9663ae0',
							'label' => 'Left',
							'name' => 'fp_position_left',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b922f9663ae1',
							'label' => 'Right',
							'name' => 'fp_position_right',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b922f9663ae2',
							'label' => 'Buttom',
							'name' => 'fp_position_buttom',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 0,
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
					),
				),
				array(
					'key' => 'field_5b922f9663ae3',
					'label' => 'Background',
					'name' => 'ci_bg',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'bg-image' => 'Background Images',
						'bg-color' => 'Background Color',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'bg-color',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b922f9663ae4',
					'label' => 'Background Image',
					'name' => 'ci_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '!=',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'ci_image',
					),
					'return_format' => 'array',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5b922f9663ae5',
					'label' => 'Background Color',
					'name' => 'ci_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '==',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'ci_color',
					),
					'default_value' => '#000000',
				),
				array(
					'key' => 'field_5b922f9663ae6',
					'label' => 'Presets',
					'name' => 'ci_presets',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'ci_presets',
					),
					'choices' => array(
						'default' => 'Default',
						'fill-screen' => 'Fill Screen',
						'fit-to-screen' => 'Fit to Screen',
						'repeat' => 'Repeat',
						'custom' => 'Custom',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b923745d02f7',
					'label' => 'Image Position',
					'name' => 'ci_image_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b92071cacb25',
								'operator' => '!=',
								'value' => 'default',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_image_position',
					),
					'choices' => array(
						'left top' => 'Left Top',
						'center top' => 'Center Top',
						'right top' => 'Right Top',
						'left center' => 'Left Center',
						'center center' => 'Center Center',
						'right center' => 'Right Center',
						'left bottom' => 'Left Bottom',
						'center bottom' => 'Center Bottom',
						'right bottom' => 'Right Bottom',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'left top',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b922f9663ae8',
					'label' => 'Repeat Background Image',
					'name' => 'ci_repeat_bg_img',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b922f9663ae6',
								'operator' => '!=',
								'value' => 'default',
							),
							array(
								'field' => 'field_5b922f9663ae6',
								'operator' => '!=',
								'value' => 'fill-screen',
							),
							array(
								'field' => 'field_5b922f9663ae6',
								'operator' => '!=',
								'value' => 'repeat',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_repeat_bg_img',
					),
					'message' => 'Enable Repeat Background Image',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b922f9663ae9',
					'label' => 'Scroll with Page',
					'name' => 'ci_scroll_with_page',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b922f9663ae6',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b922f9663ae6',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_scroll_with_page',
					),
					'message' => 'Enable Scroll Page',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b922f9663aea',
					'label' => 'Image Size',
					'name' => 'ci_image_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b922f9663ae3',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b922f9663ae6',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'ci_image_size',
					),
					'choices' => array(
						'auto' => 'Original',
						'contain' => 'Fit to Screen',
						'cover' => 'Fill Screen',
					),
					'default_value' => array(
						0 => 'auto',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b924137d0e09',
			'label' => 'Filter Fields',
			'name' => 'filter_fields_b',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'filter_fields_b',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Css Filter',
			'sub_fields' => array(
				array(
					'key' => 'field_5b924137d0e0a',
					'label' => 'Selection',
					'name' => 'filter_selection',
					'type' => 'select',
					'instructions' => 'Choose your filter elements.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'filter_selection',
					),
					'choices' => array(
						'blur' => 'Blur',
						'brightness' => 'Brightness',
						'contrast' => 'Contrast',
						'grayscale' => 'Grayscale',
						'hue-rotate' => 'Hue rotate',
						'invert' => 'Invert',
						'opacity' => 'Opacity',
						'saturate' => 'Saturate',
						'sepia' => 'Sepia',
					),
					'default_value' => array(
						0 => 'blur',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b924137d0e0b',
					'label' => 'Values',
					'name' => 'filter_values',
					'type' => 'number',
					'instructions' => 'Indicate number only',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'filter_values',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b924137d0e0c',
					'label' => 'Dimension',
					'name' => 'filter_dimension',
					'type' => 'select',
					'instructions' => 'Choose your dimension property.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'filter_dimension',
					),
					'choices' => array(
						'none' => 'No Value',
						'%' => 'Percentage',
						'deg' => 'Degree',
						'px' => 'Pixel',
					),
					'default_value' => array(
						0 => 'none',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'administrator',
			),
			array(
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'webdev',
			),
		),
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-front-page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'comments',
		2 => 'featured_image',
	),
	'active' => 1,
	'description' => 'Display the settings for front page of qqlanding page',
));

acf_add_local_field_group(array(
	'key' => 'group_5b73bc09003b6',
	'title' => 'General Settings',
	'fields' => array(
		array(
			'key' => 'field_5b87356a5a5b9',
			'label' => 'Notes',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<h4><i>UNLESS YOU ARE BRYAN, JEM OR R.C... PLEASE DO NOT DEACTIVATE OR DELETE OR DO ANYTHING WITH THIS PLUGIN. PLEASE ASK THOSE 3 PEOPLE BEFORE YOU DO ANYTHING WITH THIS PLUGIN. Thank you.</i></h4>',
			'new_lines' => '',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5b73c01ae1056',
			'label' => 'General Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b73d4d18cb98',
			'label' => 'Theme Layout',
			'name' => 'th_layout',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'th_layout',
			),
			'choices' => array(
				'box' => 'Box',
				'wide' => 'Wide',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'box',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b73c058e1057',
			'label' => 'Theme Color Scheme',
			'name' => 'th_color_scheme',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'th_color_scheme',
			),
			'choices' => array(
				'qq288' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq288.jpg"><span class="th_title">QQ288</span>',
				'qq188' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq188.jpg"><span class="th_title">QQ188</span>',
				'qq101' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq101.jpg"><span class="th_title">QQ101</span>',
				'qq1x2' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq1x2.jpg"><span class="th_title">QQ1x2</span>',
				'qq724' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq724.jpg"><span class="th_title">QQ724</span>',
				'qqfortuna' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qqfortuna.jpg"><span class="th_title">QQfortuna</span>',
				'qq801' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq801.jpg"><span class="th_title">QQ801</span>',
				'qq882' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq882.jpg"><span class="th_title">QQ882</span>',
				'qq808' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq808.jpg"><span class="th_title">QQ808</span>',
				'qq828' => '<img src="/wp-content/themes/qqlanding/assets/images/acf-img/qq828.jpg"><span class="th_title">QQ828</span>',
				'custom' => 'Custom',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'qq288',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b7f699c2d37e',
			'label' => 'Theme Custom Color',
			'name' => 'tcc',
			'type' => 'group',
			'instructions' => 'It will allow you to change your Theme Color',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b73c058e1057',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'tcc',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b7fa23a45ee3',
					'label' => 'Links',
					'name' => 'tcc_links',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'tcc_links',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5b7f699c2d37f',
							'label' => 'Color',
							'name' => 'tcc_lc',
							'type' => 'color_picker',
							'instructions' => 'it will allow changing your links.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_lc',
							),
							'default_value' => '#ffffff',
						),
						array(
							'key' => 'field_5b7f699c2d380',
							'label' => 'Hover Color',
							'name' => 'tcc_lhc',
							'type' => 'color_picker',
							'instructions' => 'it will allow changing your hover, focus & active links.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_lhc',
							),
							'default_value' => '#b5b5b5',
						),
					),
				),
				array(
					'key' => 'field_5b7fa352c799d',
					'label' => 'Title',
					'name' => 'tcc_title',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5b7f699c2d381',
							'label' => 'Color',
							'name' => 'tcc_tc',
							'type' => 'color_picker',
							'instructions' => 'It will allow your title, widget title & single title to be changed.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_tc',
							),
							'default_value' => '#ffffff',
						),
						array(
							'key' => 'field_5b7f699c2d382',
							'label' => 'Bg Color',
							'name' => 'tcc_tbgc',
							'type' => 'color_picker',
							'instructions' => 'It will allow your title wrapper, widget title wrapper & single title wrapper to be changed.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_tbgc',
							),
							'default_value' => '#b5b5b5',
						),
						array(
							'key' => 'field_5b7f7e5e95daf',
							'label' => 'Bg Hover Color',
							'name' => 'tcc_tbgch',
							'type' => 'color_picker',
							'instructions' => 'It will allow your title wrapper, widget title wrapper & single title wrapper to be changed the hover.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_tbgch',
							),
							'default_value' => '#666666',
						),
						array(
							'key' => 'field_5b7f699c2d383',
							'label' => 'Bottom Color',
							'name' => 'tcc_tbc',
							'type' => 'color_picker',
							'instructions' => 'It will change the bottom of your title bg color.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_tbc',
							),
							'default_value' => '#b5b5b5',
						),
					),
				),
				array(
					'key' => 'field_5b7fa086d4612',
					'label' => 'Meta Tags',
					'name' => 'tcc_meta_tags',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'tcc_meta_tags',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5b7f6e4ef9181',
							'label' => 'Color',
							'name' => 'tcc_meta_color',
							'type' => 'color_picker',
							'instructions' => 'It will allow you to change your meta tags especially the category and tags text.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_meta_color',
							),
							'default_value' => '#7f7f7f',
						),
						array(
							'key' => 'field_5b7f6ea9f9182',
							'label' => 'BG Color',
							'name' => 'tcc_meta_bg_color',
							'type' => 'color_picker',
							'instructions' => 'It will allow you to change your meta tags especially the category and tags background.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_meta_bg_color',
							),
							'default_value' => '#7f7f7f',
						),
						array(
							'key' => 'field_5b7f6edaf9183',
							'label' => 'BG Hover Color',
							'name' => 'tcc_meta_bg_hc',
							'type' => 'color_picker',
							'instructions' => 'It will allow you to change your meta tags especially the category and tags background hover.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => 'tcc_meta_bg_hc',
							),
							'default_value' => '#7f7f7f',
						),
					),
				),
				array(
					'key' => 'field_5b7f9c83c6f27',
					'label' => 'Buttons',
					'name' => 'tcc_btn',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'tcc_btn',
					),
					'layout' => 'table',
					'sub_fields' => array(
						array(
							'key' => 'field_5b7f9c9dc6f28',
							'label' => 'Text Color',
							'name' => 'btn_text_color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'btn_text_color',
							),
							'default_value' => '#eaeaea',
						),
						array(
							'key' => 'field_5b7f9ccfc6f2a',
							'label' => 'Background Color',
							'name' => 'btn_bg_color',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'btn_bg_color',
							),
							'default_value' => '#e6e6e6',
						),
						array(
							'key' => 'field_5b7f9cf6c6f2b',
							'label' => 'Background Color Hover',
							'name' => 'btn_bgc_hover',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'btn_bgc_hover',
							),
							'default_value' => '#cccccc',
						),
						array(
							'key' => 'field_5b7f9d1dc6f2c',
							'label' => 'Background Color Focus',
							'name' => 'btn_bgc_focus',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'btn_bgc_focus',
							),
							'default_value' => '#aaaaaa',
						),
					),
				),
			),
		),
		array(
			'key' => 'field_5b73c6bd5df90',
			'label' => 'Theme Fonts',
			'name' => 'th_fonts',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'th_fonts',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'add fonts',
			'sub_fields' => array(
				array(
					'key' => 'field_5b73c7a35df91',
					'label' => 'Entry Item',
					'name' => 'th_entry_item',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'thr_entry_item',
					),
					'choices' => array(
						'body' => 'Body',
						'title' => 'Title',
						'content' => 'Content',
						'meta' => 'Meta',
						'link' => 'Link',
					),
					'default_value' => array(
						0 => 'title',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b73c81cff2ad',
					'label' => 'Fonts Family',
					'name' => 'thr_font_family',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'thr_font_family',
					),
					'choices' => array(
						'arial' => 'Arial',
						'arial_rounded_mt_std_regular' => 'Arial Arounded',
						'big_noodle_titling' => 'Big Noodle Titling',
						'helvetica' => 'Helvetica',
						'noto_sans_bold' => 'NotoSans-Bold',
						'noto_sans_bold_italic' => 'NotoSans-BoldItalic',
						'noto_sans_italic' => 'NotoSans-Italic',
						'noto_sans_regular' => 'NotoSans-Regular',
						'sans-serif' => 'Sans-serif',
						'segoe_ui' => 'Segoe UI',
					),
					'default_value' => array(
						0 => 'notosans-regular',
					),
					'allow_null' => 0,
					'multiple' => 1,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b73c916ff2ae',
					'label' => 'Fonts Size',
					'name' => 'thr_font_size',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'thr_font_size',
					),
					'default_value' => 14,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => 12,
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5b73c9e9ff2b0',
					'label' => 'Fonts Style',
					'name' => 'thr_font_style',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'thr_font_style',
					),
					'choices' => array(
						'normal' => 'Normal',
						'italic' => 'Italic',
						'initial' => 'Initial',
						'inherit' => 'Inherit',
						'oblique' => 'Oblique',
						'unset' => 'Unset',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b73c969ff2af',
					'label' => 'Font Weight',
					'name' => 'thr_font_weight',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'thr_font_weight',
					),
					'choices' => array(
						500 => 'Normal',
						600 => 'Bold',
						700 => 'Bolder',
					),
					'default_value' => array(
						0 => 500,
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b73c2078945e',
			'label' => 'Header Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bd2cb7ef6333',
			'label' => 'Header Navigation',
			'name' => 'header_nav_en',
			'type' => 'true_false',
			'instructions' => 'Indicate whether or not to enable the menu.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'header_nav_en',
			),
			'message' => 'Enable the Menu ?',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b73c21e8945f',
			'label' => 'Header Settings',
			'name' => 'th_nav_settings',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'th_header_settings',
			),
			'message' => 'Do you want to enabled Affixed?',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b73d8cfc3b50',
			'label' => 'Header Template',
			'name' => 'header_template',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'header_template',
			),
			'choices' => array(
				'default' => 'Default',
				'bare' => 'Bare',
				'overlay' => 'Overlay',
			),
			'default_value' => array(
				0 => 'default',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5b7f51bc8f080',
			'label' => 'Menu Color',
			'name' => 'menu_color',
			'type' => 'group',
			'instructions' => 'It will allow you to change your menu color',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b73c058e1057',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'menu_color',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5b7f68168f081',
					'label' => 'Wrapper Color',
					'name' => 'menu_wrapper_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b73c058e1057',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'menu_wrapper_color',
					),
					'default_value' => '#222222',
				),
				array(
					'key' => 'field_5b7f68ab8f085',
					'label' => 'Link Color',
					'name' => 'menu_link_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b73c058e1057',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'menu_link_color',
					),
					'default_value' => '#b5b5b5',
				),
				array(
					'key' => 'field_5b7f69038f086',
					'label' => 'Link Hover Color',
					'name' => 'menu_lhc',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b73c058e1057',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'menu_lhc',
					),
					'default_value' => '#7f7f7f',
				),
				array(
					'key' => 'field_5b7f68468f082',
					'label' => 'Menu Text Color',
					'name' => 'menu_mtc',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b73c058e1057',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'menu_mtc',
					),
					'default_value' => '#FFFFFF',
				),
				array(
					'key' => 'field_5b7f686d8f083',
					'label' => 'Menu Text Hover',
					'name' => 'menu_mth',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b73c058e1057',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'menu_mth',
					),
					'default_value' => '#7b7b7b7',
				),
			),
		),
		array(
			'key' => 'field_5bd2b483bcb5a',
			'label' => 'Social Media Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b751039fe5aa',
			'label' => 'Social Media in header',
			'name' => 'sm_header',
			'type' => 'true_false',
			'instructions' => 'Indicate whether or not to enable the top menu.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'sm_header',
			),
			'message' => 'Enable Top Menu ?',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bd2b4b9bcb5c',
			'label' => 'Social Media in footer',
			'name' => 'sm_footer',
			'type' => 'true_false',
			'instructions' => 'Indicate whether or not to enable social media.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'sm_footer',
			),
			'message' => 'Enable Social media?',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bd2b6d8f0581',
			'label' => 'Social Media Icon Shape',
			'name' => 'sm_icon_shape',
			'type' => 'radio',
			'instructions' => 'Choose you\'re the best icon shape.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => 'sm_icon_shape',
			),
			'choices' => array(
				'circle' => 'Circle',
				'square' => 'Square',
				'no_shape' => 'No Shape',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'square',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b88e487b0519',
			'label' => 'Footer Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bdac6af1e4b6',
			'label' => '',
			'name' => 'footer_bg_settings',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'footer_bg_settings',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5bdac6af1e4b8',
					'label' => 'Image',
					'name' => 'footer_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'footer_image',
					),
					'return_format' => 'url',
					'preview_size' => 'medium_large',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5bdac6af1e4ba',
					'label' => 'Presets',
					'name' => 'footer_presets',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'footer_presets',
					),
					'choices' => array(
						'default' => 'Default',
						'fill-screen' => 'Fill Screen',
						'fit-to-screen' => 'Fit to Screen',
						'repeat' => 'Repeat',
						'custom' => 'Custom',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bdac6af1e4bb',
					'label' => 'Image Position',
					'name' => 'footer_image_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bdac6af1e4ba',
								'operator' => '!=',
								'value' => 'default',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'footer_image_position',
					),
					'choices' => array(
						'left top' => 'Left Top',
						'center top' => 'Center Top',
						'right top' => 'Right Top',
						'left center' => 'Left Center',
						'center center' => 'Center Center',
						'right center' => 'Right Center',
						'left bottom' => 'Left Bottom',
						'center bottom' => 'Center Bottom',
						'right-bottom' => 'Right Bottom',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'left top',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5bdac6af1e4bc',
					'label' => 'Repeat Background Image',
					'name' => 'footer_repeat_bg_img',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bdac6af1e4ba',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5bdac6af1e4ba',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'footer_repeat_bg_img',
					),
					'message' => 'Enable Repeat Background Image',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bdac6af1e4bd',
					'label' => 'Scroll with Page',
					'name' => 'footer_scroll_with_page',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bdac6af1e4ba',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5bdac6af1e4ba',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'footer_scroll_with_page',
					),
					'message' => 'Enable Scroll Page',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bdac6af1e4be',
					'label' => 'Image Size',
					'name' => 'footer_image_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bdac6af1e4ba',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'footer_image_size',
					),
					'choices' => array(
						'auto' => 'Original',
						'contain' => 'Fit to Screen',
						'cover' => 'Fill Screen',
					),
					'default_value' => array(
						0 => 'auto',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5bebaefbb2bc7',
			'label' => '',
			'name' => 'footer_enable_title_bg',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'footer_enable_title_bg',
			),
			'message' => 'Indicate to show/hide the widget title in the footer',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b88e4a8b051a',
			'label' => 'Licensed settings',
			'name' => 'licensed_settings',
			'type' => 'group',
			'instructions' => 'Display the licensed in your footer area.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'licensed_settings',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5b88e605b051c',
					'label' => '',
					'name' => 'lcs_allow',
					'type' => 'true_false',
					'instructions' => 'Indicate whether you want to show/hide your licensed.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'lcs_allow',
					),
					'message' => 'Allow to enable ?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b88e5d2b051b',
					'label' => 'Title',
					'name' => 'lcs_title',
					'type' => 'text',
					'instructions' => 'Indicate the licensed title.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'lcs_title',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5b88e65db051d',
			'label' => 'Providers',
			'name' => 'providers',
			'type' => 'group',
			'instructions' => 'This is the settings where you can set up your banks by country.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'providers',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b88ed74b051e',
					'label' => 'Title',
					'name' => 'b_title',
					'type' => 'text',
					'instructions' => 'Indicate the title of your bank here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33333333333333',
						'class' => '',
						'id' => 'b_title',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5b88edacb051f',
					'label' => '',
					'name' => 'b_providers',
					'type' => 'radio',
					'instructions' => 'Select whether you want to bank or tv to be enabled.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33333333333333',
						'class' => '',
						'id' => 'b_providers',
					),
					'choices' => array(
						'bank' => 'Banks',
						'network' => 'Tv Network',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => '',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b88ee69b0522',
					'label' => 'Country',
					'name' => 'b_country',
					'type' => 'select',
					'instructions' => 'Choose the country where the bank is located.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33333333333333',
						'class' => '',
						'id' => 'b_country',
					),
					'choices' => array(
						'zh' => 'China',
						'id' => 'Indonesia',
						'my' => 'Malaysia',
						'th' => 'Thailand',
						'vn' => 'Vietnam',
					),
					'default_value' => array(
						0 => 'id',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b88edfeb0520',
					'label' => 'Bank Item',
					'name' => 'b_item',
					'type' => 'repeater',
					'instructions' => 'Allow choosing a bank item here.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b88edacb051f',
								'operator' => '==',
								'value' => 'bank',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 0,
					'layout' => 'table',
					'button_label' => 'Add banks',
					'sub_fields' => array(
						array(
							'key' => 'field_5b88ee48b0521',
							'label' => 'Bank Title',
							'name' => 'bb__title',
							'type' => 'text',
							'instructions' => 'Indicate the title of your bank.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'bb__title',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5b88eee0b0523',
							'label' => 'Bank Logo',
							'name' => 'bb_logo_id',
							'type' => 'select',
							'instructions' => 'Choose the banks that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'id',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'bb_logo_id',
							),
							'choices' => array(
								'bank_bri' => 'BANK BRI',
								'bca' => 'BCA',
								'bni' => 'BNI',
								'danamon' => 'Danamon',
								'mandiri' => 'Mandiri',
							),
							'default_value' => array(
								0 => 'danamon',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5b88f0b1b0526',
							'label' => 'Bank Logo',
							'name' => 'bb_logo_my',
							'type' => 'select',
							'instructions' => 'Choose the banks that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'my',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'bb_logo_my',
							),
							'choices' => array(
								'affinbank' => 'Affinbank',
								'alliance_bank' => 'Alliance Bank',
								'ambank_group' => 'Ambank Group',
								'bankrakyat' => 'bankRakyat',
								'citibank' => 'Citibank',
								'hongleong_bank' => 'Hongleong Bank',
								'hsbc' => 'HSBC',
								'ocbc_bank' => 'OCBC Bank',
								'rhb' => 'RHB',
								'uob' => 'UOB',
							),
							'default_value' => array(
								0 => 'citibank',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5b88ef74b0524',
							'label' => 'Bank Logo',
							'name' => 'bb_logo_th',
							'type' => 'select',
							'instructions' => 'Choose the banks that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'th',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'bb_logo_id',
							),
							'choices' => array(
								'bangkok_bank' => 'Bangkok Bank',
								'gsb' => 'Government Savings Bank',
								'kasikorn_bank' => 'Kasikorn Bank',
								'krungsri' => 'Krungsri',
								'krungthai_bank' => 'Krungthai Bank',
								'scb' => 'SCB',
							),
							'default_value' => array(
								0 => 'bangkok_bank',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5b88f05eb0525',
							'label' => 'Bank Logo',
							'name' => 'bb_logo_vn',
							'type' => 'select',
							'instructions' => 'Choose the banks that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'vn',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'bb_logo_vn',
							),
							'choices' => array(
								'acb' => 'ACB',
								'bidv' => 'BIDV',
								'donga' => 'Donga bank',
								'sacombank' => 'Sacombank',
								'techcombank' => 'Techcombank',
								'vietinbank' => 'Vietinbank',
								'vietcombank' => 'Vietcombank',
							),
							'default_value' => array(
								0 => 'acb',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5b88f141b0527',
							'label' => 'Bank Logo',
							'name' => 'bb_logo_zh',
							'type' => 'select',
							'instructions' => 'Choose the banks that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'zh',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'bb_logo_id',
							),
							'choices' => array(
								'bos' => 'Bank of Shanghai',
								'ibank' => 'Industrial Bank',
								'spd_bank' => 'SPD Bank',
								'ccbank' => 'China Citic Bank',
								'b_beijing' => 'Bank of Beijing',
								'huaxia_bank' => 'Huaxia Bank',
								'pinganbank' => 'Pinganbank',
								'maybank' => 'Maybank',
								'public_bank' => 'Public Bank',
								'cimb' => 'CIMB Bank',
								'ce_bank' => 'China Everbright Bank',
								'b_china' => 'Bank of China',
								'icbc' => 'ICBC',
								'abc' => 'Agricultural Bank of China',
								'cc_bank' => 'China Construction Bank',
								'cm_bank' => 'China Merchants Bank',
								'bank_com' => 'Bank of Communication',
								'crm_bank' => 'China Rural Commercial Bank',
								'cminshing_bank' => 'China Minsheng Bank',
								'psbchina' => 'Postal Savings Bank of China',
							),
							'default_value' => array(
								0 => 'bos',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
				),
				array(
					'key' => 'field_5bdb97f02fbb3',
					'label' => 'Tv Network Item',
					'name' => 'b_tv_item',
					'type' => 'repeater',
					'instructions' => 'Allow choosing a tv network item here.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b88edacb051f',
								'operator' => '==',
								'value' => 'network',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'b_tv_item',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 0,
					'layout' => 'table',
					'button_label' => 'Add banks',
					'sub_fields' => array(
						array(
							'key' => 'field_5bdb97f12fbb4',
							'label' => 'Network Title',
							'name' => 'prov_net__title',
							'type' => 'text',
							'instructions' => 'Indicate the title of your bank.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'prov_net__title',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5bdb97f12fbb5',
							'label' => 'Network Logo',
							'name' => 'prov_net_logo_id',
							'type' => 'select',
							'instructions' => 'Choose the tv network that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'id',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'prov_net_logo_id',
							),
							'choices' => array(
								'fox_sports' => 'Fox Sports',
								'sctv' => 'SCTV',
								'orangetv' => 'Orange TV',
								'k_vision' => 'K-Vision',
								'nexmedia' => 'Nexmedia',
								'indovision' => 'Indovision Digital',
								'supersoccer' => 'Super Soccer Tv',
							),
							'default_value' => array(
								0 => 'sctv',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5bed03d0c64cb',
							'label' => 'Network Logo',
							'name' => 'prov_net_logo_my',
							'type' => 'select',
							'instructions' => 'Choose the tv network that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'my',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'prov_net_logo_my',
							),
							'choices' => array(
								'astro' => 'Astro',
							),
							'default_value' => array(
								0 => 'astro',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5bed0405c64cc',
							'label' => 'Network Logo',
							'name' => 'prov_net_logo_th',
							'type' => 'select',
							'instructions' => 'Choose the tv network that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'th',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'prov_net_logo_th',
							),
							'choices' => array(
								'pptv_th' => 'PPTV HD',
								'truev_th' => 'True Vision',
							),
							'default_value' => array(
								0 => 'truev_th',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5bed036cc64ca',
							'label' => 'Network Logo',
							'name' => 'prov_net_logo_vn',
							'type' => 'select',
							'instructions' => 'Choose the tv network that you want to display.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5b88ee69b0522',
										'operator' => '==',
										'value' => 'vn',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'prov_net_logo_vn',
							),
							'choices' => array(
								'vn_tv' => 'Vietnam Tv',
								'kplus' => 'kPlus',
							),
							'default_value' => array(
								0 => 'vn_tv',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'administrator',
			),
			array(
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'webdev',
			),
		),
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'general-theme-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5bf640f7edc92',
	'title' => 'Slider',
	'fields' => array(
		array(
			'key' => 'field_5bfe5850d5982',
			'label' => 'Slider Item',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bf647c84324e',
			'label' => '',
			'name' => 'slider_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'slider_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bf6481d1507c',
			'label' => '',
			'name' => 'slider_item',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'slider_item',
			),
			'collapsed' => 'field_5b7503f98dc51',
			'min' => 1,
			'max' => 0,
			'layout' => 'row',
			'button_label' => 'Add slides',
			'sub_fields' => array(
				array(
					'key' => 'field_5bd7b282122a6',
					'label' => 'BG Attribute',
					'name' => 'slider_bg_attr',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'slider_bg_attr',
					),
					'choices' => array(
						'bg-image' => 'Background Image',
						'bg-color' => 'Background Color',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'bg-color',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b7503f98dc51',
					'label' => 'Image Slides',
					'name' => 'slide_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7b282122a6',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slide_image',
					),
					'return_format' => 'array',
					'preview_size' => 'medium_large',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5b7504a18dc52',
					'label' => 'Color Slides',
					'name' => 'slide_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7b282122a6',
								'operator' => '==',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slide_color',
					),
					'default_value' => '#000000',
				),
				array(
					'key' => 'field_5bf6481d15084',
					'label' => 'Title',
					'name' => 'slider_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'Title Slider',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bf6481d15085',
					'label' => 'Content',
					'name' => 'slider_content',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
				array(
					'key' => 'field_5bf6481d15086',
					'label' => 'Content Settings',
					'name' => 'content_settings',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'table',
					'sub_fields' => array(
						array(
							'key' => 'field_5bf6481d15087',
							'label' => 'Content Size',
							'name' => 'slider_content_size',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'full' => 'Full',
								'half' => 'Half',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => 'full',
							'layout' => 'horizontal',
							'return_format' => 'value',
						),
						array(
							'key' => 'field_5bf6481d15088',
							'label' => 'Content Position',
							'name' => 'slider_content_position',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5bf6481d15087',
										'operator' => '==',
										'value' => 'half',
									),
								),
							),
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'left' => 'Left',
								'right' => 'Right',
							),
							'default_value' => array(
								0 => 'left',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5bf6481d15089',
							'label' => 'Text Align',
							'name' => 'slider_text_align',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '25',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'center' => 'Center',
								'left' => 'Left',
								'right' => 'Right',
							),
							'default_value' => array(
								0 => 'left',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
				),
				array(
					'key' => 'field_5bd7afc05d135',
					'label' => 'Content Format Type',
					'name' => 'content_format_type',
					'type' => 'radio',
					'instructions' => 'Choose between video or image you want to show.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bf6481d15087',
								'operator' => '==',
								'value' => 'half',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'content_format_type',
					),
					'choices' => array(
						'image' => 'Image',
						'video' => 'Video',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'image',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5bd7afc05d136',
					'label' => 'Content Slider Video',
					'name' => 'content_slider_video',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7afc05d135',
								'operator' => '==',
								'value' => 'video',
							),
						),
					),
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '.mp4, .webm, .ogg, .swf, .flv',
				),
				array(
					'key' => 'field_5bd7afc05d137',
					'label' => 'Content Slider Images',
					'name' => 'content_slider_images',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7afc05d135',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5bf6481d1508b',
					'label' => 'Images Position Property',
					'name' => 'slid_position_property',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bf6481d15087',
								'operator' => '==',
								'value' => 'half',
							),
						),
					),
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bf6481d1508c',
					'label' => 'Hide Image',
					'name' => 'slide_hide_image',
					'type' => 'true_false',
					'instructions' => 'Hide Image when it\'s Mobile Platform',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bf6481d1508d',
					'label' => 'Position',
					'name' => 'slider_img_position',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bf6481d1508b',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'table',
					'sub_fields' => array(
						array(
							'key' => 'field_5bf6481d1508e',
							'label' => 'Top',
							'name' => 'slid_position_top',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5bf6481d1508f',
							'label' => 'Left',
							'name' => 'slid_position_left',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5bf6481d15090',
							'label' => 'Right',
							'name' => 'slid_position_right',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5bf6481d15091',
							'label' => 'Bottom',
							'name' => 'slid_position_bottom',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => 'px',
							'maxlength' => '',
						),
					),
				),
				array(
					'key' => 'field_5b8cefab2b003',
					'label' => 'Filter Fields',
					'name' => 'filter_fields',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'filter_fields',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => 'Add Css Filter',
					'sub_fields' => array(
						array(
							'key' => 'field_5b8cefff2b004',
							'label' => 'Selection',
							'name' => 'filter_selection',
							'type' => 'select',
							'instructions' => 'Choose your filter elements.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'filter_selection',
							),
							'choices' => array(
								'blur' => 'Blur',
								'brightness' => 'Brightness',
								'contrast' => 'Contrast',
								'grayscale' => 'Grayscale',
								'hue-rotate' => 'Hue rotate',
								'invert' => 'Invert',
								'opacity' => 'Opacity',
								'saturate' => 'Saturate',
								'sepia' => 'Sepia',
							),
							'default_value' => array(
								0 => 'blur',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'return_format' => 'value',
							'ajax' => 0,
							'placeholder' => '',
						),
						array(
							'key' => 'field_5b8cf0622b005',
							'label' => 'Values',
							'name' => 'filter_values',
							'type' => 'number',
							'instructions' => 'Indicate number only',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'filter_values',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => '',
							'max' => '',
							'step' => '',
						),
						array(
							'key' => 'field_5b8cf08b2b006',
							'label' => 'Dimension',
							'name' => 'filter_dimension',
							'type' => 'select',
							'instructions' => 'Choose your dimension property.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'filter_dimension',
							),
							'choices' => array(
								'none' => 'No Value',
								'%' => 'Percentage',
								'deg' => 'Degree',
								'px' => 'Pixel',
							),
							'default_value' => array(
								0 => 'none',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'return_format' => 'value',
							'ajax' => 0,
							'placeholder' => '',
						),
					),
				),
			),
		),
		array(
			'key' => 'field_5bfe5830d5978',
			'label' => 'Buttons',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bd7afc05d13f',
			'label' => 'Enter Site Button',
			'name' => 'enter_site_button',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'enter_site_button',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 2,
			'layout' => 'block',
			'button_label' => 'Add button',
			'sub_fields' => array(
				array(
					'key' => 'field_5bd7afc05d140',
					'label' => 'Track Links',
					'name' => 'btn_link',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'btn_link',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bd7afc05d141',
					'label' => 'Image',
					'name' => 'btn_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7afc05d146',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'btn_image',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => 235,
					'min_height' => 52,
					'min_size' => '',
					'max_width' => 255,
					'max_height' => 71,
					'max_size' => '',
					'mime_types' => 'jpg,png,gif',
				),
				array(
					'key' => 'field_5bd7afc05d142',
					'label' => 'Link Text',
					'name' => 'btn_text',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7afc05d146',
								'operator' => '==',
								'value' => 'text',
							),
						),
					),
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'btn_text',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bd7afc05d143',
					'label' => 'Link Relationship (xfn)',
					'name' => 'btn_xfn_r',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'btn_xfn_item',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 0,
					'layout' => 'block',
					'button_label' => 'add rel',
					'sub_fields' => array(
						array(
							'key' => 'field_5bd7afc05d144',
							'label' => '',
							'name' => 'btn_xfn_item',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => 'btn_xfn_item',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
				),
				array(
					'key' => 'field_5bd7afc05d145',
					'label' => 'Link Target',
					'name' => 'btn_target',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'btn_target',
					),
					'choices' => array(
						'_blank' => 'Blank',
						'_self' => 'Self',
					),
					'default_value' => array(
						0 => '_self',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bd7afc05d146',
					'label' => 'Buttons Type',
					'name' => 'btn_type',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'btn_type',
					),
					'choices' => array(
						'image' => 'Image',
						'text' => 'Text',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'image',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5bd7afc05d147',
					'label' => 'Device',
					'name' => 'btn_device',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'desktop' => 'Desktop',
						'mobile' => 'Mobile',
					),
					'default_value' => array(
						0 => 'desktop',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'slider',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'discussion',
		4 => 'comments',
		5 => 'author',
		6 => 'featured_image',
		7 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => 'This is were you can add, edit, delete your slider item.',
));

acf_add_local_field_group(array(
	'key' => 'group_5bfe224b49055',
	'title' => 'Slider Settings',
	'fields' => array(
		array(
			'key' => 'field_5bfe224b829b9',
			'label' => 'Notes',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<h4><i>UNLESS YOU ARE BRYAN, JEM OR R.C... PLEASE DO NOT DEACTIVATE OR DELETE OR DO ANYTHING WITH THIS PLUGIN. PLEASE ASK THOSE 3 PEOPLE BEFORE YOU DO ANYTHING WITH THIS PLUGIN. Thank you.</i></h4>',
			'new_lines' => '',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5bfe224b83d08',
			'label' => 'Appearance',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bfe224bce778',
			'label' => 'Presets',
			'name' => 'slide_presets',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
				),
			),
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => 'slide_presets',
			),
			'choices' => array(
				'default' => 'Default',
				'fill-screen' => 'Fill Screen',
				'fit-to-screen' => 'Fit to Screen',
				'repeat' => 'Repeat',
				'custom' => 'Custom',
			),
			'default_value' => array(
				0 => 'default',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5bfe224bceb6a',
			'label' => 'Image Position',
			'name' => 'slide_image_position',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'fill-screen',
					),
				),
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'fit-to-screen',
					),
				),
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'repeat',
					),
				),
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'slide_image_position',
			),
			'choices' => array(
				'left top' => 'Left Top',
				'center top' => 'Center Top',
				'right top' => 'Right Top',
				'left center' => 'Left Center',
				'center center' => 'Center Center',
				'right center' => 'Right Center',
				'left bottom' => 'Left Bottom',
				'center bottom' => 'Center Bottom',
				'right-bottom' => 'Right Bottom',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'left top',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5bfe224bcef53',
			'label' => 'Repeat Background Image',
			'name' => 'slide_repeat_bg_img',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'fit-to-screen',
					),
				),
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'slide_repeat_bg_img',
			),
			'message' => 'Enable Repeat Background Image',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bfe224bcf336',
			'label' => 'Scroll with Page',
			'name' => 'slide_scroll_with_page',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'repeat',
					),
				),
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'slide_scroll_with_page',
			),
			'message' => 'Enable Scroll Page',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bfe224bcf737',
			'label' => 'Image Size',
			'name' => 'slide_image_size',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b74efcc29857',
						'operator' => '==',
						'value' => 'bg-image',
					),
					array(
						'field' => 'field_5bfe224bce778',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => 'slide_image_size',
			),
			'choices' => array(
				'auto' => 'Original',
				'contain' => 'Fit to Screen',
				'cover' => 'Fill Screen',
			),
			'default_value' => array(
				0 => 'auto',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5bfe224b848cb',
			'label' => 'Opacity',
			'name' => 'slider_opacity',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'slider_opacity',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5bfe224b85cb0',
			'label' => 'Header fonts',
			'name' => 'slider_fonts_title',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'slider_fonts_title',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5bfe2253cf6a4',
					'label' => 'Color',
					'name' => 'slider_font_color',
					'type' => 'extended-color-picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_color',
					),
					'default_value' => '#FFFFFF',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5bfe2253cfa88',
					'label' => 'Fonts Family',
					'name' => 'slider_font_family',
					'type' => 'select',
					'instructions' => 'Sets the best fonts family.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_family',
					),
					'choices' => array(
						'arial' => 'Arial',
						'arial_rounded_mt_std_regular' => 'Arial Arounded',
						'big_noodle_titling' => 'Big Noodle Titling',
						'helvetica' => 'Helvetica',
						'noto_sans_bold' => 'NotoSans-Bold',
						'noto_sans_bold_italic' => 'NotoSans-BoldItalic',
						'noto_sans_italic' => 'NotoSans-Italic',
						'noto_sans_regular' => 'NotoSans-Regular',
						'sans-serif' => 'Sans-serif',
						'segoe_ui' => 'Segoe UI',
					),
					'default_value' => array(
						0 => 'noto_sans_regular',
					),
					'allow_null' => 0,
					'multiple' => 1,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bfe2253cfe6e',
					'label' => 'Fonts Size',
					'name' => 'slider_font_size',
					'type' => 'number',
					'instructions' => 'Sets the best fonts size.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_size',
					),
					'default_value' => 14,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => 12,
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5bfe2253d025a',
					'label' => 'Fonts Style',
					'name' => 'slider_font_style',
					'type' => 'select',
					'instructions' => 'Sets the fonts style.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_style',
					),
					'choices' => array(
						'normal' => 'Normal',
						'italic' => 'Italic',
						'initial' => 'Initial',
						'inherit' => 'Inherit',
						'oblique' => 'Oblique',
						'unset' => 'Unset',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bfe2253d0643',
					'label' => 'Font Weight',
					'name' => 'slider_font_weight',
					'type' => 'select',
					'instructions' => 'Sets the fonts weight.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_weight',
					),
					'choices' => array(
						500 => 'Normal',
						600 => 'Bold',
						700 => 'Bolder',
					),
					'default_value' => array(
						0 => 500,
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5bfe224b86860',
			'label' => 'Content fonts',
			'name' => 'slider_fonts_content',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'slider_fonts_content',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5bfe225534c4a',
					'label' => 'Color',
					'name' => 'slider_font_color',
					'type' => 'extended-color-picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_color',
					),
					'default_value' => '#FFFFFF',
					'color_palette' => '',
					'hide_palette' => 0,
				),
				array(
					'key' => 'field_5bfe225535030',
					'label' => 'Fonts Family',
					'name' => 'slider_font_family',
					'type' => 'select',
					'instructions' => 'Sets the best fonts family.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_family',
					),
					'choices' => array(
						'arial' => 'Arial',
						'arial_rounded_mt_std_regular' => 'Arial Arounded',
						'big_noodle_titling' => 'Big Noodle Titling',
						'helvetica' => 'Helvetica',
						'noto_sans_bold' => 'NotoSans-Bold',
						'noto_sans_bold_italic' => 'NotoSans-BoldItalic',
						'noto_sans_italic' => 'NotoSans-Italic',
						'noto_sans_regular' => 'NotoSans-Regular',
						'sans-serif' => 'Sans-serif',
						'segoe_ui' => 'Segoe UI',
					),
					'default_value' => array(
						0 => 'noto_sans_regular',
					),
					'allow_null' => 0,
					'multiple' => 1,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bfe225535418',
					'label' => 'Fonts Size',
					'name' => 'slider_font_size',
					'type' => 'number',
					'instructions' => 'Sets the best fonts size.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_size',
					),
					'default_value' => 14,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => 12,
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5bfe225535810',
					'label' => 'Fonts Style',
					'name' => 'slider_font_style',
					'type' => 'select',
					'instructions' => 'Sets the fonts style.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_style',
					),
					'choices' => array(
						'normal' => 'Normal',
						'italic' => 'Italic',
						'initial' => 'Initial',
						'inherit' => 'Inherit',
						'oblique' => 'Oblique',
						'unset' => 'Unset',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bfe225535bea',
					'label' => 'Font Weight',
					'name' => 'slider_font_weight',
					'type' => 'select',
					'instructions' => 'Sets the fonts weight.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_font_weight',
					),
					'choices' => array(
						500 => 'Normal',
						600 => 'Bold',
						700 => 'Bolder',
					),
					'default_value' => array(
						0 => 500,
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5bfe2342d1140',
			'label' => 'Navigation',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bfe224b84cb6',
			'label' => 'Appearance Settings',
			'name' => 'slider_appearance_group',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'row',
			'sub_fields' => array(
				array(
					'key' => 'field_5bfe2252150f3',
					'label' => 'Autoplay',
					'name' => 'slider_autoplay',
					'type' => 'true_false',
					'instructions' => 'Indicate whether or not autoplay will enabled',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_autoplay',
					),
					'message' => 'Enable Autoplay ?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bfe547c180e5',
					'label' => 'Autoplay Delay',
					'name' => 'slider_autoplay_delays',
					'type' => 'number',
					'instructions' => 'Indicate whether the delay that you want to trigger the slider.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_autoplay_delay',
					),
					'default_value' => 5000,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5bfe23f1b7872',
					'label' => 'Autoplay on hover',
					'name' => 'slider_autoplay_hover',
					'type' => 'select',
					'instructions' => 'Select whether you want to be on hover the slider.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_autoplay_hover',
					),
					'choices' => array(
						'hover' => 'Hover',
						'false' => 'Stop',
						'null' => 'None',
					),
					'default_value' => array(
						0 => 'pause',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bfe2252154d9',
					'label' => 'Arrows',
					'name' => 'slider_arrows',
					'type' => 'true_false',
					'instructions' => 'Indicate whether the arrow buttons will be created.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_arrows',
					),
					'message' => 'Display Arrows?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bfe2252158c7',
					'label' => 'Navigation Dots',
					'name' => 'slider_nav_dots',
					'type' => 'true_false',
					'instructions' => 'Indicate whether the navigation dots will be created.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_nav_dots',
					),
					'message' => 'Display nav dots?',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
			),
		),
		array(
			'key' => 'field_5bfe224b850b2',
			'label' => 'Animations Settings',
			'name' => 'slider_animations_group',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'slider_animations_group',
			),
			'layout' => 'row',
			'sub_fields' => array(
				array(
					'key' => 'field_5bfe2252ca41d',
					'label' => 'Fade',
					'name' => 'slider_animation_fade',
					'type' => 'true_false',
					'instructions' => 'Indicates if fade will be used',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_animation_fade',
					),
					'message' => 'Allow to fade ?',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
			),
		),
		array(
			'key' => 'field_5bfe236db786f',
			'label' => 'Miscellaneous',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bfe224b854af',
			'label' => 'Device Settings',
			'name' => 'rwd_settings',
			'type' => 'group',
			'instructions' => 'Indicate the height & width of your slider in every devices.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'rwd_settings',
			),
			'layout' => 'row',
			'sub_fields' => array(
				array(
					'key' => 'field_5bfe225319861',
					'label' => 'Desktop Height',
					'name' => 'slider_height',
					'type' => 'number',
					'instructions' => 'Sets the desktop height of the slide',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_height',
					),
					'default_value' => 420,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5bfe22531a049',
					'label' => 'Tablet Height',
					'name' => 'slider_tablet_height',
					'type' => 'number',
					'instructions' => 'Sets the tablet height of the slide',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_tablet_height',
					),
					'default_value' => 420,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5bfe22531a814',
					'label' => 'Mobile Height',
					'name' => 'slider_mobile_height',
					'type' => 'number',
					'instructions' => 'Sets the mobile height of the slide',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'slider_mobile_height',
					),
					'default_value' => 420,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
			),
		),
		array(
			'key' => 'field_5bfe224b87041',
			'label' => 'Skew',
			'name' => 'slider_skew',
			'type' => 'true_false',
			'instructions' => 'Indicate whether you want to enable the skew or not.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'slider_skew',
			),
			'message' => 'Enable skew ?',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'administrator',
			),
			array(
				'param' => 'user_role',
				'operator' => '==',
				'value' => 'webdev',
			),
		),
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'comments',
		2 => 'page_attributes',
	),
	'active' => 1,
	'description' => 'This is the slider sections where you can update your slider whenever you want.',
));

acf_add_local_field_group(array(
	'key' => 'group_5b849a5b832ac',
	'title' => 'Template : Front Page',
	'fields' => array(
		array(
			'key' => 'field_5b873591d127f',
			'label' => 'Notes',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<h4><i>UNLESS YOU ARE BRYAN, JEM OR R.C... PLEASE DO NOT DEACTIVATE OR DELETE OR DO ANYTHING WITH THIS PLUGIN. PLEASE ASK THOSE 3 PEOPLE BEFORE YOU DO ANYTHING WITH THIS PLUGIN. Thank you.</i></h4>',
			'new_lines' => '',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5b849ab85d799',
			'label' => 'Front Page : Featured Post',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b84a553042a0',
			'label' => 'Title',
			'name' => 'fp_post_title',
			'type' => 'text',
			'instructions' => 'Indicate the title for your featured section.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'fp_post_title',
			),
			'default_value' => 'Featured Post',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b84a1d35d79d',
			'label' => 'Excerpt Length',
			'name' => 'fp_post_excerpt_length',
			'type' => 'number',
			'instructions' => 'Indicate the length of your excerpt.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => 'fp_post_excerpt_length',
			),
			'default_value' => 50,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5bd7f24def63a',
			'label' => 'Position',
			'name' => 'fp_img_position',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_img_position',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5bd7f24def63b',
					'label' => 'Top',
					'name' => 'fp_position_top',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bd7f24def63c',
					'label' => 'Left',
					'name' => 'fp_position_left',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bd7f24def63d',
					'label' => 'Right',
					'name' => 'fp_position_right',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bd7f24def63e',
					'label' => 'Buttom',
					'name' => 'fp_position_buttom',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5bade24393486',
			'label' => 'Post type',
			'name' => 'fp_post_type',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_post_type',
			),
			'choices' => array(
				'recent' => 'Recent Post',
				'manual' => 'Featured Post',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5b84a2315d79e',
			'label' => 'Featured Post Item',
			'name' => 'fp_post_post',
			'type' => 'repeater',
			'instructions' => 'Select your best post to appear on the front page.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5bade24393486',
						'operator' => '==',
						'value' => 'manual',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_post_post',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Item',
			'sub_fields' => array(
				array(
					'key' => 'field_5b84a2655d79f',
					'label' => '',
					'name' => 'fp_post_p_object',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_post_p_object',
					),
					'post_type' => array(
						0 => 'post',
						1 => 'page',
					),
					'taxonomy' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				),
			),
		),
		array(
			'key' => 'field_5bade322be9b4',
			'label' => 'Recent Post Item',
			'name' => 'fp_recent_item',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5bade24393486',
						'operator' => '==',
						'value' => 'recent',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fp_recent_item',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5bade352be9b5',
					'label' => 'Number of post to show',
					'name' => 'fp_post_num',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_post_num',
					),
					'default_value' => 3,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5bade397be9b6',
					'label' => 'Order By',
					'name' => 'fp_post_order_by',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_post_order_by',
					),
					'choices' => array(
						'default' => 'Default',
						'id' => 'ID',
						'author' => 'Author',
						'title' => 'Title',
						'date' => 'Date',
						'rand' => 'Random Order',
					),
					'default_value' => array(
						0 => 'rand',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bade48dbe9b7',
					'label' => 'Order',
					'name' => 'fp_post_order',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'fp_post_order',
					),
					'choices' => array(
						'asc' => 'ASC',
						'desc' => 'DESC',
					),
					'default_value' => array(
						0 => 'desc',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b85eda51d1a5',
			'label' => 'Font page : Content',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b85ede71d1a6',
			'label' => 'Title',
			'name' => 'fa_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b85ee081d1a7',
			'label' => '',
			'name' => 'fa_content',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fb_content',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5b85eeb092112',
			'label' => 'Font page : Content B',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5b85ef383190d',
			'label' => 'Title',
			'name' => 'fb_title_b',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fb_title_b',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b85ef1b3190c',
			'label' => '',
			'name' => 'fb_content_b',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'fb_content_b',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-page.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'comments',
		2 => 'featured_image',
	),
	'active' => 1,
	'description' => 'Display the settings for Template: front page of qqlanding',
));

acf_add_local_field_group(array(
	'key' => 'group_5bc3dd44610d9',
	'title' => 'Template: VM',
	'fields' => array(
		array(
			'key' => 'field_5b8ccb8df1eaa',
			'label' => '',
			'name' => 'vm_item_static',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'slider_item_static',
			),
			'layout' => 'block',
			'sub_fields' => array(
			),
		),
		array(
			'key' => 'field_5b8ccbfcf1eb2',
			'label' => 'Title',
			'name' => 'vm_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_title',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5b8ccbfef1eb3',
			'label' => '',
			'name' => 'vm_content',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_content',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5bd7aed7b644c',
			'label' => 'Content Settings',
			'name' => 'vm_content_settings',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_content_settings',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5bd7aed7b644d',
					'label' => 'Content Size',
					'name' => 'vm_content_size',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_content_size',
					),
					'choices' => array(
						'full' => 'Full',
						'half' => 'Half',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'full',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5bd7aed7b644e',
					'label' => 'Content Position',
					'name' => 'vm_content_position',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7aed7b644d',
								'operator' => '==',
								'value' => 'half',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_content_position',
					),
					'choices' => array(
						'left' => 'Left',
						'right' => 'Right',
					),
					'default_value' => array(
						0 => 'left',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bd7aed7b644f',
					'label' => 'Text Align',
					'name' => 'vm_text_align',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_text_align',
					),
					'choices' => array(
						'center' => 'Center',
						'left' => 'Left',
						'right' => 'Right',
					),
					'default_value' => array(
						0 => 'left',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5b8ccc03f1eb8',
			'label' => 'Content Slider Images',
			'name' => 'vm_content_images',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => 'vm_content_images',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5b8ccc06f1eb9',
			'label' => 'Images Position Property',
			'name' => 'vm_position_property',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => 'vm_position_property',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b8ccc08f1eba',
			'label' => 'Hide Image',
			'name' => 'vm_hide_image',
			'type' => 'true_false',
			'instructions' => 'Hide Image when it\'s Mobile Platform',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33.33',
				'class' => '',
				'id' => 'vm_hide_image',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5b92071cacb1d',
			'label' => 'Position',
			'name' => 'vm_img_position',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5b8ccc06f1eb9',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_img_position',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5b92071cacb1e',
					'label' => 'Top',
					'name' => 'vm_position_top',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5b92071cacb1f',
					'label' => 'Left',
					'name' => 'vm_position_left',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5b92071cacb20',
					'label' => 'Right',
					'name' => 'vm_position_right',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5b92071cacb21',
					'label' => 'Buttom',
					'name' => 'vm_position_buttom',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => 'px',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-videos.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'discussion',
		2 => 'comments',
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5bd7bec04c7a4',
	'title' => 'VM Front Settings',
	'fields' => array(
		array(
			'key' => 'field_5bd7c6507a461',
			'label' => 'Editor Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bd7e36a61ef0',
			'label' => '',
			'name' => 'vm_editor_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_editor_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bd7c6cb32317',
			'label' => '',
			'name' => 'vm_editor_settings',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_editor_settings',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5b74efcc29857',
					'label' => 'BG Attribute',
					'name' => 'vm_bg_attr',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'vm_bg_attr',
					),
					'choices' => array(
						'bg-image' => 'Background Image',
						'bg-color' => 'Background Color',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'bg-color',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b8ccbcdf1eab',
					'label' => 'Image',
					'name' => 'vm_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'vm_image',
					),
					'return_format' => 'url',
					'preview_size' => 'medium_large',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5b8ccbe0f1eac',
					'label' => 'Color',
					'name' => 'vm_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'vm_color',
					),
					'default_value' => '#000000',
				),
				array(
					'key' => 'field_5b8ccbe6f1ead',
					'label' => 'Presets',
					'name' => 'vm_presets',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'vm_presets',
					),
					'choices' => array(
						'default' => 'Default',
						'fill-screen' => 'Fill Screen',
						'fit-to-screen' => 'Fit to Screen',
						'repeat' => 'Repeat',
						'custom' => 'Custom',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5b8ccbedf1eae',
					'label' => 'Image Position',
					'name' => 'vm_image_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'fill-screen',
							),
						),
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_image_position',
					),
					'choices' => array(
						'left top' => 'Left Top',
						'center top' => 'Center Top',
						'right top' => 'Right Top',
						'left center' => 'Left Center',
						'center center' => 'Center Center',
						'right center' => 'Right Center',
						'left bottom' => 'Left Bottom',
						'center bottom' => 'Center Bottom',
						'right-bottom' => 'Right Bottom',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'left top',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5b8ccbf5f1eaf',
					'label' => 'Repeat Background Image',
					'name' => 'vm_repeat_bg_img',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_repeat_bg_img',
					),
					'message' => 'Enable Repeat Background Image',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b8ccbf7f1eb0',
					'label' => 'Scroll with Page',
					'name' => 'vm_scroll_with_page',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_scroll_with_page',
					),
					'message' => 'Enable Scroll Page',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5b8ccbfaf1eb1',
					'label' => 'Image Size',
					'name' => 'vm_image_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5b74efcc29857',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5b8ccbe6f1ead',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_image_size',
					),
					'choices' => array(
						'auto' => 'Original',
						'contain' => 'Fit to Screen',
						'cover' => 'Fill Screen',
					),
					'default_value' => array(
						0 => 'auto',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5bd7c86e71c37',
			'label' => 'Matches Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bd7e39761ef1',
			'label' => '',
			'name' => 'vm_match_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_match_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bd7c87171c38',
			'label' => '',
			'name' => 'vm_match_settings',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_match_settings',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5bd7c87171c39',
					'label' => 'BG Attribute',
					'name' => 'vm_bg_attr',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'vm_bg_attr',
					),
					'choices' => array(
						'bg-image' => 'Background Image',
						'bg-color' => 'Background Color',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'bg-color',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5bd7c87171c3a',
					'label' => 'Image',
					'name' => 'vm_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'vm_image',
					),
					'return_format' => 'url',
					'preview_size' => 'medium_large',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5bd7c87171c3b',
					'label' => 'Color',
					'name' => 'vm_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'vm_color',
					),
					'default_value' => '#000000',
				),
				array(
					'key' => 'field_5bd7c87171c3c',
					'label' => 'Presets',
					'name' => 'vm_presets',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'vm_presets',
					),
					'choices' => array(
						'default' => 'Default',
						'fill-screen' => 'Fill Screen',
						'fit-to-screen' => 'Fit to Screen',
						'repeat' => 'Repeat',
						'custom' => 'Custom',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bd7c87171c3d',
					'label' => 'Image Position',
					'name' => 'vm_image_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'fill-screen',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_image_position',
					),
					'choices' => array(
						'left top' => 'Left Top',
						'center top' => 'Center Top',
						'right top' => 'Right Top',
						'left center' => 'Left Center',
						'center center' => 'Center Center',
						'right center' => 'Right Center',
						'left bottom' => 'Left Bottom',
						'center bottom' => 'Center Bottom',
						'right-bottom' => 'Right Bottom',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'left top',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5bd7c87171c3e',
					'label' => 'Repeat Background Image',
					'name' => 'vm_repeat_bg_img',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_repeat_bg_img',
					),
					'message' => 'Enable Repeat Background Image',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bd7c87171c3f',
					'label' => 'Scroll with Page',
					'name' => 'vm_scroll_with_page',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_scroll_with_page',
					),
					'message' => 'Enable Scroll Page',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bd7c87171c40',
					'label' => 'Image Size',
					'name' => 'vm_image_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c87171c39',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c87171c3c',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_image_size',
					),
					'choices' => array(
						'auto' => 'Original',
						'contain' => 'Fit to Screen',
						'cover' => 'Fill Screen',
					),
					'default_value' => array(
						0 => 'auto',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5bd7c89371c4a',
			'label' => 'Videos Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bd7e3ad61ef2',
			'label' => '',
			'name' => 'vm_videos_enable_section',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_videos_enable_section',
			),
			'message' => 'Indicate to enable this section.',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		),
		array(
			'key' => 'field_5bd7c89171c41',
			'label' => '',
			'name' => 'vm_video_settings',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'vm_video_settings',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5bd7c89271c42',
					'label' => 'BG Attribute',
					'name' => 'vm_bg_attr',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.33',
						'class' => '',
						'id' => 'vm_bg_attr',
					),
					'choices' => array(
						'bg-image' => 'Background Image',
						'bg-color' => 'Background Color',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'bg-color',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5bd7c89271c43',
					'label' => 'Image',
					'name' => 'vm_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'vm_image',
					),
					'return_format' => 'url',
					'preview_size' => 'medium_large',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,png',
				),
				array(
					'key' => 'field_5bd7c89271c44',
					'label' => 'Color',
					'name' => 'vm_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-color',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => 'vm_color',
					),
					'default_value' => '#000000',
				),
				array(
					'key' => 'field_5bd7c89271c45',
					'label' => 'Presets',
					'name' => 'vm_presets',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => 'vm_presets',
					),
					'choices' => array(
						'default' => 'Default',
						'fill-screen' => 'Fill Screen',
						'fit-to-screen' => 'Fit to Screen',
						'repeat' => 'Repeat',
						'custom' => 'Custom',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bd7c89271c46',
					'label' => 'Image Position',
					'name' => 'vm_image_position',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'fill-screen',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_image_position',
					),
					'choices' => array(
						'left top' => 'Left Top',
						'center top' => 'Center Top',
						'right top' => 'Right Top',
						'left center' => 'Left Center',
						'center center' => 'Center Center',
						'right center' => 'Right Center',
						'left bottom' => 'Left Bottom',
						'center bottom' => 'Center Bottom',
						'right-bottom' => 'Right Bottom',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'left top',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5bd7c89271c47',
					'label' => 'Repeat Background Image',
					'name' => 'vm_repeat_bg_img',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'fit-to-screen',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_repeat_bg_img',
					),
					'message' => 'Enable Repeat Background Image',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bd7c89271c48',
					'label' => 'Scroll with Page',
					'name' => 'vm_scroll_with_page',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'repeat',
							),
						),
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_scroll_with_page',
					),
					'message' => 'Enable Scroll Page',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Yes',
					'ui_off_text' => 'No',
				),
				array(
					'key' => 'field_5bd7c89271c49',
					'label' => 'Image Size',
					'name' => 'vm_image_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bd7c89271c42',
								'operator' => '==',
								'value' => 'bg-image',
							),
							array(
								'field' => 'field_5bd7c89271c45',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => 'vm_image_size',
					),
					'choices' => array(
						'auto' => 'Original',
						'contain' => 'Fit to Screen',
						'cover' => 'Fill Screen',
					),
					'default_value' => array(
						0 => 'auto',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-vm-front-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'discussion',
		3 => 'comments',
		4 => 'revisions',
		5 => 'slug',
		6 => 'author',
		7 => 'format',
		8 => 'page_attributes',
		9 => 'featured_image',
		10 => 'categories',
		11 => 'tags',
		12 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;


if ( function_exists( 'acf_add_options_page' ) ) :
	acf_add_options_page( array(
		'page_title' 	=> __( 'General Theme Settings.', 'qqlanding' ),
		'menu_title' 	=> __( 'General Theme', 'qqlanding' ),
		'menu_slug'		=> 'general-theme-settings',
		'capability'	=> 'edit_posts',
		'icon_url'		=> 'dashicons-screenoptions',
		'redirect'		=> false
	) ); //General Settings
	
	/*acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Slider Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Slider', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) );*/ //Front Page Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Front Page Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Front Page', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Front Page Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Banner Ads Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Banner Ads', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Promo Banners Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'VM Front Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'VM Front Settings', 'qqlanding' ),
		'parent_slug'	=> 'vm_settings',
	) ); //VM Front Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Settings', 'qqlanding' ),
		'parent_slug'	=> 'slider_settings',
	) ); //VM Slider Settings
		
	/*acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Video & Matches Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Video & Matches', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) );*/ //Videos

endif;

/**
 * This will add some class to your body
 */
function qqlanding_schema( $classes ){
	$add_affix = ( get_field('th_nav_settings','option') == true ) ? 'qqland-affix' : 'qqland-no-affix';
	$layout = get_field( 'th_color_scheme', 'option' );

	$template = get_field( 'header_template', 'option' );
	switch ($template) {
		case 'bare': $new_class = "qqlayout-bare"; break;
		case 'overlay': $new_class = "qqlayout-overlay"; break;
		default: $new_class = "qqlayout-default"; break;
	}
	switch ( $layout ) {
		case 'qq188': $qqclasses = 'qq188 ' . $add_affix . ' ' . $new_class; break;
		case 'qq101': $qqclasses = 'qq101 ' . $add_affix . ' ' . $new_class; break;
		case 'qq1x2': $qqclasses = 'qq1x2 ' . $add_affix . ' ' . $new_class; break;
		case 'qq724': $qqclasses = 'qq724 ' . $add_affix . ' ' . $new_class; break;
		case 'qqfortuna': $qqclasses = 'qqfortuna ' . $add_affix . ' ' . $new_class; break;
		case 'qq801': $qqclasses = 'qq801 ' . $add_affix . ' ' . $new_class; break;
		case 'qq882': $qqclasses = 'qq882 ' . $add_affix . ' ' . $new_class; break;
		case 'qq808': $qqclasses = 'qq808 ' . $add_affix . ' ' . $new_class; break;
		case 'qq828': $qqclasses = 'qq828 ' . $add_affix . ' ' . $new_class; break;
		case 'custom': $qqclasses = 'custom ' . $add_affix . ' ' . $new_class; break;
		default: $qqclasses = 'qq288 ' . $add_affix . ' ' . $new_class; break;
	}

	$classes[] = 'qqlanding-sites qqland-' . $qqclasses;
	$classes[] = ( is_front_page() ) ? 'qqland-front' : '';
	return $classes;
}
add_filter( 'body_class', 'qqlanding_schema');

function qqlanding_text_color($color){
	switch ( $color ) {
		case 'qq188': $color = 'color_188 '; break;
		case 'qq101': $color = 'color_101 '; break;
		case 'qq1x2': $color = 'color_1x2 '; break;
		case 'qq724': $color = 'color_724 '; break;
		case 'qqfortuna': $color = 'color_fortuna '; break;
		case 'qq801': $color = 'color_801 '; break;
		case 'qq882': $color = 'color_882 '; break;
		case 'qq808': $color = 'color_808 '; break;
		case 'qq828': $color = 'color_828 '; break;
		case 'custom': $color = 'color_custom '; break;
		default: $color = 'color_288 '; break;
	}
	return $color;
}

function qqlanding_bg_color($bg_color){
	switch ( $bg_color ) {
	case 'qq188': $class = '188'; break;
	case 'qq101': $class = '101'; break;
	case 'qq1x2': $class = '1x2'; break;
	case 'qq724': $class = '724'; break;
	case 'qqfortuna': $class = 'fortuna'; break;
	case 'qq801': $class = '801'; break;
	case 'qq882': $class = '882'; break;
	case 'qq808': $class = '808'; break;
	case 'qq828': $class = '828'; break;
	case 'custom': $class = 'custom'; break;
	default: $class = '288'; break;
	}
	return $class;
}

function qqlanding_fontfam( $font ){

	if ( ! empty($font) ) {
		$sliderfont =  array();

		$countfontfam = count( $font );

		$countwhile = '0';
		while($countwhile < $countfontfam){
			$sliderfont[] = $font[$countwhile];
			$countwhile++;
		}

		$font = join(',',$sliderfont);

		return $font;
	}
}

/**
 * Return the filter functions from Theme settings
 *-------------------------------------------------*/
function qqlanding_filters( $field, $func, $val, $dim, $type){
	if ( $type == 'sub' ) {
		$filter_field = get_sub_field($field);
		foreach ($filter_field as $value) {
			$dim_val = ( $value[$dim] == 'none' ) ? ' ' : $dim ;
			$output[] = $value[$func] . '(' . $value[$val] . '' . @$value[$dim_val] . ')';
		}
	}else{
		if ( have_rows( $field , 'option' ) ) :
			$filter_field = get_field( $field, 'option' );
			//$output = array();
			foreach ($filter_field as $value) {
				$dim_val = ( $value[$dim] == 'none' ) ? ' ' : $dim ;
				$output[] = $value[$func] . '(' . $value[$val] . '' . @$value[$dim_val] . ')';
			}
		endif;
	}
	$rep_args = str_replace(array('[', ']'), '', htmlspecialchars(json_encode($output), ENT_NOQUOTES));
	$rep_args2 = str_replace('"', '', $rep_args);
	$fiter_output = str_replace(',', ' ', $rep_args2);?>

	-webkit-filter:<?php echo $fiter_output; ?>;
	-moz-filter:<?php echo $fiter_output; ?>;
	-ms-filter:<?php echo $fiter_output; ?>;
	-o-filter:<?php echo $fiter_output; ?>;
	filter:<?php echo $fiter_output; ?>;

<?php }

function qqlanding_preset_acf($repeat, $scroll, $screen, $position, $image_size){

	if($repeat == "Yes" || $repeat == true):
		$repeat_preset = "repeat";
	else:
		$repeat_preset = "no-repeat";
	endif;	

	if($scroll == "Yes" || $scroll == true):
		$scroll_preset = "background-attachment: fixed;";
	else:
		$scroll_preset = "background-attachment: scroll;";
	endif;	

	 if($screen =='fill-screen'):
	 	$presets = "background-size: cover;background-position:".$position."; background-repeat:no-repeat;background-attachment: fixed;";
	 elseif($screen =='fit-to-screen'):
	 	$presets = "background-size: contain;background-position:".$position."; background-repeat:".$repeat_preset.";background-attachment: fixed;";
	 elseif($screen =='repeat'):
	 	$presets = "background-size: auto;background-position:".$position."; background-repeat:repeat;".$scroll_preset;
	 elseif($screen =='custom'):
	 	$presets = "background-size:".$image_size.";background-position:".$position."; background-repeat:".$repeat_preset.";".$scroll_preset;
	 else:
		$presets = "background-position: left top; background-repeat: repeat;background-size: auto;background-attachment: scroll;";
	 endif;

	 return $presets;
}

function qqlanding_sliding_bg($slider_attrib, $slide_img, $slide_color){

	if($slider_attrib == "bg-image") :
		if($slide_img){
			$background = $slide_img;
			$background = "url('".$background['url']."')";
		}else{
			$background = $slide_color;
		}
	else:
			$background = $slide_color;
	endif;
	
	return $background;
}

function qqlanding_btn_entersite($type, $link, $btn_image, $btn_text, $link_xfn, $link_target, $btn_dev){
	$th_layout = get_field( 'th_color_scheme', 'option' );
	$links = ($link) ? do_shortcode( $link ) : esc_url( home_url( '/' ) ); //links
	$imgbutton = ($btn_image['url']) ? $btn_image['url'] : get_template_directory_uri().'/assets/images/default/enter.png'; //image
	//if( ! empty($link_xfn)){ $linkRel = $link_xfn; }else{$linkRel = '';} //link relationship
	$linkRel = implode(' ', array_map(function ($i) { return $i['btn_xfn_item']; }, $link_xfn)); //link relationship
	$linktar = ($link_target == '_blank') ? '_blank' : '_self'; //Target
	$device = ( $btn_dev == 'desktop' ) ? 'd-none d-md-inline-block d-lg-inline-block mt-3' : 'd-block d-md-none d-lg-none mt-3'; //Device Item

	if ( $type == 'image' ) {
		$item_class = '';
		$item = '<img class="img-responsive enter-site" src="' . $imgbutton . '" alt="' . $btn_image['alt'] . '" title="' . $btn_image['title'] . '">';
	}else{
		$item_class = 'btn btn-lg btn-entersite bg_color_' . qqlanding_bg_color($th_layout, 'button') ;

		$devices = ( $btn_dev == 'desktop' ) ? "<i class='fas fa-desktop'></i> " : "<i class='fas fa-mobile-alt'></i> ";

		$item = $devices . ' ' . $btn_text;
	}
	$entersite = '<div class="' . $device . '">';
		$entersite .= '<a href="' . $links . '" rel="' . $linkRel . '" target="'.$linktar.'" class="' . $item_class . '">' . $item . '</a>';
	$entersite .= '</div>';

	return $entersite;
}  

function fpcontent_img_position($img,$class){

 		$size = 'medium';
 		//$size = 'large';
		$thumb = $img['sizes'][ $size ];
		$width = $img['sizes'][ $size . '-width' ];
		$height = $img['sizes'][ $size . '-height' ];


		$htmlleft = '<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
		$htmlleft .= '<img src="'.$img['url'].'" alt="'.$img['alt'].'" class="content-'.$class.'-img">';	
		$htmlleft .= '<meta itemprop="url" content="'.$img['url'].'">';	
		$htmlleft .= '<meta itemprop="width" content="'.$width.'"/>';	
		$htmlleft .= '<meta itemprop="height" content="'.$height.'"/>';	
		$htmlleft .= '</div>';	

 		return $htmlleft;
 }

function fpv_video_settings($video, $class){

	$videoOutput = '<div id="video_wrap" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">';
		$videoOutput .= '<h2 class="sr-only" itemprop="name">' . $video['title'] . '</h2>';
		$videoOutput .= '<meta itemprop="duration" content="T1M33S" />';
		$videoOutput .= '<meta itemprop="thumbnailUrl" content="thumbnail.jpg" />';
		$videoOutput .= '<meta itemprop="contentURL" content="' . $video['url'] . '" />';
		$videoOutput .= '<meta itemprop="embedURL" content="' . $video['url'] . '" />';
		$videoOutput .= '<meta itemprop="uploadDate" content="' . $video['date'] . '" />';
		$videoOutput .= '<meta itemprop="height" content="' . $video['height'] . '" />';
		$videoOutput .= '<meta itemprop="width" content="' . $video['width'] . '" />';		
		$videoOutput .= '<video preload="metadata" src="' . $video['url'] . '" controls poster"">';
		if ( $video['subtype'] === 'swf' ) {
			$videoOutput .= '<embed src="' . $video['url'] . '" type="' . $video['mime_type'] . '">';
		}else{
			$videoOutput .= '<source src="' . $video['url'] . '" type="' . $video['mime_type'] . '"></source>';
		}
		$videoOutput .= '<span itemprop="description" class="sr-only" >' . $video['description'] . '</span>';
		$videoOutput .= '</video>';
	$videoOutput .= '</div>';
	return $videoOutput;

}

/**
 * Display the exact content for the content section
 * @param  $mmk_title      [description]
 * @param  $mmk_content    [description]
 * @param  $id_description [description]
 * @param  $img            [description]
 * @return                 [description]
 */
 function fpcontent_content_position($mmk_title, $mmk_content, $id_description,$img){

		    $logo = get_theme_mod( 'site_logo', '' );
		    $width = ''; 
		    $height = ''; 
	
			if ( !empty( $logo ) ) list($width, $height, $type, $attr) = getimagesize($logo);	//check if logo is not empty

 			if($img):
		 		$size = 'medium'; //thumbnail size
				$thumb = $img['sizes'][ $size ]; //image size
 				$imgObj = $img['url']; //image url
 				$imgwidth = $img['sizes'][ $size . '-width' ]; //image exact width
 				$imgheight = $img['sizes'][ $size . '-height' ]; //image exact hiegth
 			else:
 				$imgObj = esc_url( $logo ); // escape the url
 				$imgwidth = $width; // image width
 				$imgheight = $height; // image height
 			endif;


			$content = '<article id="post-'.$id_description.'" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">';
				$content .= '<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="'.get_permalink().'"/>';
				$content .= '<header class="entry-header">';	
					$content .= '<h3 class="h2 post-entry-title" itemprop="headline">'.$mmk_title.'</h3>';
					$content .= '<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
						$content .= '<meta itemprop="url" content="'.$imgObj.'">';	
						$content .= '<meta itemprop="width" content="' . $imgwidth . '"/>';	
						$content .= '<meta itemprop="height" content="' . $imgheight . '"/>';	
					$content .= '</div>';	
					$content .= '<!-- .AMP  -->';
					$content .= '<meta itemprop="author" content="'.get_the_author().'">';	
					$content .= '<meta itemprop="datePublished" content="'.get_the_time('c').'">';	
					$content .= '<meta itemprop="dateModified" content="'.get_the_modified_time('c').'">';	
					$content .= '<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';	
						$content .= '<meta itemprop="name" content="'.get_permalink().'"/>';	
						$content .= '<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';	
						$content .= '<meta itemprop="url" content="'.esc_url( $logo ).'"/>';	
						$content .= '<meta itemprop="width" content="'  . $width . '"/>';	
						$content .= '<meta itemprop="height" content="' . $height .'"/>';	
					$content .= '</div>';	
				$content .= '</header>';	
				$content .= '<div id="content-'.$id_description.'" itemprop="description" class="entry-content">';	
					$content .= $mmk_content;
				$content .= '</div><!-- .entry-content -->';
			$content .='</article>';

 		return $content;

 }

/**
 * Display the actual link & banner image
 * for the floating banner.
 * @param  $field  ID of the field
 */
function floating_banner( $field ){
	$float_layout = get_sub_field( 'fb__layout', 'option' );
	if ( have_rows( $field, 'option' ) ): 
		while( have_rows($field, 'option' ) ) : the_row();
			$link_alt = get_sub_field( 'fb_link_url' );
			$img_title = get_sub_field( 'fb__item_title' );
			$img_link = get_sub_field( 'fb__item_img_url' );
			$link_target = get_sub_field( 'fb__item_link_target' );
			$rel_alt = get_sub_field( 'fb__item_xfn' );
			$bg_color = get_sub_field( 'fb__item_img_bg_color' );
			$shadow_color = get_sub_field( 'fb__item_img_shadow' );

			$rel_text = '';
			if ( empty( $link_alt ) ) { $link_alt = esc_url( home_url('/') ); }
			if ( $link_target === true ) {
				$target = '_blank';
			}else{
				$target = '_self';
			}
			if ( $rel_alt ) { $rel_text = 'nofollow'; }
			if ( $float_layout == 'classic' ) {
				$link_class = 'qqgroup-item img-responsive';
			}else{
				$link_class = 'img-responsive';
			}
			
			$item_link = '<a href="' . do_shortcode("$link_alt") . ' " title="' .  $img_title . '" target="' . esc_attr( $target ) . '" rel="' . esc_attr( $rel_text ) . '">';
				$item_link .= '<img src="' .  $img_link . '" class="' . $link_class . '" title="' . esc_html( $img_title ) . '" alt="' . esc_html( $img_title ) . '" >';
			$item_link .= '</a>';

			if ( $float_layout == 'classic' ) {
				$item = $item_link;
			}else{
				$item = '<div class="qqgroup-item" >';
					$item .= $item_link;
				$item .= '</div>';
			}
			
			echo $item;
		endwhile; 
	endif; 
}


/**
 * Convert PHP value to Javascript value
 * & call it to each function in the 
 * General.js File
 */
function qqlanding_owl_carousel(){ ?>
<?php
	$th_layout = get_field( 'th_layout', 'option' );
	$template = get_field( 'header_template', 'option' );
	$appearance = get_field( 'fp_slider_appearance_group', 'option');
	$_appearance = get_field( 'fb_slider_appearance_group', 'option');
	$slider_app = get_field('slider_appearance_group', 'option');

	//post settings
	$autoplay = $appearance['slider_autoplay'];
	$nav = $appearance['slider_arrows'];
	$dots = $appearance['slider_nav_dots'];

	//banner settings
	$_autoplay = $_appearance['slider_autoplay'];
	$_nav = $_appearance['slider_arrows'];
	$_dots = $_appearance['slider_nav_dots'];

	//bootstrap carousel
	$intervals = $slider_app['slider_autoplay_delays'];
	$pauses = $slider_app['slider_autoplay_hover'];
?>
<script type="text/javascript">
	console.log(<?php echo $intervals; ?>);
	//Template
	var layout = '<?php echo $th_layout; ?>',template = '<?php echo $template; ?>';
	
	//post
	var autoplay = '<?php echo $autoplay; ?>',nav = '<?php echo $nav; ?>',dots = '<?php echo $dots; ?>';

	//banner
	var _autoplay = '<?php echo $_autoplay; ?>',_nav = '<?php echo $_nav; ?>',_dots = '<?php echo $_dots; ?>';

	/*-carousel-slider*/
	var _interval = <?php echo $intervals; ?>;
	var _pause = '<?php echo $pauses;?>';
</script>
<?php }
add_action( 'wp_footer','qqlanding_owl_carousel' );

function content_img_postion($position_conditon, $top, $right, $left, $bottom) {

		  	
		  	if($position_conditon == true){
		  	
		  		$positionprop = "position: absolute;";				
				  	
				  	if($top){
					  	 $positionprop .= "top: ".$top."px;"; 
				  	} 
				  	if($left){
				  		 $positionprop .= "left: ".$left."px;";  
				  	}
				  	if($right){
				  	 	$positionprop .= "right: ".$right."px;";  
				  	}
				  	if($bottom){
				  	 	$positionprop .= "bottom: ".$bottom."px;"; 
				  	}

		  	}else{
		  		$positionprop = "";
		  	}

	return $positionprop;
}

/**
 * Acf Content IMG HIDE
 * It Allow you to show/hide the right image
 * in the content area of your section.
 * @param  $hide ID of the field
 * @return return the class
 */
function content_img_hide($hide){
	$hideclass = ($hide == true) ? 'd-none d-lg-block' : 'd-block';
	return $hideclass;
}

/**
 * Callback for inputing your sections.
 * @param  [type] $id [description]
 * @return return if true or false
 */
function acf_selective_refresh($id){
	return get_field(  $id,'option' ) ? true : false;
}

function th_layout(){
	$th_layout = ( ! empty( get_field( 'th_layout', 'option' ) ) ) ? get_field( 'th_layout', 'option' ) : 'box';
	return $th_layout;
}