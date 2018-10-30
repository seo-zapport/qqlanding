<?php
/**
* Template Name: Video
*
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QQLanding
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
			do_action( 'qqlanding_page_before_video_parts' );
			if ( ! has_action( 'qqlanding_page_video_parts' ) ) :
				/*'provider','content-a','post',*/
				 $value = array(

					'content','match','videos'

				); //items

				//array push
				
				/*if(get_field('fa_show_content') == "Yes" ){
					array_push($value,"content-b");
				}*/
				$videos = apply_filters( 'qqlanding_page_videos_order', $value );

				foreach ($videos as $video) :
					qqlanding_load_vsections($video);
				endforeach;

			else:
				do_action( 'qqlanding_page_video_parts' );
			endif;
			do_action( 'qqlanding_page_after_video_parts' );
		?>
	</main>
</div>
<?php 
get_footer();