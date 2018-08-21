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
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    
		    <div class="item active">
		      <img src="http://via.placeholder.com/1900x420" alt="Chania">
		      <div class="carousel-caption">
		        <h3>Los Angeles</h3>
		        <p>LA is always so much fun!</p>
		      </div>
		    </div>

		    <div class="item ">
		      <img src="http://via.placeholder.com/1900x420" alt="Chania">
		      <div class="carousel-caption">
		        <h3>Los Angeles</h3>
		        <p>LA is always so much fun!</p>
		      </div>
		    </div>

		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
<?php 
	}//end of if statement of slider layout
?>

<?php 

?>
</section>