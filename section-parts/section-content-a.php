<section id="Fcontent" class="content-first py-5">
	<div class="container">
		<div class="flexwrap flex-just-center row">
		<?php 
			if( have_rows('content_item', 'option') ): the_row();	
				
				$hidemob = content_img_hide(get_sub_field('fp_app_set')['ca_hide_image']);

				if(get_sub_field('fp_position') == "default"):
		?>

				<div class="col-xs-12 col-sm-12 col-md-12 text-white text-justify">
					
					<?php echo fpcontent_content_position(get_field("fa_title"),get_field("fa_content")); ?>

				</div>

			<?php else: ?>

				<div class="<?php if(get_sub_field('fp_position') == "left"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
					<?php 
						if(get_sub_field('fp_position') == "left"):	
								echo fpcontent_img_position(get_sub_field('fp_images'),'first');
						else:
								echo fpcontent_content_position(get_field("fa_title"),get_field("fa_content"));
						endif; 
					?>
				</div>
				<div class="<?php if(get_sub_field('fp_position') == "right"): echo $hidemob; else: echo 'col-xs-12 col-sm-12'; endif ?> col-md-6 text-white">
						<?php 
							if(get_sub_field('fp_position') == "left"):	
									echo fpcontent_content_position(get_field("fa_title"),get_field("fa_content"));
							else:
									echo fpcontent_img_position(get_sub_field('fp_images'),'first');
							endif; 
						?>
				</div>
				
			<?php 
				endif;
			endif;
		?>
	 </div>
   </div>
</section>
