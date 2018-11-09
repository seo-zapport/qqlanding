<?php
$disable = get_field( 'vm_editor_enable_section', 'option' ); //Content Enable/Disable
$content_images = get_field('vm_content_images');
if ( acf_selective_refresh($disable) ) return $disable = false;
if ($disable) : ?>
<section id="videoContent">
	<div class="container">

		<h3 id="videoTitle" class="sec-entry-title sec-video-title text-center "><?php the_field( 'vm_title' ); ?></h3>
		<?php
			$con_setting = get_field('vm_content_settings');
			$hide_images = content_img_hide( get_field('vm_hide_image') ); //hide
		?>
		<div class="row">
			<?php if ($con_setting['vm_content_size'] === 'full'): ?>
				<div class="col-12">
					<?php the_field( 'vm_content' ); ?>
				</div>
			<?php else: ?>
				<?php if ( $con_setting['vm_content_position'] == 'left' ): ?>
					<div class="<?php echo $hide_images; ?> col-12 col-md-6 col-lg-6 cont-videos-image">
						<?php echo fpcontent_img_position($content_images,'vm');	?>
					</div>
				<?php endif; ?>
				<div class="col-12 col-md-6 col-lg-6 cont-videos-entry">
					<?php the_field( 'vm_content' ); ?>
				</div>
				<?php if ( $con_setting['vm_content_position'] == 'right' ): ?>
					<div class="<?php echo $hide_images; ?> col-12 col-md-6 col-lg-6 cont-videos-image">
						<?php echo fpcontent_img_position($content_images,'vm');?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

		</div>
	</div>
</section>
<?php endif; ?>