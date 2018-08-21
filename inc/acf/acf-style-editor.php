<?php
/**
 * ACF Style Editor
 */

//Slider Item
if(get_field('slider_bg_attr', 'option') == "bg-image") :
	if(have_rows('slider_item_r', 'option')) : 
		the_row();
		$background = get_sub_field('slide_image');
		$background = "url('".$background['url']."')";
	endif;
else:
	if(have_rows('slider_item_r', 'option')) : 
		the_row();
		$background = get_sub_field('slide_color');
	endif;	
endif;


//Slider Presets
if(get_field('slider_item_r', 'option')) : 

	if(get_sub_field('slide_repeat_bg_img') == "Yes"):
		$repeat = "repeat";
	else:
		$repeat = "no-repeat";
	endif;	

	if(get_sub_field('slide_scroll_with_page') == "Yes"):
		$scroll = "background-attachment: fixed;";
	else:
		$scroll = "";
	endif;	


	 if(get_sub_field('slide_presets') =='fill-screen'):

	 	$presets = "background-position:".get_sub_field('slide_image_position')."; background-repeat:no-repeat;";

	 elseif(get_sub_field('slide_presets') =='fit-to-screen'):

	 	$presets = "background-position:".get_sub_field('slide_image_position')."; background-repeat:".$repeat.";";	

	 elseif(get_sub_field('slide_presets') =='repeat'):

	 	$presets = "background-position:".get_sub_field('slide_image_position')."; background-repeat:no-repeat;".$scroll;

	 elseif(get_sub_field('slide_presets') =='custom'):

	 	$presets = "background-position:".get_sub_field('slide_image_position')."; background-repeat:".$repeat.";".$scroll;


	 else:

		$presets = "";
	 
	 endif;
 
 endif;


//Appearance Settings
if(have_rows('slider_appearance_group', 'option')) :
	the_row();
	$slide_width = get_sub_field('slider_width');
	$slide_height = get_sub_field('slider_height');
endif;

//Content Settings
if(have_rows('slider_content_settings', 'option')) :
	the_row();
	if(get_sub_field('slider_content_size') == 'full'):
		$contentsize = "100%";
	else:
		$contentsize = "50%";	
	endif;

	if(get_sub_field('slider_position') == 'right'):
		$contentposition = "float: right;";
	elseif(get_sub_field('slider_position') == 'left'):
		$contentposition = "float: left;";
	else:
		$contentposition = "";	
	endif;
endif;

//Fonts Settings
if(have_rows('slider_fonts', 'option')) :
	the_row();
	
	$sliderfont =  get_sub_field('slider_font_family');
	$sliderfontsize =  get_sub_field('slider_font_size');
	$sliderfontstyle =  get_sub_field('slider_font_style');
	$sliderfontweight =  get_sub_field('slider_font_weight');


endif;
?>


/* ================================= */
/* =========== Slider ============== */
/* ================================= */

#banner {
	
	font-size: <?php echo $sliderfontsize; ?>px;
	font-style: <?php echo $sliderfontstyle; ?>;
	font-weight: <?php echo $sliderfontweight; ?>;
	width: 100%;
	height: <?php echo $slide_height; ?>px; 
	margin-bottom:2em;
} 

#banner-static {
	background: <?php echo $background;?>;
	width: 100%;
	height: <?php echo $slide_height; ?>px;
	<?php echo $presets; ?>

}

.banner-static-content {
	margin: 2em 0;
	width : <?php echo $contentsize; ?>;
	<?php echo $contentposition; ?>

}