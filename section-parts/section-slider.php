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

						<button>EnterSite</button>
					<?php endif; ?>
				</div>
		</div>
	</div>

<?php 
	}elseif(get_field('slider_layout', 'options') == "slider"){		
?>
	<div id="banner-slider">

		<!--Carousel Wrapper-->
		<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
		    <!--Indicators-->
		    <?php
		    	if(have_rows('slider_appearance_group','option')) : the_row(); 
		    		if(get_sub_field('slider_nav_dots') == "Yes"):  
		    ?>
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
		    <?php
		    	 	endif;
		    	endif;  
		    ?>
		    <!--/.Indicators-->
		    <!--Slides-->
		    <div class="carousel-inner" role="listbox">
				<?php 
					$count = "0";
					if( have_rows('slider_item_r', 'option') ): 
						while ( have_rows( 'slider_item_r', 'option' ) ) : the_row(); 
						$background = get_sub_field('slide_image');	
				?>
		        <div class="carousel-item<?php if($count == '0'){echo ' active';}else{echo '';} ?>">
		            <div class="view-<?php echo $count; ?>"></div>
		            <div class="carousel-caption caro-slide-<?php echo $count; ?>">
		                <h3 class="h3-responsive"><?php the_sub_field('slider_title'); ?></h3>
					    <p><?php the_sub_field('slider_content'); ?></p>    	
						<button>EnterSite</button>
		            </div>
		        </div>
				<?php 
						$count++;
					endwhile;
				endif; ?>
		    </div>
		    <!--/.Slides-->
		    <!--Controls-->
			<?php
				if(get_field('slider_appearance_group','option')) : 
					if(get_sub_field('slider_arrows') == "Yes"):  
			?>
		    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
		        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		        <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
		        <span class="carousel-control-next-icon" aria-hidden="true"></span>
		        <span class="sr-only">Next</span>
		    </a>
		    <?php
		    	 	endif;
		    	endif;  
		    ?>
		    <!--/.Controls-->
		</div>
		<!--/.Carousel Wrapper-->

	</div>
<?php 
	}//end of if statement of slider layout
?>

<?php 

?>
</section>

