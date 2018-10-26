<?php

function qqlanding_vid_sanitize_html($html){
	return wp_filter_nohtml_kses( $html );
}

function qqlanding_vid_sanitize_url($url){
	return esc_url_raw( $url );
}

function qqlanding_vid_sanitize_text($input){
	return sanitize_text_field( $input );
}