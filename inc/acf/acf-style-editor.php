<?php
/**
 * ACF Style Editor
 */

 //Appearance Settings
if(have_rows('rwd_settings', 'option')) :
	while(have_rows('rwd_settings', 'option')) : the_row();
		$slide_width = get_sub_field('slider_width');
		$slide_height = get_sub_field('slider_height');
		$slide_tablet_width = get_sub_field('slider_tablet_width');
		$slide_tablet_height = get_sub_field('slider_tablet_height');
		$slide_mobile_width = get_sub_field('slider_mobile_width');
		$slide_mobile_height = get_sub_field('slider_mobile_height');
	endwhile;
endif;

//Fonts Settings
if(have_rows('slider_fonts', 'option')) :
	while(have_rows('slider_fonts', 'option')) : the_row();
		$slidefontfam = qqlanding_fontfam(get_sub_field('slider_font_family', 'option'));
		$sliderfontsize =  get_sub_field('slider_font_size', 'option');
		$sliderfontstyle =  get_sub_field('slider_font_style', 'option');
		$sliderfontweight =  get_sub_field('slider_font_weight', 'option');
	endwhile;
endif;

$filter = get_field( 'filter_fields', 'option' ); /*--filters*/
?>

/* ================================= */
/* =========== Slider ============== */
/* ================================= */ 
#banner .banner-static-content{
	font-family: <?php echo $slidefontfam; ?>;
	font-size: <?php echo $sliderfontsize; ?>px;
	font-style: <?php echo $sliderfontstyle; ?>;
	font-weight: <?php echo $sliderfontweight; ?>;
}

<?php if ( get_field('slider_layout','option') == 'static' ): ?>
	<?php if ( have_rows( 'slider_item_static', 'option' ) ): ?>
		<?php while ( have_rows( 'slider_item_static', 'option' ) ): the_row();
			$bg = qqlanding_sliding_bg(get_field('slider_bg_attr', 'option'),get_sub_field('slide_image'),get_sub_field('slide_color'));
			$presets = qqlanding_preset_acf(get_sub_field('slide_repeat_bg_img'),get_sub_field('slide_scroll_with_page'),get_sub_field('slide_presets'),get_sub_field('slide_image_position'),get_sub_field('slide_image_size'));
			if ( ! empty($filter) ): ?>
			.slider-filters{background: <?php echo $bg;?>;<?php echo $presets; ?><?php if ( ! empty( get_field( 'slider_opacity', 'option' ) ) && get_field( 'slider_opacity', 'option' ) != '0' ) : ?>opacity: <?php the_field( 'slider_opacity', 'option' ); ?><?php endif; ?>;}
			@media screen and (min-width: 960px) {
				#banner-static,.slider-filters{height: <?php echo $slide_height; ?>px;}
			}
			<?php else: ?>
			<?php if ( empty( get_field( 'slider_opacity', 'option' ) ) || get_field( 'slider_opacity', 'option' ) == '0' ) : ?>#banner-static{background: <?php echo $bg;?>;<?php echo $presets; ?>}<?php endif; ?>
			<?php if ( ! empty( get_field( 'slider_opacity', 'option' ) ) && get_field( 'slider_opacity', 'option' ) != '0' ) : ?>#banner-static:after{background: <?php echo $bg;?>;<?php echo $presets; ?> opacity: <?php the_field( 'slider_opacity', 'option' ); ?>;}<?php endif; ?>
			@media screen and (min-width: 960px) {
				#banner-static{height: <?php echo $slide_height; ?>px;}
			}
			<?php endif; ?>

		<?php endwhile; //end of slider_item_static?>
	<?php endif; //check the static slider?>
<?php else: ?>
	<?php if ( have_rows( 'slider_item_r', 'option' ) ): $count = 0;?>
		<?php while ( have_rows( 'slider_item_r', 'option' ) ): the_row();
			$filter = get_field( 'filter_fields', 'option' );
			$bg = qqlanding_sliding_bg(get_field('slider_bg_attr', 'option'),get_sub_field('slide_image'),get_sub_field('slide_color'));
			$presets = qqlanding_preset_acf(get_sub_field('slide_repeat_bg_img'),get_sub_field('slide_scroll_with_page'),get_sub_field('slide_presets'),get_sub_field('slide_image_position'),get_sub_field('slide_image_size'));
			if ( ! empty($filter) ): ?>
				.slider-views-<?php echo $count;?>.slider-filter:after{
					background: <?php echo $bg;?>;
					<?php echo $presets;?>
					<?php if (empty( get_field( 'slider_opacity', 'option' ) ) || get_field( 'slider_opacity', 'option' ) != '0'): ?>opacity: <?php the_field( 'slider_opacity', 'option' ); ?>;<?php endif; ?>
				}
			<?php else: ?>
				.slider-views-<?php echo $count;?>{
					background: <?php echo $bg;?>;
					<?php echo $presets;?>
					<?php if (empty( get_field( 'slider_opacity', 'option' ) ) || get_field( 'slider_opacity', 'option' ) != '0'): ?>opacity: <?php the_field( 'slider_opacity', 'option' ); ?>;<?php endif; ?>
				}
			<?php endif; ?>
		<?php $count++; endwhile;
		$countd = 0;
		$countt = 0;
		$countm = 0;
		//desktop
		while ( have_rows( 'slider_item_r', 'option' ) ): the_row();?>
			.slider-views-<?php echo $countd;?>{height: <?php echo $slide_height; ?>px;}
		<?php $countd++; endwhile; ?>
		@media (min-width:768px) and (max-width:1024px){
			<?php //Tablet
			while ( have_rows( 'slider_item_r', 'option' ) ): the_row();?>
				.slider-views-<?php echo $countt;?>{height: <?php echo $slide_tablet_height; ?>px;}
			<?php $countt++; endwhile;?>
		}
		@media (min-width:320px) and (max-width:768px){
			<?php //mobile
			while ( have_rows( 'slider_item_r', 'option' ) ): the_row();?>
				.slider-views-<?php echo $countm;?>{height: <?php echo $slide_mobile_height; ?>px;}
			<?php $countm++; endwhile;?>
		}
		
	<?php endif; //check the slider?>
<?php endif; //check the slider layout ?>
<?php if ( ! empty( get_field( 'filter_fields', 'option' ) ) ): ?>.slider-filters{<?php echo qqlanding_filters( 'filter_fields', 'filter_selection', 'filter_values','filter_dimension' ); ?>}
[class*='slider-views-'].slider-filter:after{<?php echo qqlanding_filters( 'filter_fields', 'filter_selection', 'filter_values','filter_dimension' ); ?>}<?php endif; ?>


/* ================================= */
/* =========== Content ============== */
/* ================================= */ 
<?php
	$count = '1';

 	if( have_rows('content_item', 'option') ): 
 		while ( have_rows( 'content_item', 'option') ) : the_row();
 		
 		if($count == 1){
 			$val = "first";
 		}else{
 			$val = "last";
 		}
 		$backgroundcf = "";
		$presetscf = "";
 		
 		if(get_sub_field('ci_bg', 'option') == "bg-color"){
		 	$backgroundcf = qqlanding_sliding_bg(get_sub_field('ci_bg', 'option'),get_sub_field('ci_image'),get_sub_field('ci_color'));
 		
 		}else{
		 	$backgroundcf = qqlanding_sliding_bg(get_sub_field('ci_bg', 'option'),get_sub_field('ci_image'),get_sub_field('ci_color'));
		  	$presetscf = qqlanding_preset_acf(get_sub_field('ci_repeat_bg_img'),get_sub_field('ci_scroll_with_page'),get_sub_field('ci_presets'),get_sub_field('ci_image_position'),get_sub_field('ci_image_size'));

 		}

 		$position = content_img_postion(get_sub_field('images_pos_prop', 'option'),get_sub_field('fp_img_position')['fp_position_top'],get_sub_field('fp_img_position')['fp_position_right'],get_sub_field('fp_img_position')['fp_position_left'],get_sub_field('fp_img_position')['fp_position_buttom']);
	  	
	  		$height ="";
	  if(get_sub_field('fp_app_set')['ca_height']){
	  		$height = "height : ".get_sub_field('fp_app_set')['ca_height'].';';
	  }	


?>

.content-<?php echo $val; ?> {
	background : <?php echo $backgroundcf; ?>;
	<?php echo @$presetscf; ?>
}

@media (min-width: 992px) {
	.content-<?php echo $val; ?> {
		<?php echo @$height; ?>
	}
}

.content-<?php echo $val; ?>-img {
	<?php echo $position; ?>
}

<?php 
			$count++;
		endwhile;
	endif;

/**
 * #Theme Default
 *---------------------*/
if ( have_rows( 'th_fonts', 'option' ) ) :
	while ( have_rows( 'th_fonts', 'option' ) ) : the_row();
	$font_family = qqlanding_fontfam( get_sub_field('thr_font_family') );
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
			font-family:<?php echo $font_family; ?>;font-size: <?php echo $font_size; ?>px; font-style: <?php echo $font_style; ?>; font-weight: <?php echo $font_weight; ?>; }	
	<?php endwhile;
endif;

$theme_color = get_field( 'th_color_scheme','option' ); //theme color
/**
 * #Theme Color
 *---------------------*/
if ( have_rows('tcc','option') ) :

	while( have_rows('tcc','option') ) : the_row();
		$link = get_sub_field('tcc_links','option');
		$title = get_sub_field('tcc_title','option');
		$tcc_meta_tags = get_sub_field('tcc_meta_tags','option');
		$tcc_btn = get_sub_field('tcc_btn','option');
		
	?>
	.qqlanding-sites.qqland-custom a{color: <?php echo $link['tcc_lc']; ?>;}
	.qqlanding-sites.qqland-custom a:hover,.qqlanding-sites.qqland-custom a:focus,a:active{color: <?php echo $link['tcc_lhc']; ?>;}
	.qqlanding-sites.qqland-custom .widget .widget-title-container{border-bottom-color: <?php echo $title['tcc_tbc'];; ?>;}
	.qqlanding-sites.qqland-custom .widget .widget-title{background-color: <?php echo $title['tcc_tbgc']; ?>;}

	.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper,.qqlanding-sites.qqland-custom .qqland-post .page-header,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper,.qqlanding-sites.qqland-custom .qqland-single-post .page-header,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper,.qqlanding-sites.qqland-custom.search-no-results .page-header{border-bottom-color: <?php echo $title['tcc_tbc'];; ?>;}

	.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .entry-title,.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .single-entry-title,.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .page-title,.qqlanding-sites.qqland-custom .qqland-post .page-header .entry-title,.qqlanding-sites.qqland-custom .qqland-post .page-header .single-entry-title,.qqlanding-sites.qqland-custom .qqland-post .page-header .page-title,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .single-entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .page-title,.qqlanding-sites.qqland-custom .qqland-single-post .page-header .entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .page-header .single-entry-title,.qqlanding-sites.qqland-custom .qqland-single-post .page-header .page-title,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .entry-title,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .single-entry-title,.qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .page-title,.qqlanding-sites.qqland-custom.search-no-results .page-header .entry-title,.qqlanding-sites.qqland-custom.search-no-results .page-header .single-entry-title,.qqlanding-sites.qqland-custom.search-no-results .page-header .page-title{background-color: <?php echo $title['tcc_tbgc']; ?>; color: <?php echo $title['tcc_tc']; ?>;}

	.qqlanding-sites.qqland-custom .qqland-post .qqland-entry-wrapper .entry-title:hover, .qqlanding-sites.qqland-custom .qqland-post .page-header .entry-title:hover, .qqlanding-sites.qqland-custom .qqland-single-post .qqland-entry-wrapper .entry-title:hover, .qqlanding-sites.qqland-custom .qqland-single-post .page-header .entry-title:hover, .qqlanding-sites.qqland-custom.search-no-results .qqland-entry-wrapper .entry-title:hover, .qqlanding-sites.qqland-custom.search-no-results .page-header .entry-title:hover{background-color: <?php echo $title['tcc_tbgch']; ?>;}

	.qqlanding-sites.qqland-custom .qqlanding-cat a,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a,.qqlanding-sites.qqland-custom .qqlanding-tag a,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a{
		color:<?php echo $tcc_meta_tags['tcc_meta_color']; ?>;}

	.qqlanding-sites.qqland-custom .qqlanding-cat a,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a,.qqlanding-sites.qqland-custom .qqlanding-tag a,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a{
		background-color:<?php echo $tcc_meta_tags['tcc_meta_bg_color']; ?>;}

	.qqlanding-sites.qqland-custom .qqlanding-cat a:hover,.qqlanding-sites.qqland-custom .qqlanding-cat a:focus,.qqlanding-sites.qqland-custom .qqlanding-cat a:visited,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a:hover,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a:focus,.qqlanding-sites.qqland-custom .qqlanding-cat-lists a:visited,.qqlanding-sites.qqland-custom .qqlanding-tag a:hover,.qqlanding-sites.qqland-custom .qqlanding-tag a:focus,.qqlanding-sites.qqland-custom .qqlanding-tag a:visited,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a:hover,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a:focus,.qqlanding-sites.qqland-custom .qqlanding-tag-lists a:visited{
		background-color:<?php echo $tcc_meta_tags['tcc_meta_bg_hc']; ?>;}

	.qqlanding-sites.qqland-custom .search-form .search-submit,.qqlanding-sites.qqland-custom .paging-navigation li a{background-color:<?php echo $tcc_btn['btn_bg_color']; ?>;color:<?php echo $tcc_btn['btn_text_color']; ?>;}
	.qqlanding-sites.qqland-custom .search-form .search-submit:hover,.qqlanding-sites.qqland-custom .paging-navigation li a:hover,.qqlanding-sites.qqland-custom .page-numbers .current{background-color:<?php echo $tcc_btn['btn_bgc_hover']; ?>;}
	.qqlanding-sites.qqland-custom .search-form .search-submit:focus,.qqlanding-sites.qqland-custom .paging-navigation li a:focus{background-color:<?php echo $tcc_btn['btn_bgc_focus']; ?>;}
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

/**
 * #Providers
 *---------------------*/
$pvs_layout = get_field( 'pvs_layout', 'option' );
$theme_color = get_field( 'layout', 'option' ); // General Setting
$pvs_bg_color = get_field( 'pvs_bg_color', 'option' ); // BG color for featured post
if ( have_rows( 'pvs_settings', 'option' ) ) :
	while ( have_rows( 'pvs_settings', 'option' ) ) : the_row();
		$pvs_layout = get_sub_field( 'pvs_icons_colors', 'option' );
		$pvs_bg_color = get_sub_field( 'pvs_bg_color', 'option' );
		$pvs_border = get_sub_field( 'pvs_border_color', 'option' );

		switch ( $pvs_layout ) {
		case 'white':
			$nth_class = 'default';
			$bg_class = 'w';
			break;
		case 'colored':
			$nth_class = 'category';
			$bg_class = 'g';
			break;
		default:
			$nth_class = 'default';
			$bg_class = 'g';
			break;
		}?>

		#Fproviders{background-color: <?php echo $pvs_bg_color; ?> !important;}
		.provider-group[class*='-category']{<?php if ( $pvs_border ): ?>border-color: <?php echo $pvs_border; ?> !important;<?php else: ?>border-color: #7f7f7f;<?php endif; ?>}.provider-group .provider-item > i{ background: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/providers/ico_reco-<?php echo $bg_class; ?>.png') no-repeat; }
	<?php endwhile;
endif;


/**
 * #Featured Post
 *---------------------*/
if ( have_rows( 'th_presets', 'option') ) :
	while ( have_rows( 'th_presets', 'option') ) : the_row();

		$repeat = get_sub_field('fp_repeat_bg_img');
		$scroll = get_sub_field('fp_scroll_with_page');
		$screen = get_sub_field('fp_presets');
		$position = get_sub_field('fp_image_position');
		$image_size = get_sub_field('fp_image_size');

		$bg_attr = qqlanding_preset_acf( $repeat, $scroll, $screen, $position, $image_size); ?>
		#Fpost{<?php if ( get_field( 'fp_bg_attr','option' ) == 'bg-color' ): ?>background-color: <?php echo get_field('fp_bg_color','option'); ?>;<?php else: ?>background-image: url(<?php echo get_field('fp_bg_image','option'); ?>);<?php echo $bg_attr; ?><?php endif; ?>}

	<?php endwhile;	
endif;



/**
 * #Floating banner
 *---------------------*/

if ( have_rows( 'fb_layout_settings' ,'option' ) ) :
	while( have_rows( 'fb_layout_settings' ,'option' ) ): the_row();

		$layout = get_sub_field( 'fb__layout', 'option' );?>
		.qqgroup-sidebox,.m-qqgroup-ads{ background-color:<?php echo get_sub_field('fb__item_side_bg_color', 'option'); ?>;}.qqgroup-logo{color:<?php echo get_sub_field('fb__item_side_color', 'option');  ?>;}


		<?php if ( have_rows( 'fb__item' ,'option' ) ) : $count  = 1;
			while( have_rows( 'fb__item' ,'option' ) ): the_row();

				if ($layout === 'flat') {
					$style = 'background-color:' . esc_attr( get_sub_field( 'fb__item_img_bg_color','option' ) );
				}else{
					$style = 'box-shadow:4px 5px 10px ' . esc_attr( get_sub_field( 'fb__item_img_shadow', 'option') );
				}?>
				.qqgroup-item:nth-child(<?php echo $count ?>){ <?php echo $style; ?> }

			<?php $count++; endwhile; //end of fb__item
		endif; //end of fb__item

	endwhile;//end of fb_layout_settings
endif;//end of fb_layout_settings

?>


/**
 * Media Query
 *-------------------------*/
@media (min-width: 768px){<?php /**
		 * Providers Item
		 *-------------------------*/if ( have_rows( 'pvs_items', 'option' ) ) : $prov_count = 1; ?><?php while( have_rows('pvs_items', 'option') ): the_row();   // loop through rows (parent repeater) ?>.provider-group[class*='-<?php echo $nth_class; ?>']:nth-child(<?php echo $prov_count; ?>){<?php if ( get_sub_field( 'pvs_pi_max_width' ) ): ?>max-width: <?php the_sub_field( 'pvs_pi_max_width' ); ?>%;<?php else: ?>max-width: inherit;<?php endif; ?>}<?php $prov_count++; endwhile; ?><?php endif; ?>}