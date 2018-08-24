<?php
/**
 * ACF Style Editor
 */

 //Appearance Settings
if(have_rows('slider_appearance_group', 'option')) :
	the_row();
	$slide_width = get_sub_field('slider_width');
	$slide_height = get_sub_field('slider_height');
endif;

//Fonts Settings
if(have_rows('slider_fonts', 'option')) :
	the_row();
	$slidefontfam = qqlanding_fontfam(get_sub_field('slider_font_family'));
	$sliderfontsize =  get_sub_field('slider_font_size');
	$sliderfontstyle =  get_sub_field('slider_font_style');
	$sliderfontweight =  get_sub_field('slider_font_weight');
endif;
?>

/* ================================= */
/* =========== Slider ============== */
/* ================================= */ 

#banner {
	font-family: <?php echo $slidefontfam; ?>;
	font-size: <?php echo $sliderfontsize; ?>px;
	font-style: <?php echo $sliderfontstyle; ?>;
	font-weight: <?php echo $sliderfontweight; ?>;
	width: 100%;
	height: 100%; 
	margin-bottom:2em;
} 

@media screen and (min-width: 768px) {
 #banner {
	height: <?php echo $slide_height; ?>px;
 }
}
<?php if(get_field('slider_layout','option') == 'static'): 

 	if( have_rows('slider_item_r', 'option') ): the_row();
	 	$background = qqlanding_sliding_bg(get_field('slider_bg_attr', 'option'),get_sub_field('slide_image'),get_sub_field('slide_color'));
	  	$presets = qqlanding_preset_acf(get_sub_field('slide_repeat_bg_img'),get_sub_field('slide_scroll_with_page'),get_sub_field('slide_presets'),get_sub_field('slide_image_position'));
?>
#banner-static {
	background: <?php echo $background;?>;
	color: #fff;
	width: 100%;
	height: auto;
	<?php echo $presets; ?>
}

@media screen and (max-width: 767px) {
 #banner-static {
	background-size: cover;
 }
}

.banner-static-content {
	margin: 2em 0;
	<?php if(get_sub_field('content_settings')['slider_content_size'] == 'half' ){ echo "width: 50%;"; }else{ echo "width: 100%;";  } ?>	
	<?php if(get_sub_field('content_settings')['slider_content_position'] != 'center' ){echo "float:".get_sub_field('content_settings')['slider_content_position'].";"; }?>	
	<?php echo "text-align:".get_sub_field('content_settings')['slider_text_align'].";";  ?>	
}
<?php endif; //end slider item
 elseif(get_field('slider_layout','option') == 'slider'): 

	$count = "0";
	if(have_rows('slider_item_r', 'option')):
		while(have_rows('slider_item_r', 'option')) : the_row();
 			$background = qqlanding_sliding_bg(get_field('slider_bg_attr', 'option'),get_sub_field('slide_image'),get_sub_field('slide_color'));
 			$presets = qqlanding_preset_acf(get_sub_field('slide_repeat_bg_img'),get_sub_field('slide_scroll_with_page'),get_sub_field('slide_presets'),get_sub_field('slide_image_position'));

?>
#banner-slider {
	width: 100%;
	height: auto;
}
.view-<?php echo $count; ?> {
	background : <?php echo $background; ?>;
	height: <?php echo $slide_height; ?>px;	
	<?php echo $presets; ?>
}
.caro-slide-<?php echo $count; ?> {
	<?php if(get_sub_field('content_settings')['slider_content_size'] == 'half' ){ 
		echo "width: 40%;"; 
	} ?>	
	<?php if(get_sub_field('content_settings')['slider_content_position'] == 'right' || get_sub_field('content_settings')['slider_content_position'] == 'left' ){
		echo "float:".get_sub_field('content_settings')['slider_content_position'].";"; 
	}?>	
	<?php //if(get_sub_field('content_settings')['slider_content_position'] == 'right' ){echo "left: 50%;"; }?>	
	<?php echo "text-align:".get_sub_field('content_settings')['slider_text_align'].";";  ?>	
	top: 20px;
	bottom: 0px;
}
<?php 
		$count++;
		endwhile;	
	endif; //end slider item 
endif; //end slider layout condition
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

$theme_color = get_field( 'th_color_scheme','option' ); //theme color

/**
 * #Theme Color
 *---------------------*/
if ( have_rows('tcc','option') ) :

	while( have_rows('tcc','option') ) : the_row();
		$link = get_sub_field('tcc_lc');
		$link_hover = get_sub_field('tcc_lhc');
		$title_color = get_sub_field('tcc_tc');
		$title_bg = get_sub_field('tcc_tbgc');
		$title_tbgch = get_sub_field('tcc_tbgch');
		$title_bottom = get_sub_field('tcc_tbc');
		$meta_color = get_sub_field('tcc_meta_color');
		$meta_bg = get_sub_field('tcc_meta_bg_color');
		$meta_bg_hover = get_sub_field('tcc_meta_bg_hc');
	?>
	.qqlanding-sites.qqland-custom a{color: <?php echo $link; ?>;}
	.qqlanding-sites.qqland-custom a:hover,.qqlanding-sites.qqland-custom a:focus,a:active{color: <?php echo $link_hover; ?>;}
	.qqlanding-sites.qqland-custom .widget .widget-title-container{border-bottom-color: <?php echo $title_bottom; ?>;}
	.qqlanding-sites.qqland-custom .widget .widget-title{background-color: <?php echo $title_bg; ?>;}

	.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper,.qqlanding-sites.qqland-custom .qqland-post .page-header,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper,.qqlanding-sites.qqland-custom .qqland-single-post .page-header,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper,.qqlanding-sites.qqland-custom.search-no-results .page-header{border-bottom-color: <?php echo $title_bottom; ?>;}

	.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .entry-title,.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .single-entry-title,.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .page-title,.qqlanding-sites.qqland-custom .qqland-post .page-header .entry-title,.qqlanding-sites.qqland-custom .qqland-post .page-header .single-entry-title,.qqlanding-sites.qqland-custom .qqland-post .page-header .page-title,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .single-entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .page-title,.qqlanding-sites.qqland-custom .qqland-single-post .page-header .entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .page-header .single-entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .page-header .page-title,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .entry-title,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .single-entry-title,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .page-title,.qqlanding-sites.qqland-custom.search-no-results .page-header .entry-title,.qqlanding-sites.qqland-custom.search-no-results .page-header .single-entry-title,.qqlanding-sites.qqland-custom.search-no-results .page-header .page-title{background-color: <?php echo $title_bg; ?>; color: <?php echo $title_color; ?>;}

	.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .entry-title:hover, .qqlanding-sites.qqland-custom .qqland-post .page-header .entry-title:hover, .qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .entry-title:hover, .qqlanding-sites.qqland-custom .qqland-single-post .page-header .entry-title:hover, .qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .entry-title:hover, .qqlanding-sites.qqland-custom.search-no-results .page-header .entry-title:hover{background-color: <?php echo $title_tbgch; ?>;}

	.qqlanding-sites.qqland-custom .qqlanding-cat a,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a,.qqlanding-sites.qqland-custom .qqlanding-tag a,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a{
		color:<?php echo $meta_color; ?>;}

	.qqlanding-sites.qqland-custom .qqlanding-cat a,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a,.qqlanding-sites.qqland-custom .qqlanding-tag a,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a{
		background-color:<?php echo $meta_bg; ?>;}

	.qqlanding-sites.qqland-custom .qqlanding-cat a:hover,.qqlanding-sites.qqland-custom .qqlanding-cat a:focus,.qqlanding-sites.qqland-custom .qqlanding-cat a:visited,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a:hover,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a:focus,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a:visited,.qqlanding-sites.qqland-custom .qqlanding-tag a:hover,.qqlanding-sites.qqland-custom .qqlanding-tag a:focus,.qqlanding-sites.qqland-custom .qqlanding-tag a:visited,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a:hover,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a:focus,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a:visited{
		background-color:<?php echo $meta_bg_hover; ?>;}
	<?php endwhile;

endif;


/**
 * #Menu Color
 *---------------------*/

if ( have_rows('menu_color','option') ) :

	while( have_rows('menu_color','option') ) : the_row();
		$wrap = get_sub_field('menu_wrapper_color');
		$link = get_sub_field('menu_link_color');
		$link_hover = get_sub_field('menu_lhc');
		$menu_text = get_sub_field('menu_mtc');
		$menu_text_hover = get_sub_field('menu_mth');?>
		
		.qqlanding-sites.qqland-custom .navbar{
			background: <?php echo $wrap; ?>;
		}
		.qqlanding-sites.qqland-custom #site-navigation .navbar-nav .nav-link{
			background-color: <?php echo $link; ?>;
			color: <?php echo $menu_text; ?>;
		}
		.qqlanding-sites.qqland-custom #site-navigation .navbar-nav .nav-link:hover,
		.qqlanding-sites.qqland-custom #site-navigation .navbar-nav .nav-link:focus{
			background-color: <?php echo $link_hover; ?>;
			color: <?php echo $menu_text_hover; ?>;
		}
		.qqlanding-sites.qqland-custom #site-navigation .dropdown-menu{
			background-color: <?php echo $link; ?>;
		}

	<?php endwhile;

endif;
 