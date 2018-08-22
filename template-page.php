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
					'slider','content'
=======
					'provider','content'
>>>>>>> b6d2702... initial commit
				); //items
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