<?php 
$disable = get_field( 'content_enable_section', 'option' ); //Content Enable/Disable
$content_item = get_field( 'content_item_a', 'option' ); //Content
$filters = get_field( 'filter_fields_a', 'option' );
$heading_settings = get_field( 'content_heading_settings', 'option' );
if ( acf_selective_refresh($disable) ) return $disable = false;

if ($disable) : ?>
<section id="Fcontent_a" class="content-first pt-5">
	<?php if ( ! empty( $filters ) ): ?>
		<div class="slider-filters"></div>
	<?php endif; ?>
	<div class="container">
		<?php 
			$args = $heading_settings;
			if ( $heading_settings['alignment'] !== 'default' ) {
				$img_args = get_image_attr( $content_item['fp_images'] );
				$args  = array_merge($heading_settings, $img_args);
				echo get_fp_content( get_field("fa_title"), $args);
			}
		?>
		<div class="row d-flex justify-content-center">
			<?php if ( $content_item ):

				$hidemob = content_img_hide($content_item['fp_app_set']['ca_hide_image']);
				$position = $content_item['fp_position'];

				if($content_item['fp_position'] == "default"): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 text-white text-justify">
						<?php echo fpcontent_content_position(get_field("fa_title"),get_field("fa_content"),'mmk-first',$content_item['fp_images'], $args); ?>
					</div>
				<?php else: ?>
					<?php if ( $position == 'left' ): ?>
						<div class="<?php echo $hidemob; ?> col-12 col-lg-6 text-white align-self-center">
							<?php echo fpcontent_img_position($content_item['fp_images'],'first'); ?>
						</div>
					<?php endif; //Left Image ?>
					<div class="col-12 col-lg-6 text-white align-self-center">
						<?php echo fpcontent_content_position(get_field("fa_title"),get_field("fa_content"),'mmk-first',$content_item['fp_images'], $args); ?>
					</div>
					<?php if ( $position == 'right' ): ?>
						<div class="<?php echo $hidemob; ?> col-12 col-lg-6 text-white align-self-center">
							<?php echo fpcontent_img_position($content_item['fp_images'],'first'); ?>
						</div>
					<?php endif; //Right Image ?>
				<?php endif; ?>
			<?php endif; ?>
	 	</div>
   </div>
</section>
<?php endif;?>
<?php if ( empty( get_field('content_item_a','option') ) ) {
	qqlanding_load_section('default');
} ?>