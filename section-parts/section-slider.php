<?php
// Section Slider
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<section id="banner">

<?php
	if(get_field('slider_layout', 'options') == "static") {
?>
	<div id="banner-static" >	
		<div id="banner-static-feature" class="site-content container">
				<div class="banner-static-content">	
					<?php if( have_rows('slider_item_r', 'option') ): 
							the_row(); ?>
						<h3><?php the_sub_field('slider_title'); ?></h3>
					    <p><?php the_sub_field('slider_content'); ?></p>    	
					<?php endif; ?>
					<button>EnterSite</button>
				</div>
		</div>
	</div>

<?php 
	}elseif(get_field('slider_layout', 'options') == "slider"){		
?>
	<div id="banner-slider">
	</div>
<?php 
	}//end of if statement of slider layout
?>

<?php 

?>


</section>