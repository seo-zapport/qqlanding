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
	
	font-family: <?php echo $sliderfont[0]; ?>;
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

#banner-slider {
	width: 100%;
	height: <?php echo $slide_height; ?>px;
}

.banner-static-content {
	margin: 2em 0;
	width : <?php echo $contentsize; ?>;
	<?php echo $contentposition; ?>

}


.carousel-item .view img{
	width: 100%;
	height: <?php echo $slide_height; ?>px;	
}


<?php



if ( have_rows( 'th_fonts', 'option' ) ) :
	while ( have_rows( 'th_fonts', 'option' ) ) : the_row();
		$font_family = get_sub_field('thr_font_family');
		$font_size = get_sub_field('thr_font_size');
		$font_style = get_sub_field('thr_font_style');
		$font_weight = get_sub_field('thr_font_weight');

		/*if ( get_sub_field('th_entry_item') == 'body' ) : ?>
			body.qqlanding-sites{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>px; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php elseif( get_sub_field('th_entry_item') == 'content' ): ?>
			.page-content,.entry-content,.entry-summary,.comment-content{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php elseif( get_sub_field('th_entry_item') == 'meta' ): ?>
			.genpost-entry-meta,.single-entry-meta,.genpost-entry-footer{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php elseif( get_sub_field('th_entry_item') == 'link' ): ?>
			a, .page-links{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php else: ?>
			.page-entry-title,.archive-page-title,.search-page-title,.entry-title{ font-family: <?php echo $font_family[0]; ?>; font-size: <?php echo $font_size; ?>; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }
		<?php endif;*/ ?>	

		<?php if ( get_sub_field('th_entry_item') == 'body' ) : ?>
			body.qqlanding-sites{
		<?php elseif( get_sub_field('th_entry_item') == 'content' ): ?>
			.page-content,.entry-content,.entry-summary,.comment-content{
		<?php elseif( get_sub_field('th_entry_item') == 'meta' ): ?>
			.genpost-entry-meta,.single-entry-meta,.genpost-entry-footer{
		<?php elseif( get_sub_field('th_entry_item') == 'link' ): ?>
			a, .page-links{
		<?php else: ?>
			.page-entry-title,.archive-page-title,.search-page-title,.entry-title{
		<?php endif; ?>
		font-size: <?php echo $font_size; ?>px; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }	
	<?php endwhile;

endif;

?>