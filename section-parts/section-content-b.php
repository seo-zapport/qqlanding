<?php 
<<<<<<< HEAD
	$countlabel =  count(get_field('content_item', 'option'));
	if($countlabel == 1 ){
=======
	if(count(get_field('content_item', 'option') == "1" )){
>>>>>>> 6bdf7dd5a92ee5341e7e29bfd804b45be29e3ddc
		$class ="first";
	}else{
		$class ="last";
	}
?>

<section id="Fcontent" class="content-<?php echo $class; ?> py-5">
	<div class="container">
		<div class="flexwrap flex-just-center row">
		<?php 
			if( get_field('content_item', 'option') ): 
			

				$hidemob = content_img_hide(get_sub_field('fp_app_set')['ca_hide_image']);

<<<<<<< HEAD
				 while(have_rows('content_item', 'option') ) : the_row(); 
=======
				while(have_rows('content_item', 'option') ) : the_row();
>>>>>>> 6bdf7dd5a92ee5341e7e29bfd804b45be29e3ddc

					if(get_sub_field('fp_position') == "default"):
		?>
				<div class="col-xs-12 col-sm-12 col-md-12 text-white text-justify">
					
						<?php echo fpcontent_content_position(get_field("fb_title"),get_field("fb_content")); ?>

				</div>

			<?php else: ?>
				
				<div class="<?php if(get_sub_field('fp_position') == "left"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
					<?php 
						if(get_sub_field('fp_position') == "left"):	
							echo fpcontent_img_position(get_sub_field('fp_images'),'last');
						else:
							echo fpcontent_content_position(get_field('fb_title'),get_field('fb_content'),'mmk-last',get_sub_field('fp_images'));
							//echo fpcontent_content_position_b();
						endif; 
					?>
				</div>
	
				<div class="<?php if(get_sub_field('fp_position') == "right"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
						<?php 
							if(get_sub_field('fp_position') == "left"):	
								echo fpcontent_content_position(get_field('fb_title'),get_field('fb_content'),'mmk-last',get_sub_field('fp_images'));
								//echo fpcontent_content_position_b();
							else:
								echo fpcontent_img_position(get_sub_field('fp_images'),'last');
							endif; 
						?>
				</div>
				
			<?php 
					endif;
<<<<<<< HEAD
				 endwhile; 
=======
				 endwhile;		
>>>>>>> 6bdf7dd5a92ee5341e7e29bfd804b45be29e3ddc
			endif;
		?>
	 </div>
   </div>


</section>
