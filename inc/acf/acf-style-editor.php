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

/* ================================= */
/* =========== Slider ============== */
/* ================================= */ ?>


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
	color: #fff;
	width: 100%;
	height: <?php echo $slide_height; ?>px;
	<?php //echo $presets; ?>

}


<?php if(get_field('slider_layout','option') == 'static'): ?>

<?php 
 if( have_rows('slider_item_r', 'option') ): the_row();
?>

.banner-static-content {
	margin: 2em 0;
	<?php if(get_sub_field('content_settings')['slider_content_size'] == 'half' ){ echo "width: 50%;"; }else{ echo "width: 100%;";  } ?>	
	<?php if(get_sub_field('content_settings')['slider_content_position'] != 'center' ){echo "float:".get_sub_field('content_settings')['slider_content_position']; }?>;	
	<?php echo "text-align:".get_sub_field('content_settings')['slider_text_align'];  ?>;	
}

<?php endif; ?>


#banner-slider {
	width: 100%;
	height: <?php echo $slide_height; ?>px;
}

<?php elseif(get_field('slider_layout','option') == 'slider'): ?>


<?php 
	$count = "0";
	if(have_rows('slider_item_r', 'option')):
		while(have_rows('slider_item_r', 'option')) : the_row();
 			$background = get_sub_field('slide_image');
 			$background = "url('".$background['url']."')";
 		 // echo get_sub_field('content_settings')['slider_content_position']; 
 		 // echo get_sub_field('content_settings')['slider_text_align']; 
?>

.view-<?php echo $count; ?> {
	background : <?php echo $background; ?>;
	height: <?php echo $slide_height; ?>px;	
}

.caro-slide-<?php echo $count; ?> {
	<?php if(get_sub_field('content_settings')['slider_content_size'] == 'half' ){ echo "width: 40%;"; } ?>	
	<?php if(get_sub_field('content_settings')['slider_content_position'] != 'center' ){echo "float:".get_sub_field('content_settings')['slider_content_position']; }?>;	
	<?php if(get_sub_field('content_settings')['slider_content_position'] == 'right' ){echo "left: 50%"; }?>;	

	<?php echo "text-align:".get_sub_field('content_settings')['slider_text_align'];  ?>;	
	top: 20px;
	bottom: 0px;
}
<?php 
		$count++;
		endwhile;	
	endif;
endif;

?>

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

		if ( get_sub_field('th_entry_item') == 'body' ) : ?>
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