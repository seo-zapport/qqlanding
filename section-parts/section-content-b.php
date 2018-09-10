<?php 
/*$countlabel =  count(get_field('content_item', 'option'));
if($countlabel == 1 ){ $class ="first";}else{ $class ="last"; }*/
$disable = get_field( 'content_enable_section_b', 'option' ); //Content Enable/Disable
$content_item_b = get_field( 'content_item_b', 'option' ); //Content
if ($disable) : ?>
<section id="Fcontent" class="content-last py-5">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<?php if ( $content_item_b ):
				$hidemob = content_img_hide($content_item_b['fp_app_set']['ca_hide_image']);
				$position = $content_item_b['fp_position'];

				if($content_item_b['fp_position'] == "default"): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 text-white text-justify">
						<?php echo fpcontent_content_position(get_field("fb_title_b"),get_field("fb_content_b"),'mmk-last',$content_item_b['fp_images']); ?>
					</div>
				<?php else: ?>
					<?php if ( $position == 'left' ): ?>
						<div class="<?php echo $hidemob; ?> col-12 col-lg-6 text-white align-self-center">
							<?php echo fpcontent_img_position($content_item_b['fp_images'],'last'); ?>
						</div>
					<?php endif; //Left Image ?>
					<div class="col-12 col-lg-6 text-white align-self-center">
						<?php echo fpcontent_content_position(get_field("fb_title_b"),get_field("fb_content_b"),'mmk-last',$content_item_b['fp_images']); ?>
					</div>
					<?php if ( $position == 'right' ): ?>
						<div class="<?php echo $hidemob; ?> col-12 col-lg-6 text-white align-self-center">
							<?php echo fpcontent_img_position($content_item_b['fp_images'],'last'); ?>
						</div>
					<?php endif; //Right Image ?>
				<?php endif; ?>
			<?php endif; ?>
	 	</div>
   </div>
</section>
<?php endif;?>
