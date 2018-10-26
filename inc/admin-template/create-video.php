<h1>Add Item</h1>
<?php //settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'vid-settings-group' ); ?>
	<?php do_settings_sections( 'videos_settings' ); ?>
	<?php submit_button(); ?>
</form>