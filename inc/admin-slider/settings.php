<?php
/**
 * Settings 
 */
settings_errors();
?>
<div class="qqlanding-slider-settings">
	<ul class="nav nav-tabs">
		<li><a href="#tab-1" class="nav-link active">Appearance</a></li>
		<li><a href="#tab-2" class="nav-link">Navigation</a></li>
		<li><a href="#tab-3" class="nav-link">Msc</a></li>
	</ul>
	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
			<?php ///include( '/inc/appearance.php' ); ?>
			<form method="post" action="options.php">
				<?php settings_fields( 'slider-appearance-group' ); ?>
				<?php do_settings_sections( 'slider_app_settings' ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<div id="tab-2" class="tab-pane">
			<form method="post" action="options.php">
				<?php settings_fields( 'slider-nav-group' ); ?>
				<?php do_settings_sections( 'slider_nav_settings' ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<div id="tab-3" class="tab-pane">
			<form method="post" action="options.php">
				<?php settings_fields( 'slider-ms-group' ); ?>
				<?php do_settings_sections( 'slider_msc_settings' ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
	</div>
</div>
