<?php 
$disable = get_field( 'content_enable_section_b', 'option' ); //Content Enable/Disable
$content_item_b = get_field( 'content_item_b', 'option' ); //Content
$filters = get_field( 'filter_fields_b', 'option' );
if ($disable) : ?>
<section id="Fcontent_b" class="content-last py-5">
	<?php if ( ! empty( $filters ) ): ?>
		<div class="slider-filters"></div>
	<?php endif; ?>
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
<?php if ( empty( get_field('content_item_b','option') ) ) {
	qqlanding_load_section('default');
} ?>
