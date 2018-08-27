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
					<?php if( have_rows('slider_item_r', 'option') ): the_row(); ?>
						<h3><?php the_sub_field('slider_title'); ?></h3>
					    <p><?php the_sub_field('slider_content'); ?></p>    
						<?php echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); ?>
					<?php endif; ?>
				</div>
		</div>
	</div>
<?php 
	}elseif(get_field('slider_layout', 'options') == "slider"){		
?>
	<div id="banner-slider">
		<?php 
			if(have_rows('slider_animations_group','option')) : the_row(); 
				if(get_sub_field('slider_animation_fade') == "Yes"): 
					$fade = "carousel-fade";
				else:
					$fade = "";
				endif;
			endif;
		?>
		<?php  if(have_rows('slider_appearance_group','option')) : the_row(); ?>
		<!--Carousel Wrapper-->
		<div id="carousel" class="carousel slide <?php echo $fade; ?>" data-ride="carousel" <?php if(get_sub_field('slider_autoplay') != "Yes"): echo 'data-interval="false"'; endif; ?> >	
		    <?php if(get_sub_field('slider_nav_dots') == "Yes"): ?>
		    <!--Indicators-->
		    <ol class="carousel-indicators">	
		       	<?php 
					$count = "0";
					if( have_rows('slider_item_r', 'option') ): 
						while ( have_rows( 'slider_item_r', 'option' ) ) : the_row(); 
				?>
		        <li data-target="#carousel" data-slide-to="<?php echo $count; ?>"  <?php if($count=="0"){ echo " class='active'"; } ?>></li>
				<?php 
						$count++;
					endwhile;
				endif; ?>
		    </ol>
		    <!--/.Indicators-->
		    <?php 
		    	endif;  
		    ?>
		    <!--Slides-->
		    <div class="carousel-inner" role="listbox">
				<?php 
					$count = "0";
					if( have_rows('slider_item_r', 'option') ): 
						while ( have_rows( 'slider_item_r', 'option' ) ) : the_row(); 
						$background = get_sub_field('slide_image');	
				?>
		        <div class="carousel-item<?php if($count == '0'){echo ' active';}else{echo '';} ?> view-<?php echo $count; ?>">
		            <div class="carousel-caption caro-slide-<?php echo $count; ?>">
		                <h3 class="h3-responsive"><?php the_sub_field('slider_title'); ?></h3>
					    <p><?php the_sub_field('slider_content'); ?></p>    	
						<?php echo qqlanding_btn_entersite(get_sub_field('enter_site_button')['btn_link'], get_sub_field('enter_site_button')['btn_image']['url'],get_sub_field('enter_site_button')['link_relationship'],get_sub_field('enter_site_button')['link_target']  ); ?>
		            </div>
		        </div>
				<?php 
						$count++;
					endwhile;
				endif; ?>
		    </div>
		    <!--/.Slides-->
			<?php if(get_sub_field('slider_arrows') == "Yes"): ?>
		    <!--.Controls-->
		    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
		        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		        <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
		        <span class="carousel-control-next-icon" aria-hidden="true"></span>
		        <span class="sr-only">Next</span>
		    </a>
		    <!--/.Controls-->
		    <?php
		    	endif;  
		    ?>
		</div>
		<!--/.Carousel Wrapper-->	
	   	 <?php endif;  ?>
	</div>
<?php 
	}//end of if statement of slider layout
?>
</section>

