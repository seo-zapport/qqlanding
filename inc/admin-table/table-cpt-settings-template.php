<?php
	if ( ! empty( $image ) ) {
		$remove_btn_class = '';
		$change_text = 'Replace Media';
	}else{
		$remove_btn_class = 'd-none';
		$change_text = 'Upload Media';
	}
?>
<div class="input_wrapper">
	<label for="qqlanding-image">Logo</label>
	<div class="post-image-wrapper">
		<?php if ( ! empty( $image ) ): ?>
			<img id="display_logo" src="<?php echo esc_attr( $image ); ?>">
		<?php else: ?>
			<img id="display_logo" src="">
		<?php endif; ?>

	</div>
	<input type="hidden" name="image" id="qqlanding-image" class="text" value="<?php echo esc_attr( $image ); ?>">
	<a href="javascript:;" class="button qqlanding-upload-media hide-if-no-js" id="qqlanding-upload-image" data-format="image"><?php _e( $change_text, 'qqlanding' ); ?></a>
	<a href="javascript:;" id="remove-image" class="button button-danger <?php echo $remove_btn_class; ?>">Remove Image</a>
	<p class="muted-text">Upload some logo for your team, Recommended scale is 147x162. </p>
</div>
<div class="input_wrapper">
	<label for="display">
		<input type="checkbox" name="display" id="display" value="1" <?php echo ( $display == '1' ) ? 'checked="checked"' : ''; ?> >
		Show this in front page
	</label>
</div>
<div class="input_wrapper">
	<label for="display_timer">
		<input type="checkbox" name="display_timer" id="display_timer" value="1" <?php echo ( $display_timer == '1' ) ? 'checked="checked"' : ''; ?> >
		Display timer
	</label>
</div>
<div class="input_wrapper">
	<label for="display_timer_logo">
		<input type="checkbox" name="display_timer_logo" id="display_timer_logo" value="1" <?php echo ( $display_timer_logo == '1' ) ? 'checked="checked"' : ''; ?> >Display logo
	</label>
</div>
<?php
wp_nonce_field( 'qqlanding_save_setting_data', 'qqlanding_settings_meta_box_nonce');