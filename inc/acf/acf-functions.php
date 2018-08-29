<?php
/**
 * This is were all of the functions for the 
 * ACF settings are created.
 */

if ( function_exists( 'acf_add_options_page' ) ) :
	acf_add_options_page( array(
		'page_title' 	=> __( 'General Theme Settings.', 'qqlanding' ),
		'menu_title' 	=> __( 'General Theme', 'qqlanding' ),
		'menu_slug'		=> 'general-theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	) ); //General Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Slider Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Slider', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Front Page Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Front Page Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Front Page', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Front Page Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( 'Promo Banners Settings', 'qqlanding' ),
		'menu_title' 	=> __( 'Promo Banners', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //Promo Banners Settings
	
	acf_add_options_sub_page( array(
		'page_title' 	=> __( '404 Page Settings', 'qqlanding' ),
		'menu_title' 	=> __( '404 Page', 'qqlanding' ),
		'parent_slug'	=> 'general-theme-settings',
	) ); //404 Page Settings

endif;

/**
 * This will add some class to your body
 */
function qqlanding_schema( $class ){
	$add_affix = ( get_field('th_nav_settings','option') == true ) ? 'qqland-affix' : 'qqland-no-affix';

	$template = get_field( 'header_template', 'option' );
	switch ($template) {
		case 'bare': $new_class = "qqlayout-bare"; break;
		case 'overlay': $new_class = "qqlayout-overlay"; break;
		default: $new_class = "qqlayout-default"; break;
	}

	switch ( $class ) {
		case 'qq188': $class = 'qq188 ' . $add_affix . ' ' . $new_class; break;
		case 'qq101': $class = 'qq101 ' . $add_affix . ' ' . $new_class; break;
		case 'qq1x2': $class = 'qq1x2 ' . $add_affix . ' ' . $new_class; break;
		case 'qq724': $class = 'qq724 ' . $add_affix . ' ' . $new_class; break;
		case 'qqfortuna': $class = 'qqfortuna ' . $add_affix . ' ' . $new_class; break;
		case 'qq801': $class = 'qq801 ' . $add_affix . ' ' . $new_class; break;
		case 'qq882': $class = 'qq882 ' . $add_affix . ' ' . $new_class; break;
		case 'qq808': $class = 'qq808 ' . $add_affix . ' ' . $new_class; break;
		case 'qq828': $class = 'qq828 ' . $add_affix . ' ' . $new_class; break;
		case 'custom': $class = 'custom ' . $add_affix . ' ' . $new_class; break;
		default: $class = 'qq288 ' . $add_affix . ' ' . $new_class; break;
	}
	return $class;
}

function qqlanding_fontfam( $font ){

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

function qqlanding_preset_acf($repeat, $scroll, $screen, $position, $image_size){

	if($repeat == "Yes"):
		$repeat_preset = "repeat";
	else:
		$repeat_preset = "no-repeat";
	endif;	

	if($scroll == "Yes"):
		$scroll_preset = "background-attachment: fixed;background-size: cover;";
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



function qqlanding_btn_entersite($link, $btn_image, $link_rel, $link_target){

	 	if($btn_image){
	 		$imgbutton = $btn_image;
	 	}else{
	 		$imgbutton = get_template_directory_uri().'/assets/images/default/enter.png';
	 	}
	 	if($link_rel == 'yes'){
	 		$linkRel = 'nofollow';
	 	}else{
	 		$linkRel = 'follow';
	 	}
	 	if($link_target == 'yes'){
	 		$linktar = '_blank';
	 	}else{
	 		$linktar = '_self';
	 	}
	
	   $entersite = '<a href="'.$link.'" rel="'.$linkRel.'" target="'.$linktar.'"><img class="img-responsive enter-site" src="'.$imgbutton.'" alt="ENTER SITE" title="ENTER SITE"></a>';
	 
	   return $entersite;

} 


 function fpcontent_img_position($img,$class){

		$htmlleft = '<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
		$htmlleft .= '<img src="'.$img['url'].'" alt="'.$img['alt'].'" class="content-'.$class.'-img">';	
		$htmlleft .= '<meta itemprop="width" content=""/>';	
		$htmlleft .= '<meta itemprop="height" content=""/>';	
		$htmlleft .= '</div>';	

 		return $htmlleft;

 }

 //function fpcontent_content_position(){
 function fpcontent_content_position($mmk_title, $mmk_content){

		$logo = get_theme_mod( 'site_logo', '' ); 
			if ( !empty( $logo ) ) : 
			list($width, $height, $type, $attr) = getimagesize($logo);
 			endif;			

 		$content = '<article id="post-'.get_the_ID().'" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">';
 		$content .= '<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="'.get_permalink().'"/>';			
 		$content .= '<header class="entry-header">';	
 		//$content .= '<h3 itemprop="headline">'.get_field("fa_title").'</h3>';	
 		$content .= '<h3 itemprop="headline">'.$mmk_title.'</h3>';	
 		$content .= '<!-- .AMP  -->';	
 		$content .= '<meta itemprop="author" content="'.get_the_author().'">';	
 		$content .= '<meta itemprop="datePublished" content="'.get_the_time('c').'">';	
 		$content .= '<meta itemprop="dateModified" content="'.get_the_modified_time('c').'">';	
 		$content .= '<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';	
 		$content .= ' <meta itemprop="name" content="'.get_permalink().'"/>';	
 		
 		$content .= '<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';	
 		$content .= ' <meta itemprop="url" content="'.esc_url( $logo ).'"/>';	
 		$content .= ' <meta itemprop="width" content="'.$width.'"/>';	
 		$content .= ' <meta itemprop="height" content="'.$height.'"/>';	
 		$content .= '</div>';	
 		$content .= '</header>';	
 		$content .= '<div itemprop="articleBody" class="entry-content">';	
 		//$content .= get_field("fa_content");
 		$content .= $mmk_content;
 		$content .= '</div><!-- .entry-content -->';
 		$content .='</article>';	

 		return $content;

 }
 