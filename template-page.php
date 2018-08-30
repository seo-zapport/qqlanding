<?php
if ( ! defined('ABSPATH')) exit;
/**
 * Template Name: QQLanding Front Page
 *
 * @package QQLanding
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
			do_action( 'qqlanding_page_before_section_parts' );
			if ( ! has_action( 'qqlanding_page_section_parts' ) ) :

				 $value = array(
<<<<<<< HEAD
					'provider','content-a','post',
=======
					'banner','provider','content-a','post',
>>>>>>> ec111ad233d69ff03b20d443686b7524788ec1f0
				); //items

				//array push
				
				if(get_field('fa_show_content') == "Yes" ){
					array_push($value,"content-b");
				}


				$sections = apply_filters( 'qqlanding_page_sections_order', $value );

				foreach ($sections as $section) :
					qqlanding_load_section($section);
				endforeach;

			else:
				do_action( 'qqlanding_page_section_parts' );
			endif;
			do_action( 'qqlanding_page_after_section_parts' );
		?>
	</main>
</div>
<?php 
get_footer();