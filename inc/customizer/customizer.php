<?php 
/**
 * QQLanding Theme Customizer
 *
 * @link https://developer.wordpress.org/themes/customize-api/
 *
 * @package QQLanding
 */
if ( ! defined('ABSPATH')) exit;
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function qqlanding_customizer_register( $wp_customize ){
	$wp_customize->get_setting( 'blogname' )->transport 				= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport 			= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport 		= 'postMessage';
	$wp_customize->remove_control('display_header_text');	// Remove the default site title & tag.
	$wp_customize->get_section( 'colors' )->title =  'Site Colors';
	$wp_customize->get_section( 'colors' )->panel =  'qqLanding_style_options';
	$wp_customize->get_section( 'background_image' )->panel 	= 'qqLanding_style_options';
	$wp_customize->get_section( 'header_image' )->panel 	= 'qqLanding_header_options';
	$wp_customize->get_section( 'header_image' )->priority 	= 3;

 	// Load custom controls.
	require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/customizer_controls.php' );

	// Register the radio image control class as a JS control type.
    $wp_customize->register_control_type( 'QQLanding_Customize_Radio_Image' );

	/**
	 * # Header Panel
	 *----------------------------*/

	$wp_customize->add_panel( 'qqlanding_header_panel',
		array( 
			'priority' 		=> 25,
			'title'			=> __( 'Header Settings', 'qqLanding' ),
			'description' 	=> __( 'Use this panel to set your header settings.', 'qqLanding' ),
	) );

		/**
		 * ## Logo Settings
		 *----------------------------*/
		$wp_customize->add_setting( 'site_logo',
			array(
				'sanitize_callback' => 'qqlanding_sanitize_image'
			)
		);

			$wp_customize->add_control(
				new WP_Customize_Image_Control( $wp_customize, 'site_logo',
					array(
						'label'		=> __( 'Site Logo', 'qqLanding' ),
						'section'	=> 'title_tagline',
						'setting'	=> 'site_logo',
						'description' => __( 'Upload a logo for your website. Recommended height for your logo is 135px.', 'qqLanding' )
					)
				)
			);

		/**
		 * ## Logo, Title & tagline chooser
		 *----------------------------*/
		$wp_customize->add_setting( 'site_title_option',
			array(
				'default'			=> 'text-only',
				'sanitize_callback'	=> 'qqlanding_sanitize_logo_title_select',
				'transport'			=> 'refresh'
			)
		);
			$wp_customize->add_control( 'site_title_option',
				array(
		            'label'     	=> __( 'Display site title / logo.', 'qqLanding' ),
		            'section'   	=> 'title_tagline',
		            'type'      	=> 'radio',
		            'description'	=> __( 'Choose your preferred option.', 'qqLanding' ),
		            'choices'   => array (
		                'text-only' 	=> __( 'Display site title and description only.', 'qqLanding' ),
		                'logo-only'     => __( 'Display site logo image only.', 'qqLanding' ),
		                'text-logo'		=> __( 'Display both site title and logo image.', 'qqLanding' ),
		                'display-none'	=> __( 'Display none', 'qqLanding' )
		            )
				)
			);


	/**
	 * # Site Style
	 *-------------------------------------*/
	$wp_customize->add_panel( 'qqLanding_style_options',
		array(
			'priority' 		=> 22,
			'title'			=> esc_html__( 'Site Styling', 'qqLanding' ),
			'description' 	=> esc_html__( 'Use this section to setup / edit your site design.', 'qqLanding' )
		)
	);

		$wp_customize->add_section( 'qqLanding_custom_style',
			array(
				'priority' => 4,
				'title'			=> esc_html__( 'Site Styling', 'qqLanding' ),
				'description' 	=> esc_html__( 'Use this section to setup the colors of your site.', 'qqLanding' ),
				'panel'			=> 'qqLanding_style_options'			
			)
		);

			//Primary Colors Settings
			$wp_customize->add_setting( 'qqLanding_wrap_color',
				array(
					'default'			=> '#f7f8f9',
					'type'				=> 'theme_mod',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'qqLanding_sanitize_hex_color'
				)
			);

			//Primary Colors Control
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( $wp_customize, 'qqLanding_wrap_color',
					array(
						'label'			=> __( 'Theme Wrap Color', 'qqLanding' ),
						'section'		=> 'colors',
						'setting'		=> 'qqLanding_wrap_color'
					)
				)
			);

			//Theme Text Colors Settings
			$wp_customize->add_setting( 'qqLanding_theme_text_color',
				array(
					'default'			=> '#222',
					'type'				=> 'theme_mod',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'qqLanding_sanitize_hex_color'
				)
			);

			//Theme Text Colors Control
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( $wp_customize, 'qqLanding_theme_text_color',
					array(
						'label'			=> __( 'Theme Primary Color', 'qqLanding' ),
						'section'		=> 'colors',
						'setting'		=> 'qqLanding_theme_text_color'
					)
				)
			);

			//Theme Text Colors Settings
			$wp_customize->add_setting( 'qqLanding_theme_link_color',
				array(
					'default'			=> '#02849c',
					'type'				=> 'theme_mod',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'qqLanding_sanitize_hex_color'
				)
			);

			//Theme Text Colors Control
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( $wp_customize, 'qqLanding_theme_link_color',
					array(
						'label'			=> __( 'Link Color', 'qqLanding' ),
						'section'		=> 'colors',
						'setting'		=> 'qqLanding_theme_link_color'
					)
				)
			);

			//Theme Text Colors Settings
			$wp_customize->add_setting( 'qqLanding_theme_link_hover_color',
				array(
					'default'			=> '#10aec7',
					'type'				=> 'theme_mod',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'qqLanding_sanitize_hex_color'
				)
			);

			//Theme Text Colors Control
			$wp_customize->add_control( 
				new WP_Customize_Color_Control( $wp_customize, 'qqLanding_theme_link_hover_color',
					array(
						'label'			=> __( 'Link Hover Color', 'qqLanding' ),
						'section'		=> 'colors',
						'setting'		=> 'qqLanding_theme_link_hover_color'
					)
				)
			);
	/**
     * Custom CSS section
     */
    $wp_customize->add_section( 
    	'qqLanding_custom_css', 
    	array(
			'title' 		=> __( 'Custom CSS', 'qqLanding' ),
			'panel' 		=> 'qqLanding_style_options',
			'priority'		=> 50
		) 
	);

		$wp_customize->add_setting(
			'custom_css',
			array(
				'default'			=> '',
				'type'				=> 'theme_mod',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'qqLanding_sanitize_css'
			)
		);
		$wp_customize->add_control(
			'custom_css',
			array(
				'settings'		=> 'custom_css',
				'section'		=> 'qqLanding_custom_css',
				'type'			=> 'textarea',
				'label'			=> __( 'Custom CSS', 'qqLanding' ),
				'description'	=> __( 'Define custom CSS be used for your site. Do not enclose in script tags.', 'qqLanding' ),
			)
		);

	/**
     * Script Editor section
     */
    $wp_customize->add_section( 
    	'qqLanding_custom_script', 
    	array(
			'title' 		=> __( 'Script Editor', 'qqLanding' ),
			'panel' 		=> 'qqLanding_style_options',
			'priority'		=> 50
		) 
	);
	    $wp_customize->add_setting( 
	    	'custom_script',
	    	array(
				'default'			=> '',
				'type'				=> 'theme_mod',
				'capability'		=> 'edit_theme_options',
	    	)
	    );

		$wp_customize->add_control(
			'custom_script',
			array(
				'settings'		=> 'custom_script',
				'section'		=> 'qqLanding_custom_script',
				'type'			=> 'textarea',
				'label'			=> __( 'Script Editor', 'qqLanding' ),
				'description'	=> __( 'Define custom Script be used for your site.', 'qqLanding' ),
			)
		);

	/**
	 * # General Settings
	 *-------------------------------------*/

	$wp_customize->add_panel(
		'qqlanding_theme_options',
		array(
			'priority'		=> 20,
			'capability' 	=> 'edit_theme_options',
			'theme_support'	=> '',
			'title'			=> __( 'Theme Settings',  'qqlanding' ),
			'description'	=> esc_html__( 'Use this section to set Theme options/settings of the site.', 'qqlanding' ),
		)
	);

		/**
		 * ## Social Media
		 *-------------------------------------*/
		$wp_customize->add_section(
			'qqlanding_socialMedia_settings',
			array(
				'priority'		=> 3,
				'title'			=> esc_html__( 'Social Media', 'qqlanding' ),
				'description' 	=> esc_html__( 'Use this panel settings to set your social media.', 'qqlanding' ),
				'panel'			=> 'qqlanding_theme_options'
			)
		);

		$wp_customize->add_setting(
			'qqlanding_display_smedia_icon',
			array(
				'default' => false,
				'sanitize_callback' => 'qqlanding_sanitize_checkbox'
			)
		);
		$wp_customize->add_control(
			'qqlanding_display_smedia_icon',
			array(
				'section' => 'qqlanding_socialMedia_settings',
				'setting' => 'qqlanding_display_smedia_icon',
				'type'	 => 'checkbox',
				'label' => __( 'Display social icons?', 'qqlanding' ),
			)
		);

			//facebook
			$wp_customize->add_setting(
				'facebook_url',
				array(
					'default'	=> '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'facebook_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'facebook_url',
					'type'	 => 'url',
					'label' => __( 'Facebook URL', 'qqlanding' ),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://facebook.com', 'qqlanding' )
					)
				)
			);

			//twitter
			$wp_customize->add_setting(
				'twitter_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'twitter_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'twitter_url',
					'type' => 'url',
					'label' => __('Twitter URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://twitter.com/QID', 'qqlanding' )
					)
				)
			);

			//instagram
			$wp_customize->add_setting(
				'instagram_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'instagram_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'instagram_url',
					'type' => 'url',
					'label' => __('Instagram URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://instagram.com/QID', 'qqlanding' )
					)
				)
			);

			//linkedin
			$wp_customize->add_setting(
				'linkedin_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'linkedin_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'linkedin_url',
					'type' => 'url',
					'label' => __('Linkedin URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'https://www.linkedin.com/in/QID', 'qqlanding' )
					)
				)
			);

			//youtube
			$wp_customize->add_setting(
				'youtube_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'youtube_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'youtube_url',
					'type' => 'url',
					'label' => __('Youtube URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://www.youtube.com/watch?v=awEwrR1', 'qqlanding' )
					)
				)
			);

			//google-plus
			$wp_customize->add_setting(
				'googleplus_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'googleplus_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'googleplus_url',
					'type' => 'url',
					'label' => __('Google Plus URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://plus.google.com/104605854646', 'qqlanding' )
					)
				)
			);

			//pinterest
			$wp_customize->add_setting(
				'pinterest_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'pinterest_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'pinterest_url',
					'type' => 'url',
					'label' => __('Pinterest URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://www.pinterest.com/QID/', 'qqlanding' )
					)
				)
			);

			//rss
			$wp_customize->add_setting(
				'rss_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'rss_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'rss_url',
					'type' => 'url',
					'label' => __('RSS URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://www.example.com/QID/', 'qqlanding' )
					)
				)
			);

			//flickr
			$wp_customize->add_setting(
				'flickr_url',
				array(
					'default' => '',
					'sanitize_callback' => 'qqlanding_sanitize_url'
				)
			);
			$wp_customize->add_control(
				'flickr_url',
				array(
					'section' => 'qqlanding_socialMedia_settings',
					'setting' => 'flickr_url',
					'type' => 'url',
					'label' => __('Flickr URL?', 'qqlanding'),
					'input_attrs' => array(
						'placeholder' => __( 'Eg: https://www.flickr.com/photos/QID', 'qqlanding' )
					)
				)
			);
		/**
		 * ## Blogs Section
		 *-------------------------------------*/
		$wp_customize->add_section(
			'qqlanding_blog_options',
			array(
				'priority'	=> 4,
				'title'		=> esc_html__( 'Blogs Settings', 'qqlanding' ),
				'panel'		=> 'qqlanding_theme_options'
			)
		);
			//Side-bar layout Setting
			$wp_customize->add_setting(
				'qqlanding_blog_sidebar_layout',
				array(
					'default' => 'right',
					'sanitize_callback' => 'qqlanding_sanitize_radio'
				)
			);

			$wp_customize->add_control(
				new QQLanding_Customize_Radio_Image(
					$wp_customize, 'qqlanding_blog_sidebar_layout',
					array(
						'label'		=> __( 'Sidebar Layouts', 'qqlanding' ),
						'section'	=> 'qqlanding_blog_options',
						'settings'	=> 'qqlanding_blog_sidebar_layout',
						'description' => esc_html__( 'Choose a layout for the sidebar.', 'qqlanding' ),
						'choices'	=> array(
							'right'	=> array(
								'label'		=> esc_html__( 'Right Sidebar', 'qqlanding' ),
								'url'		=> '%sright.jpg'
							),
							'left'	=> array(
								'label'		=> esc_html__( 'Left Sidebar', 'qqlanding' ),
								'url'		=> '%sleft.jpg'
							),
							'both'	=> array(
								'label'		=> esc_html__( 'Both Sidebar', 'qqlanding' ),
								'url'		=> '%sboth.jpg'
							),
							'none'	=> array(
								'label'		=> esc_html__( 'No Sidebar', 'qqlanding' ),
								'url'		=> '%snone.jpg'
							),
						)
					)
				)
			);

			//Excerpt Display Setting
			$wp_customize->add_setting( 'qqlanding_excerpt_display',
				array(
	                'default'               => 1,
	                'type'       => 'theme_mod',
	                'capability' => 'edit_theme_options',
	                'sanitize_callback'     => 'qqlanding_sanitize_checkbox'
				)
			);
	        //Excerpt Display Control
	        $wp_customize->add_control( 'qqlanding_excerpt_display',
	            array(
	                'type'                  => 'checkbox',
	                'label'                 => esc_html__( 'Display Excerpt', 'qqlanding' ),
	                'section'               => 'qqlanding_blog_options'
	            )
	        );

	        //Excerpt Setting
	        $wp_customize->add_setting( 'qqlanding_excerpt_lenght',
	        	array(
	        		'default' => 85,
	        		'sanitize_callback' => 'wp_filter_nohtml_kses'

	        	)
	        );

	        //Excerpt Control
	        $wp_customize->add_control( 'qqlanding_excerpt_lenght',
	        	array(
	                'type'                  => 'text',
	                'label'                 => esc_html__( 'Excerpt length', 'qqlanding' ),
	                'section'               => 'qqlanding_blog_options',
	                'description'			=> esc_html__( 'Give some length for your post.', 'qqlanding' )
	        	)
	        );

	        //Tag list Display Setting
	        $wp_customize->add_setting( 'qqlanding_blog_tag_list_display',
	            array(
	                'default'               => 1,
	                'capability'            => 'edit_theme_options',
	                'sanitize_callback'     => 'qqlanding_sanitize_checkbox'
	            )
	        );
	        //Tag list Display Control
	        $wp_customize->add_control( 'qqlanding_blog_tag_list_display',
	            array(
	                'type'                  => 'checkbox',
	                'label'                 => esc_html__( 'Display Tag list', 'qqlanding' ),
	                'description'           => esc_html__( 'This will show or hide your tag list', 'qqlanding' ),
	                'section'               =>  'qqlanding_blog_options'
	            )
	        );
		
		/**
		 * ## Page Section
		 *-------------------------------------*/
		$wp_customize->add_section( 'qqlanding_page_options',
			array(
				'priority'		=> 7,
				'title'		=> esc_html__( 'Page Settings', 'qqlanding' ),
				'description' => esc_html__( '', 'qqlanding' ),
				'panel'		=> 'qqlanding_theme_options'
			)
		);
			//Side-bar layout Setting
			$wp_customize->add_setting( 'qqlanding_page_sidebar_layout',
				array(
					'default' => 'right',
					'sanitize_callback' => 'qqlanding_sanitize_radio'
				)
			);
			$wp_customize->add_control(
				new QQLanding_Customize_Radio_Image( $wp_customize, 'qqlanding_page_sidebar_layout',
					array(
						'label'		=> __( 'Sidebar Layouts', 'qqlanding' ),
						'section'	=> 'qqlanding_page_options',
						'settings'	=> 'qqlanding_page_sidebar_layout',
						'description' => esc_html__( 'Choose a layout for the sidebar.', 'qqlanding' ),
						'choices'	=> array(
							'right'	=> array(
								'label'		=> esc_html__( 'Right Sidebar', 'qqlanding' ),
								'url'		=> '%sright.jpg'
							),
							'left'	=> array(
								'label'		=> esc_html__( 'Left Sidebar', 'qqlanding' ),
								'url'		=> '%sleft.jpg'
							),
							'both'	=> array(
								'label'		=> esc_html__( 'Both Sidebar', 'qqlanding' ),
								'url'		=> '%sboth.jpg'
							),
							'none'	=> array(
								'label'		=> esc_html__( 'No Sidebar', 'qqlanding' ),
								'url'		=> '%snone.jpg'
							),
						)
					)
				)
			);

	        //Comment Display Setting
	        $wp_customize->add_setting( 'qqlanding_page_display_comment',
	            array(
	                'default'               => 0,
	                'type'                  => 'theme_mod',
	                'capability'            => 'edit_theme_options',
	                'sanitize_callback'     => 'qqlanding_sanitize_checkbox'
	            )
	        );
	        //Comment Display Control
	        $wp_customize->add_control( 'qqlanding_page_display_comment',
	            array(
	                'type'                  => 'checkbox',
	                'label'                 => esc_html__( 'Display Comment in the page.', 'qqlanding' ),
	                'description'           => esc_html__( 'This will show or hide your comment', 'qqlanding' ),
	                'section'               =>  'qqlanding_page_options'
	            )
	        );


		/**
		 * ## Single Post Section
		 *-------------------------------------*/
		$wp_customize->add_section( 'qqlanding_single_post_options',
			array(
				'priority'		=> 8,
				'title'		=> esc_html__( 'Single Post Settings', 'qqlanding' ),
				'description' => esc_html__( '', 'qqlanding' ),
				'panel'		=> 'qqlanding_theme_options'
			)
		);
			//Side-bar layout Setting
			$wp_customize->add_setting( 'qqlanding_single_sidebar_layout',
				array(
					'default' => 'right',
					'sanitize_callback' => 'qqlanding_sanitize_radio'
				)
			);
			$wp_customize->add_control(
				new QQLanding_Customize_Radio_Image( $wp_customize, 'qqlanding_single_sidebar_layout',
					array(
						'label'		=> __( 'Sidebar Layouts', 'qqlanding' ),
						'section'	=> 'qqlanding_single_post_options',
						'settings'	=> 'qqlanding_single_sidebar_layout',
						'description' => esc_html__( 'Choose a layout for the sidebar.', 'qqlanding' ),
						'choices'	=> array(
							'right'	=> array(
								'label'		=> esc_html__( 'Right Sidebar', 'qqlanding' ),
								'url'		=> '%sright.jpg'
							),
							'left'	=> array(
								'label'		=> esc_html__( 'Left Sidebar', 'qqlanding' ),
								'url'		=> '%sleft.jpg'
							),
							'both'	=> array(
								'label'		=> esc_html__( 'Both Sidebar', 'qqlanding' ),
								'url'		=> '%sboth.jpg'
							),
							'none'	=> array(
								'label'		=> esc_html__( 'No Sidebar', 'qqlanding' ),
								'url'		=> '%snone.jpg'
							),
						)
					)
				)
			);

	        //Featured Image Display Setting
	        $wp_customize->add_setting( 'qqlanding_single_featured_img_display',
	            array(
	                'default'               => 1,
	                'type'                  => 'theme_mod',
	                'capability'            => 'edit_theme_options',
	                'sanitize_callback'     => 'qqlanding_sanitize_checkbox'
	            )
	        );
	        //Featured Image Display Control
	        $wp_customize->add_control( 'qqlanding_single_featured_img_display',
	            array(
	                'type'                  => 'checkbox',
	                'label'                 => esc_html__( 'Display Featured Post Image', 'qqlanding' ),
	                'description'           => esc_html__( 'This will show or hide your featured image', 'qqlanding' ),
	                'section'               =>  'qqlanding_single_post_options'
	            )
	        );

	        //Post Navigation Display Setting
	        $wp_customize->add_setting( 'qqlanding_single_post_nav_display',
	            array(
	                'default'               => 1,
	                'type'                  => 'theme_mod',
	                'capability'            => 'edit_theme_options',
	                'sanitize_callback'     => 'qqlanding_sanitize_checkbox'
	            )
	        );
	        //Post Navigation Display Control
	        $wp_customize->add_control( 'qqlanding_single_post_nav_display',
	            array(
	                'type'                  => 'checkbox',
	                'label'                 => esc_html__( 'Display Post Navigation', 'qqlanding' ),
	                'description'           => esc_html__( 'This will show or hide your post navigation', 'qqlanding' ),
	                'section'               =>  'qqlanding_single_post_options'
	            )
	        );

	        //Related Post Display Setting
	        $wp_customize->add_setting( 'qqlanding_single_related_post_display',
	            array(
	                'default'               => 1,
	                'type'                  => 'theme_mod',
	                'capability'            => 'edit_theme_options',
	                'sanitize_callback'     => 'qqlanding_sanitize_checkbox'
	            )
	        );
	        //Related Post Display Control
	        $wp_customize->add_control( 'qqlanding_single_related_post_display',
	            array(
	                'type'                  => 'checkbox',
	                'label'                 => esc_html__( 'Display Related Post', 'qqlanding' ),
	                'description'           => esc_html__( 'This will show or hide your related post', 'qqlanding' ),
	                'section'               =>  'qqlanding_single_post_options'
	            )
	        );


		/**
		 * ## Footer Section
		 *-------------------------------------*/
		$wp_customize->add_section( 'qqlanding_footer_options',
			array(
				'priority' 	=> 9,
				'title'		=> esc_html__( 'Footer Settings', 'qqlanding' ),
				'description' => esc_html__( '', 'qqlanding' ),
				'panel'		=> 'qqlanding_theme_options'
			)
		);
			//Display Footer
			$wp_customize->add_setting(
				'qqlanding_display_footer_option',
				array(
					'default' => 0,
					'sanitize_callback' => 'qqlanding_sanitize_checkbox'
				)
			);
			
			$wp_customize->add_control(
				'qqlanding_display_footer_option',
				array(
					'section' => 'qqlanding_footer_options',
					'setting' => 'qqlanding_footer_display_settings',
					'type'	 => 'checkbox',
					'label' => __( 'Display Footer Site Info?', 'qqlanding' ),
				)
			);

			//Footer Settings
			$wp_customize->add_setting( 'qqlanding_footer_settings',
				array(
					'default'	=> sprintf( __( 'Copyright %s. All rights reserved.', 'qqlanding' ), esc_html( get_bloginfo( 'name' ) ) ),
					'sanitize_callback'		=> 'qqlanding_sanitize_html'
				)
			);

			//Footer Controls
			$wp_customize->add_control( 'qqlanding_footer_settings',
				array(	
					'type'		=> 'textarea',
					'label'		=> esc_html__( 'Footer Copyright Editor', 'qqlanding' ),
					'description'		=> esc_html__( 'Copyright or other text to be displayed in the site footer. HTML allowed.', 'qqlanding' ),
					'section' => 'qqlanding_footer_options',
				)
			);


	/**
	 * # Preloader Panel
	 *-------------------------------------*/
	$wp_customize->add_panel(
		'qqlanding_preloader_panel',
		array(
			'priority' 	> 25,
			'capability'	=> 'edit_theme_options',
			'theme_support'	=> '',
			'title'			=> __( 'Preloader Settings', 'qqlanding' ),
			'description'	=> esc_html__( 'Use this panel to set the preloader settings', 'qqlanding' )
		)
	);

		/**
	 	* ## Preloader Settings section
	 	*-------------------------------------*/
		$wp_customize->add_section( 'qqlanding_preloading_section',
			array(
				'priority'		=> 3,
				'title'			=> __( 'Settings', 'qqlanding' ),
				'description'	=> esc_html__( 'Use this section to set the settings/options for preloader', 'qqlanding' ),
				'panel'			=> 'qqlanding_preloader_panel'
			)
		);

			$wp_customize->add_setting( 'qqlanding_display_preloading_settings',
				array(
					'default'		=> false,
					'sanitize_callback'	=> 'qqlanding_sanitize_checkbox'
				)
			);

				$wp_customize->add_control('qqlanding_display_preloading_settings',
					array(
						'type'			=> 'checkbox',
						'label'			=> esc_html__( 'Display Preloader', 'qqlanding' ),
						'description'	=> esc_html__( '', 'qqlanding' ),
						'section'		=> 'qqlanding_preloading_section'
					)
				);
		/**
	 	* ## Preloader Background section
	 	*-------------------------------------*/
		$wp_customize->add_section( 'qqlanding_bg_section',
			array(
				'priority'		=> 4,
				'title'			=> __( 'Background', 'qqlanding' ),
				'description'	=> esc_html__( 'Use this section to set the background for preloader', 'qqlanding' ),
				'panel'			=> 'qqlanding_preloader_panel'
			)
		);

			/*-BG-selection-----*/
			$wp_customize->add_setting( 'qqlanding_bg_settings',
				array(
					'default'		=> 'color',
					'transport'		=> 'refresh',
					'sanitize_callback' => 'qqlanding_sanitize_radio'
				)
			);

				$wp_customize->add_control( 'qqlanding_bg_settings',
					array(
						'label'		=> __( 'Select Attribute', 'qqlanding' ),
						'description'	=> esc_html__( 'Use this settings to indicate your bacground for the pre-loader.', 'qqlanding' ),
						'section'		=> 'qqlanding_bg_section',
						'priority'		=> 4,
						'type'			=> 'radio',
						'capability'	=> 'edit_theme_options',
						'choices'		=> array(
							'color'		=> __( 'Background Color', 'qqlanding'),
							'image'		=> __( 'Background Image', 'qqlanding'),
						)
					)
				);

			/*-Range-----*/
			$wp_customize->add_setting( 'qqlanding_range_settings',
				array(
					'default'		=> 0,
					'transport'   => 'refresh',
				)
			);

				$wp_customize->add_control( new QQLanding_Customize_Range(
						$wp_customize, 'qqlanding_range_settings', array(

							'label'		=> __( 'Opacity', 'qqlanding' ),
							'description'	=> esc_html__( 'Use this range to indicate the opacity of your bacground.', 'qqlanding' ),
							'section'		=> 'qqlanding_bg_section',
							'priority'		=> 7,
							'type'			=> 'range',
							'capability'	=> 'edit_theme_options',
							'input_attrs'	=> array(
								'min'		=> 0,
								'max'		=> 1,
								'step'		=> 0.05,
								'class'		=> __( 'qqlanding-range', 'qqlanding'),
							)
						)
					)
				);

			/*-Color-Picker----*/
		 	$wp_customize->add_setting( 'qqlanding_bg_color_settings',
		 		array(
		 			'default'	=> '#272525',
		 			'transport'	=> 'refresh',
					'type'				=> 'theme_mod',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'qqLanding_sanitize_hex_color'
		 		)
		 	);

		 		$wp_customize->add_control( new WP_Customize_Color_Control(
		 				$wp_customize, 'qqlanding_bg_color_settings', array(
		 					'label'		=> __( 'Color', 'qqlanding' ),
		 					'section'	=> 'qqlanding_bg_section',
		 					'setting'	=> 'qqlanding_bg_color_settings',
		 				)
		 			)
		 		);

			/*-Upload-Image----*/
			$wp_customize->add_setting( 'qqlanding_bg_image_settings',
				array(
					'sanitize_callback' => 'qqlanding_sanitize_image'
				)
			);

				$wp_customize->add_control(
					new WP_Customize_Image_Control( $wp_customize, 'qqlanding_bg_image_settings',
						array(
							'label'		=> __( 'Image', 'qqLanding' ),
							'section'	=> 'qqlanding_bg_section',
							'setting'	=> 'qqlanding_bg_image_settings',
							/*'description' => __( 'Upload a logo for your website. Recommended height for your logo is 135px.', 'qqLanding' )*/
						)
					)
				);


		/**
	 	* ## Preloader View section
	 	*-------------------------------------*/
	 	$wp_customize->add_section( 'qqlanding_loader_view_section',
	 		array(
	 			'priority'		=> 5,
	 			'title'			=> __( 'Loader', 'qqlanding' ),
	 			'description'	=> esc_html__( 'Use this section to select the icon\'s in your preloader. ', 'qqlanding' ),
				'panel'			=> 'qqlanding_preloader_panel'
	 		)
	 	);

			
			/*-Loader-Picker----*/
			$wp_customize->add_setting( 'qqlanding_loader_item_settings',
				array(
					'default'		=> 'one',
					'transport'		=> 'refresh',
					'sanitize_callback' => 'qqlanding_sanitize_radio'
				)
			);
				$wp_customize->add_control(
					new QQLanding_Customize_Radio_Image(
						$wp_customize, 'qqlanding_loader_item_settings',
						array(
							'label'		=> __( 'Sidebar Layouts', 'qqlanding' ),
							'section'	=> 'qqlanding_loader_view_section',
							'settings'	=> 'qqlanding_loader_item_settings',
							'description'	=> esc_html__( 'Use this settings to indicate your bacground for the pre-loader.', 'qqlanding' ),
							'capability'	=> 'edit_theme_options',
							'choices'	=> array(
								'two'	=> array(
									'label'		=> esc_html__( 'One', 'qqlanding' ),
									'url'		=> '%spreloader_2.png'
								),
								'five'	=> array(
									'label'		=> esc_html__( 'Two', 'qqlanding' ),
									'url'		=> '%spreloader_5.png'
								),
								'seven'	=> array(
									'label'		=> esc_html__( 'Three', 'qqlanding' ),
									'url'		=> '%spreloader_7.png'
								),
								'eleven'	=> array(
									'label'		=> esc_html__( 'Four', 'qqlanding' ),
									'url'		=> '%spreloader_11.png'
								),
								'sixteen'	=> array(
									'label'		=> esc_html__( 'Five', 'qqlanding' ),
									'url'		=> '%spreloader_16.png'
								),
								'twenty'	=> array(
									'label'		=> esc_html__( 'Six', 'qqlanding' ),
									'url'		=> '%spreloader_20.png'
								),
								'twenty_four'	=> array(
									'label'		=> esc_html__( 'Seven', 'qqlanding' ),
									'url'		=> '%spreloader_24.png'
								),
							)
						)
					)
				);

			
			/*-Color-Picker----*/
		 	$wp_customize->add_setting( 'qqlanding_vcolor_settings',
		 		array(
		 			'default'	=> '#ffffff',
		 			'transport'	=> 'refresh',
					'type'				=> 'theme_mod',
					'capability'		=> 'edit_theme_options',
					'sanitize_callback'	=> 'qqLanding_sanitize_hex_color'
		 		)
		 	);

		 		$wp_customize->add_control( new WP_Customize_Color_Control(
		 				$wp_customize, 'qqlanding_vcolor_settings', array(
		 					'label'		=> __( 'Color', 'qqlanding' ),
		 					'section'	=> 'qqlanding_loader_view_section',
		 					'setting'	=> 'qqlanding_vcolor_settings',
		 				)
		 			)
		 		);

}
add_action( 'customize_register', 'qqlanding_customizer_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function qqlanding_customize_preview_js() {
	wp_enqueue_script( 'qqlanding-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'qqlanding_customize_preview_js' );