<?php 
$disable = get_field( 'extra_content_enable_section', 'option' ); //Content Enable/Disable
$extra_content = get_field( 'extra_content_attr', 'option' ); //Content
$filters = get_field( 'filter_fields_b', 'option' );
$heading_settings = get_field( 'extra_heading_settings', 'option' );
if ( acf_selective_refresh($disable) ) return $disable = false;

if ($disable) : ?>
<section id="Fcontent_b" class="content-last py-5">
	<?php if ( ! empty( $filters ) ): ?>
		<div class="slider-filters"></div>
	<?php endif; ?>
	<div class="container">
		<?php 
			$args = $heading_settings;
			if ( $heading_settings['alignment'] !== 'default' ) {
				$img_args = get_image_attr( $content_item['fp_images'] );
				$args  = array_merge($heading_settings, $img_args);
				echo get_fp_content( get_field("fb_extra_title"), $args);
			}
		?>
		<div class="row d-flex justify-content-center">
			<?php if ( $extra_content ):
				$hidemob = content_img_hide($extra_content['fp_app_set']['ca_hide_image']);
				$position = $extra_content['fp_position'];
				if($extra_content['fp_position'] == "default"): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 text-white text-justify">
						<?php echo fpcontent_content_position(get_field("fb_extra_title"),get_field("fb_content_b"),'mmk-last',$extra_content['fp_images'], $args); ?>
					</div>
				<?php else: ?>
					<?php if ( $position == 'left' ): ?>
						<div class="<?php echo $hidemob; ?> col-12 col-lg-6 text-white align-self-center">
							<?php echo fpcontent_img_position($extra_content['fp_images'],'last'); ?>
						</div>
					<?php endif; //Left Image ?>
					<div class="col-12 col-lg-6 text-white align-self-center">
						<?php echo fpcontent_content_position(get_field("fb_extra_title"),get_field("fb_content_b"),'mmk-last',$extra_content['fp_images'], $args); ?>
					</div>
					<?php if ( $position == 'right' ): ?>
						<div class="<?php echo $hidemob; ?> col-12 col-lg-6 text-white align-self-center">
							<?php echo fpcontent_img_position($extra_content['fp_images'],'last'); ?>
						</div>
					<?php endif; //Right Image ?>
				<?php endif; ?>
			<?php endif; ?>
	 	</div>
   </div>
</section>
<?php endif;?>
<?php if ( empty( get_field('extra_content_attr','option') ) ) {
	qqlanding_load_section('default');
}